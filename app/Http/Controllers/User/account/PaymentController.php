<?php

namespace App\Http\Controllers\User\account;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandProject;
use App\Models\LandCustomer;
use App\Models\ContractProject;
use App\Models\ContractCustomer;
use App\Models\VillaProject;
use App\Models\ProjectCustomer;
use App\Models\Supplier;
use App\Models\Payment;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landprojects = LandProject::select('id','project_name')->get();
        $contractprojects = ContractProject::select('id','project_name')->get();
        $villaprojects = VillaProject::select('id','project_name')->get();
        $suppliers = Supplier::select('id','supplier_name')->get();
        return view('user.account.payment.create',compact('landprojects','villaprojects','contractprojects','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        switch($request->payment_type)
        {
            case('project'):
                $input = $request->validate([
                    'payment_date' => 'required',
                    'payment_type' => 'required',
                    'project_type' => 'required',
                    'contract_project_id' => 'required_if:project_type,contract',
                    'land_project_id' => 'required_if:project_type,land',
                    'villa_project_id' => 'required_if:project_type,villa',
                    'customer_id' => 'required',
                    'amount' => 'required|numeric',
                    'total' => 'required|numeric',
                    'advance' => 'required|numeric',
                    'paid' => 'required|numeric',
                    'pending' => 'required|numeric',
                    'customer_id' => 'required',
                    'customer_id' => 'required',
                    'paytype' => 'required',
                    'payway'  => 'required'
                ]);
                $projectType = $request->project_type;
                $project_id = match($projectType) {
                    'contract' => $request->contract_project_id,
                    'land' => $request->land_project_id,
                    'villa' => $request->villa_project_id,
                    default => null,
                };
                $payment = Payment::create([
                    'payment_date' => $request->payment_date,
                    'payment_type' => $request->payment_type,
                    'payment_subtype' => $request->project_type,
                    'project_id' => $project_id,
                    'customer_id' => $request->customer_id,
                    'payment_mode' => $request->paytype,
                    'payment_by' => $request->payway,
                    'total' => $request->total,
                    'advance' => $request->advance,
                    'paid' => $request->paid,
                    'pending' => $request->pending,
                    'amount' => abs(($request->paid) - ($request->advance)),
                ]);
                if($payment)
                {
                    $customerModel = match($projectType) {
                        'contract' => ContractCustomer::class,
                        'land' => LandCustomer::class,
                        'villa' => ProjectCustomer::class,
                        default => null,
                    };

                    if ($customerModel) {
                        $customer = $customerModel::findOrFail($request->customer_id);
                        $newPaid =  abs(($request->paid) - ($request->advance));
                        $newPending = abs($request->pending); // Assuming you want to deduct from pending
                        $customer->update([
                            'paid' => $newPaid,
                            'pending' => $newPending,
                        ]);
                    }
                    flashSuccess(' Project Payment Created Successfully');
                    return redirect()->route('account.payment.create');
                }
                else{
                    flashError('Something Wrong');
                    return back();
                }
            break;
            case('material'):
                $input = $request->validate([
                    'payment_date' => 'required',
                    'supplier_id' => 'required',
                    'mamount' => 'required|numeric',
                    'mpaytype' => 'required',
                    'mpayway' => 'required',
                    'mtotal' => 'required|numeric',
                    'mpaid' => 'required|numeric',
                    'mpending' => 'required|numeric',
                    
                ]);
                $payment = Payment::create([
                    'payment_date' => $request->payment_date,
                    'payment_type' => $request->payment_type,
                    'supplier_id' => $request->supplier_id,
                    'payment_mode' => $request->mpaytype,
                    'payment_by' => $request->mpayway,
                    'total' => $request->mtotal,
                    'paid' => $request->mpaid,
                    'pending' => $request->mpending,
                    'amount' => $request->mamount,
                ]);
                if($payment)
                {
                    $suppliers = Supplier::find($request->supplier_id)->update(['paid' => $request->mpaid,'pending' => $request->mpending]);
                    flashSuccess('Material Payment Created Successfully');
                    return redirect()->route('account.payment.create');
                }
                else
                {
                    flashError('Something Wrong');
                    return back();   
                }
            break;
            case('expense'):
                $input = $request->validate([
                    'payment_date' => 'required',
                    'expense_type' => 'required',
                    'expense_project_type' => 'required_if:expense_type,project',
                    'econtract_project_id' => 'required_if:expense_project_type,contract',
                    'eland_project_id' => 'required_if:expense_project_type,land',
                    'evilla_project_id' => 'required_if:expense_project_type,villa',
                    'name' => 'required',
                    'eamount' => 'required',
                    'approved_by' => 'required',
                    'received_by' => 'required',
                ]);
                $expenseproject = ($request->expense_type == 'project') ? $request->expense_project_type : null ;
                $project_id = match($expenseproject) {
                    'contract' => $request->econtract_project_id,
                    'land' => $request->eland_project_id,
                    'villa' => $request->evilla_project_id,
                    default => null,
                };
                $payment = Payment::create([
                    'payment_date' => $request->payment_date,
                    'payment_type' => $request->payment_type,
                    'payment_subtype' => $request->expense_type,
                    'expense_project_type' => $expenseproject,
                    'project_id' => $project_id,
                    'expense_for' => $request->name,
                    'approved_by' => $request->approved_by,
                    'received_by' => $request->received_by,
                    'amount' => $request->eamount,
                ]);
                if($payment)
                {
                    flashSuccess('Expense Payment Created Successfully');
                    
                    return redirect()->route('account.payment.create');
                }
                else
                {
                    flashError('Something Wrong');
                    return back();   
                }
            break;
            default:
                $input = $request->validate([
                    'payment_date' => 'required',
                    'payment_type' => 'required'
                ]);
            break;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    
    $payment = Payment::find($id);

    if (!$payment) {
        flashError('Payment not found');
        return back();
    }

    $paymentType = $payment->payment_type;

    switch ($paymentType) {
        case 'project':
            // Get the project type and project_id
            $projectType = $payment->payment_subtype;
            $projectId = $payment->project_id;

            $customerModel = null;
            if ($projectType === 'contract') {
                $customerModel = ContractCustomer::class;
            } elseif ($projectType === 'land') {
                $customerModel = LandCustomer::class;
            } elseif ($projectType === 'villa') {
                $customerModel = ProjectCustomer::class;
            }

            if ($customerModel) {
                $customer = $customerModel::find($payment->customer_id);
                if ($customer) {
                    // Update the paid and pending values
                    $newPaid = $customer->paid - $payment->amount;
                    $newPending = $customer->pending + $payment->amount;
                    $customer->update([
                        'paid' => $newPaid,
                        'pending' => $newPending,
                    ]);
                }
            }
            break;

        case 'material':
            $supplier = Supplier::find($payment->supplier_id);
            if ($supplier) {
                // Update the paid and pending values
                $newPaid = $supplier->paid - $payment->paid;
                $newPending = $supplier->pending + $payment->paid;
                $supplier->update([
                    'paid' => $newPaid,
                    'pending' => $newPending,
                ]);
            }
            break;

        case 'expense':
            // No need to update other tables for expenses
            break;

        // Handle other payment types if needed

        default:
            break;
    }

    $payment->delete();

    flashSuccess('Payment deleted successfully');
    return back();
}


    public function customersid(Request $request)
    {
        
        $projectId = $request->input('projectid');
        $projectType = $request->input('projecttype');

        switch($projectType)
        {
            case('land'):
                    $customers = LandCustomer::select('id','customer_name')->where('project_id', $projectId)->get();        
                break;
            case('contract'):
                    $customers = ContractCustomer::select('id','customer_name')->where('project_id', $projectId)->get();
                break;
            case('villa'):
                    $customers = ProjectCustomer::select('id','customer_name')->where('project_id', $projectId)->get();
                break;
            default:
                $customers = '';
                break;
        }
        return response()->json($customers);
    
    }
    public function customersdetails(Request $request)
    {
        
        $customerid = $request->input('customerid');
        $projectType = $request->input('projecttype');

        switch($projectType)
        {
            case('land'):
                    $customers = LandCustomer::select('id','amount','paid','pending','advance')->find($customerid);        
                break;
            case('contract'):
                    $customers = ContractCustomer::select('id','amount','paid','pending','advance')->find($customerid);
                break;
            case('villa'):
                    $customers = ProjectCustomer::select('id','amount','paid','pending','advance')->find($customerid);
                break;
            default:
                $customers = '';
                break;
        }
        return response()->json($customers);
    
    }

    public function supplierdetails(Request $request)
    {
        
        $suppliers = $request->input('supplier');
        $supplier = Supplier::select('id','total','paid','pending')->find($suppliers);;
        return response()->json($supplier);
    
    }

    public function landpaymentshow()
    {
        $landpayments = Payment::where('payment_type', 'project')
    ->where('payment_subtype', 'land')
    ->with('payable') // Eager load the related model
    ->get();

        return view('user.account.payment.landpayment',compact('landpayments'));
    }

    public function contractpaymentshow()
    {
        $contractpayments = Payment::where('payment_type', 'project')
    ->where('payment_subtype', 'contract')
    ->with('payable') // Eager load the related model
    ->get();

        return view('user.account.payment.contractpayment',compact('contractpayments'));
    }

    public function villapaymentshow()
    {
        $villapayments = Payment::where('payment_type', 'project')
    ->where('payment_subtype', 'villa')
    ->with('payable') // Eager load the related model
    ->get();

        return view('user.account.payment.villapayment',compact('villapayments'));
    }
    public function materialpaymentshow()
    {
        $materialpayments = Payment::where('payment_type','material')->orderBy('payment_date','desc')->get();
        return view('user.account.payment.material',compact('materialpayments'));
    }
    public function expensepaymentshow()
    {
        $expensepayments = Payment::where('payment_type','expense')->orderBy('payment_date','desc')->get();
        return view('user.account.payment.expense',compact('expensepayments'));
    }

    public function receiptview($id)
    {
        

        $payment = Payment::find($id);

        $dompdf = new Dompdf();

        $imagePath = public_path('image/sks.png');

        if ($imagePath) {
            // Convert image to base64 data URI
            $imageData = base64_encode(file_get_contents($imagePath));
        } else {
            // If image doesn't exist, set to empty string
            $imageData = '';
        }

        $html = view('user.account.payment.receipt', compact('payment','imageData'))->render();

        $dompdf->loadHtml($html);

    // Set paper size and orientation
    // $dompdf->setPaper('A4', 'landscape');

    // Render the PDF (first parameter is optional filename)
    $dompdf->render();

    // Get the generated PDF content
    $pdfContent = $dompdf->output();

    // Create a response with the PDF content and appropriate headers
    $response = new Response($pdfContent, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="receipt.pdf"',
    ]);

    return $response;

    }

    public function receiptdownload($id)
    {
        $payment = Payment::find($id);

        $dompdf = new Dompdf();

        $imagePath = public_path('image/sks.png');

        if ($imagePath) {
            // Convert image to base64 data URI
            $imageData = base64_encode(file_get_contents($imagePath));
        } else {
            // If image doesn't exist, set to empty string
            $imageData = '';
        }

        // return view('user.account.payment.creceipt', compact('payment','imageData'));

        $html = view('user.account.payment.creceipt', compact('payment','imageData'))->render();

        $dompdf->loadHtml($html);

        // Set paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // Render the PDF (first parameter is optional filename)
        $dompdf->render();

        // Get the generated PDF content
        $pdfContent = $dompdf->output();

        // Create a response with the PDF content and appropriate headers
        $response = new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="payment.pdf"',
        ]);

        return $response;
    }
}
