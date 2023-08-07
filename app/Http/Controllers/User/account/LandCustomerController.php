<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandCustomer;
use App\Models\LandPaymentHistory;

class LandCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = LandCustomer::all();

        return view('user.account.landcustomer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.account.landcustomer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'sitename' => 'required',
            'plotno' => 'required',
            'amount' => 'required|numeric',
            'bookingby' => 'required',
        ]);
        $input['pending'] = $request->amount;
        $input['status'] = 'pending';

        $customer = LandCustomer::create($input);
        if($customer)
        {
            flashSuccess('Customer created Successfully');
            return redirect()->route('account.landcustomer.index');
        }
        else
        {
            flashError('Something Wrong plz try again ');
            return back();
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
        $customer = LandCustomer::find($id);

        return view('user.account.landcustomer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'sitename' => 'required',
            'plotno' => 'required',
            'amount' => 'required|numeric',
            
            'bookingby' => 'required',
        ]);
        

        $customer = LandCustomer::find($id)->update($input);
        if($customer)
        {
            flashSuccess('Customer Updated Successfully');
            return redirect()->route('account.landcustomer.index');
        }
        else
        {
            flashError('Something Wrong plz try again ');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LandCustomer::find($id)->delete();
        flashSuccess('Customer Removed Successfully');
        return back();
    }
}
