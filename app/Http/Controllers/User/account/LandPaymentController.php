<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandCustomer;
use App\Models\LandPaymentHistory;

class LandPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lands = LandCustomer::orderBy('id','desc')->get();

        return view('user.account.landpayment.index',compact('lands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = LandCustomer::select('id')->get();

        return view('user.account.landpayment.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'landcustomers_id' => 'required',
            'total' => 'required|numeric',
            'amount' => 'required|numeric',
            'paytype' => 'required',
        ]);

        $payment = LandPaymentHistory::create([
            'landcustomers_id' => $request->landcustomers_id,
            'paytype' => $request->paytype,
            'amount' => $request->amount,
            'payway' => $request->payway
        ]);
        if($payment)
        {
            $land = LandCustomer::where('id',$request->landcustomers_id)->update([
                'paid' => $request->paid,
                'pending' => $request->pending,
            ]);
            if($land)
            {
                flashSuccess('Land Payment Created Successfully');
                return redirect()->route('account.land_payment.index');
            }
            else
            {
                flashError('Something Wrong');
                return back();
            }
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
        //
        $historys = LandPaymentHistory::where('landcustomers_id',$id)->get();

        return view('user.account.landpayment.show',compact('historys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $history = LandPaymentHistory::find($id);

        return view('user.account.landpayment.edit',compact('history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'amount' => 'required|numeric',
            'paytype' =>'required',
            'payway' => 'nullable'
        ]);

        $up = LandPaymentHistory::find($id)->update($input);
        if($up)
        {
            flashSuccess('Land Payment Updated Successfully');
            return redirect()->route('account.land_payment.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        LandPaymentHistory::find($id)->delete();
        flashSuccess('Land Payment Removed Successfully');
        return back();
    }

    public function getland($orderid)
    {
        $payment = LandCustomer::where('id', $orderid)->first();
        return response()->json($payment);

    }
}
