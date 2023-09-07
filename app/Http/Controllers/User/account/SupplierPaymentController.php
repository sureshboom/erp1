<?php

namespace App\Http\Controllers\User\account;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabourSupplier;
use App\Models\SupplierPayment;
use App\Models\SupplierPaymentHistory;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\Villa;

class SupplierPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = SupplierPayment::orderBy('id','desc')->get();
        return view('user.account.supplierpayment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = LabourSupplier::orderBy('id','desc')->get();
        return view('user.account.supplierpayment.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'payment_date' => 'required',
            'project_type' => 'required',
            'contractproject_id' => 'required_if:project_type,contract',
            'villaproject_id' => 'required_if:project_type,villa',
            'villa_id' => 'required_if:project_type,villa',
            'supplier_id' => 'required',
            'total' => 'required',
            'paid' => 'required',
            'amount' => 'required',
            'pending' => 'required',
            'paytype' => 'required',
            'payway' => 'required',
            'supplierpayment' => 'required'
            
        ]);
        $history = SupplierPaymentHistory::create([
            'supplier_payment_id' => $request->supplierpayment,
            'amount' => $request->amount,
            'payment_mode' => $request->paytype,
            'payment_by' => $request->payway,
            'payment_date' => $request->payment_date,
        ]);
        if($history)
        {
            $pay = SupplierPayment::find($request->supplierpayment);
            $pay->increment('paid',$request->amount);
            $pay->decrement('pending',$request->amount);
            flashSuccess('SupplierPayment created Successfully');
            return redirect()->route('account.supplier_payments.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = SupplierPaymentHistory::where('supplier_payment_id',$id)->with('supplierpayment')->get();
        return view('user.account.supplierpayment.show',compact('payments'));
    }

    public function receiptview(string $id)
    {
        $payments = SupplierPayment::find($id);
        
        $dompdf = new Dompdf();

        $imagePath = public_path('image/sks.png');

        if ($imagePath) {
            // Convert image to base64 data URI
            $imageData = base64_encode(file_get_contents($imagePath));
        } else {
            // If image doesn't exist, set to empty string
            $imageData = '';
        }
        // return view('user.account.supplierpayment.receipt',compact('payments','imageData'));

        $html = view('user.account.supplierpayment.receipt', compact('payments','imageData'))->render();

        $dompdf->loadHtml($html);

        // Set paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');
        $dompdf->setPaper([0, 0, 800, 850], 'portrait');

        // Render the PDF (first parameter is optional filename)
        $dompdf->render();

        // Get the generated PDF content
        $pdfContent = $dompdf->output();

        // Create a response with the PDF content and appropriate headers
        $response = new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="supplierpayment.pdf"',
        ]);

        return $response;
    }

    public function receiptdownload(string $id)
    {
        $payment = SupplierPaymentHistory::find($id);

        $dompdf = new Dompdf();

        $imagePath = public_path('image/sks.png');

        if ($imagePath) {
            // Convert image to base64 data URI
            $imageData = base64_encode(file_get_contents($imagePath));
        } else {
            // If image doesn't exist, set to empty string
            $imageData = '';
        }
        // return view('user.account.supplierpayment.creceipt',compact('payment','imageData'));

        $html = view('user.account.supplierpayment.creceipt', compact('payment','imageData'))->render();

        $dompdf->loadHtml($html);

        // Set paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');
        $dompdf->setPaper([0, 0, 800, 850], 'portrait');

        // Render the PDF (first parameter is optional filename)
        $dompdf->render();

        // Get the generated PDF content
        $pdfContent = $dompdf->output();

        // Create a response with the PDF content and appropriate headers
        $response = new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="supplierpayment.pdf"',
        ]);

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SupplierPaymentHistory::find($id)->delete();
        flashSuccess('SupplierPayment Removed Successfully');
        return back();
    }

    public function projectview(Request $request)
    {
        $details = [];
        switch($request->type)
        {
            case('contract'):
            $payments = SupplierPayment::select('id','contractproject_id')->where('project_type',$request->type)->where('supplier_id',$request->supplier)->get();
            if($payments)
            {
                foreach($payments as $payment)
                {
                    $details[] = [
                        'id' => $payment->contractproject_id,
                        'projectname' => $payment->contractproject->project_name,
                    ];
                }
            }
            break;
            case('villa'):
            $payments = SupplierPayment::select('id','villaproject_id')->where('project_type',$request->type)->where('supplier_id',$request->supplier)->get();
            if($payments)
            {
                foreach($payments as $payment)
                {
                    $details[] = [
                        'id' => $payment->villaproject_id,
                        'projectname' => $payment->villaproject->project_name,
                    ];
                }
            }
            break;
            default:
            $details = [];
            break;
        }

        

        return response()->json($details);
    }


    public function projectvillalist(Request $request)
    {
        $payments = SupplierPayment::select('id','villa_id')->where('project_type','villa')->where('supplier_id',$request->supplier)->where('villaproject_id',$request->villaproject)->get();
        if($payments)
            {
                foreach($payments as $payment)
                {
                    $villas[] = [
                        'id' => $payment->villa_id,
                        'villa' => $payment->villa->villa_no,
                    ];
                }
            }

        return response()->json($villas);
    }


    public function amountdetails(Request $request)
    {
        if($request->type == 'contract')
        {
            $amount = SupplierPayment::where('project_type',$request->type)->where('supplier_id',$request->supplier)->where('contractproject_id',$request->projectid)->first();
        }
        else
        {
            $amount = SupplierPayment::where('project_type',$request->type)->where('supplier_id',$request->supplier)->where('villaproject_id',$request->villaproject)->where('villa_id',$request->projectid)->first();
        }
        return response()->json($amount);
    }
}
