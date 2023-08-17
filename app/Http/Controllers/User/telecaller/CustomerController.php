<?php

namespace App\Http\Controllers\User\telecaller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Telecaller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $telecaller =Telecaller::where('user_id',auth()->user()->id)->first();
        $customers = Customer::where('created_by_type',auth()->user()->role)
                    ->where('created_by_id',$telecaller->id)
                    ->get();
        return view('user.telecaller.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('user.telecaller.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $input =$request->validate([
            'customer_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'interested_project' => 'required',
            'interested_area' => 'required',
            'response' => 'required',
            'source' => 'required'
        ]);
        
        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $input['created_by_type'] = auth()->user()->role;
        $input['created_by_id'] = $telecaller->id;
        
        $cust = Customer::create($input);

        if($cust){
            flashSuccess('Customer created Successfully');
            return redirect()->route('telecaller.customer.index');
        }
        else
        {
            flashError('Something wrong');
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
        $customer = Customer::find($id);
        return view('user.telecaller.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input =$request->validate([
            'customer_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'interested_project' => 'required',
            'interested_area' => 'required',
            'response' => 'required',
            'source' => 'required'
        ]);

        $cust = Customer::where('id',$id)->update($input);

        if($cust){
            flashSuccess('Customer Updated Successfully');
            return redirect()->route('telecaller.customer.index');
        }
        else
        {
            flashError('Something wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Customer::find($id)
            ->delete();

        flashSuccess('Customer Removed Successfully');
        return redirect()->route('telecaller.customer.index');
    }
}
