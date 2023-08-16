<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandCustomer;
use App\Models\LandProject;

class LandCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = LandCustomer::orderBy('id','desc')->get();

        return view('admin.landcustomer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landprojects = LandProject::select('id','project_name')->get();
        return view('admin.landcustomer.create',compact('landprojects'));
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
            'remarks' =>'nullable'
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
            return redirect()->route('landcustomer.index');
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
        return view('admin.landcustomer.edit',compact('customer','landprojects'));
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
            'remarks' =>'nullable'
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
            return redirect()->route('landcustomer.index');
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


    public function approvePromotion($id)
    {
        $customer = LandCustomer::find($id);

        if (!$customer) {
            flashError('Customer not found');
            return back();
        }

        // Assuming your levels are '1', '2', '3', '4'
        $currentLevel = intval($customer->level);
        $nextLevel = $currentLevel + 1;

        if ($nextLevel > 4) {
            flashError('Customer is already at the highest level');
            return back();
        }

        // Define status based on level
        $statusOptions = ['booking', 'mod', 'payment', 'closed'];
        $status = $statusOptions[$nextLevel - 1]; // Array is zero-indexed

        // Update customer attributes
        $customer->level = strval($nextLevel);
        $customer->status = $status;
        $customer->promote = false; // Reset promotion flag

        if ($customer->save()) {
            flashSuccess('Promotion approved and customer updated');
            return back();
        } else {
            flashError('Failed to update customer');
            return back();
        }
    }



}
