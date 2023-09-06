<?php

namespace App\Http\Controllers\User\account;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = SupplierPaymentHistory::where('supplier_payment_id',$id)->get();
        return view('user.account.supplierpayment.show',compact('payments'));
    }

    public function receiptview(string $id)
    {
        $payments = SupplierPaymentHistory::find($id);
        return view('user.account.supplierpayment.receipt',compact('payments'));
    }

    public function receiptdownload(string $id)
    {
        // $payments = SupplierPaymentHistory::find($id);
        // return view('user.account.supplierpayment.show',compact('payments'));
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
                        'id' => $payment->id,
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
                        'id' => $payment->id,
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
        $payments = SupplierPayment::select('id','villa_id')->where('project_type','type')->where('supplier_id',$request->supplier)->where('villaproject_id',$request->villaproject)->get();
        if($payments)
            {
                foreach($payments as $payment)
                {
                    $details[] = [
                        'id' => $payment->id,
                        'projectname' => $payment->villa->villa_no,
                    ];
                }
            }
    }
}
