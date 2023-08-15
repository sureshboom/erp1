<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandCustomer;
use App\Models\LandProject;
use App\Models\LandPaymentHistory;

class LandCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = LandCustomer::orderBy('id','desc')->get();

        return view('user.account.landcustomer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landprojects = LandProject::select('id','project_name')->get();
        return view('user.account.landcustomer.create',compact('landprojects'));
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
            'aadharno' => 'required',
            'pancard' => 'required',
            'project_id' => 'required',
            'plotno' => 'required',
            'plot_area' => 'required',
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
        ]);
        $roleFolder = 'images/landcustomer';
        if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                
                $path1 = $roleFolder.'/aadhar';
                $attachment1Path = uploadImage($attachment1,$path1);
                $input['attachment1'] = $attachment1Path;
        }
        if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                
                $path2 = $roleFolder.'/pan';
                $attachment2Path = uploadImage($attachment2,$path2);
                $input['attachment2'] = $attachment2Path;
        }
        $customer = LandCustomer::create($input);
        if($customer)
        {
            flashSuccess('Land Customer created Successfully');
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
        $landprojects = LandProject::select('id','project_name')->get();
        return view('user.account.landcustomer.edit',compact('customer','landprojects'));
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
            'aadharno' => 'required',
            'pancard' => 'required',
            'project_id' => 'required',
            'plotno' => 'required',
            'plot_area' => 'required',
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
        ]);
        $roleFolder = 'images/landcustomer';
        if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                
                $path1 = $roleFolder.'/aadhar';
                $attachment1Path = uploadImage($attachment1,$path1);
                $input['attachment1'] = $attachment1Path;
        }
        if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                
                $path2 = $roleFolder.'/pan';
                $attachment2Path = uploadImage($attachment2,$path2);
                $input['attachment2'] = $attachment2Path;
        }

        $customer = LandCustomer::find($id)->update($input);
        if($customer)
        {
            flashSuccess('Land Customer Updated Successfully');
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
