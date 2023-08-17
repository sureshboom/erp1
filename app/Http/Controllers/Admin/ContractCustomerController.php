<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContractCustomer;
use App\Models\ContractProject;

class ContractCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = ContractCustomer::select('id','customer_name','phone','project_id','level','status','promote')->orderBy('id','desc')->get();

        return view('admin.contractcustomer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contractprojects = ContractProject::select('id','project_name')->get();
        return view('admin.contractcustomer.create',compact('contractprojects'));
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
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
            'remarks' => 'required',
        ]);
        
        $roleFolder = 'images/contractcustomer';
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
        $input['level'] = 1;
        $input['status'] = 'booking';
        $customer = ContractCustomer::create($input);
        if($customer)
        {
            flashSuccess('Contract Customer created Successfully');
            return redirect()->route('contractcustomer.index');
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
        $customer = ContractCustomer::find($id);

        switch ($customer->level) {
            case '1':
                $levelPercentage = 25;
                $levelColor = 'green'; // Yellow
                $statusview = 'Booking';
                $statuscolor = 'badge-success';
                break;
            case '2':
                $levelPercentage = 50;
                $levelColor = '#d98638'; // Blue
                $statusview = 'Registration & MOD';
                $statuscolor = 'badge-warning';
                break;
            case '3':
                $levelPercentage = 75;
                $levelColor = '#337ab7'; // Green
                $statusview = 'Payment Received';
                $statuscolor = 'badge-primary';
                break;
            case '4':
                $levelPercentage = 100;
                $levelColor = '#cc0a0a'; // Red
                $statusview = 'Closed';
                $statuscolor = 'badge-danger';
                break;
            default:
                $levelPercentage = 0;
                $levelColor = '#ccc'; // Default gray
        }

        return view('admin.contractcustomer.show',compact('customer','levelPercentage','levelColor','statusview','statuscolor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contractprojects = ContractProject::select('id','project_name')->get();
        $customer = ContractCustomer::find($id);
        return view('admin.contractcustomer.edit',compact('contractprojects','customer'));
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
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
            'remarks' => 'nullable',
        ]);
        
        $roleFolder = 'images/contractcustomer';
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
        $customer = ContractCustomer::find($id)->update($input);
        if($customer)
        {
            flashSuccess('Contract Customer Updated Successfully');
            return redirect()->route('contractcustomer.index');
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
        //
        ContractCustomer::find($id)->delete();
        flashSuccess('Customer Removed Successfully');
        return back();
    }

    public function approvePromotion($id)
    {
        $customer = ContractCustomer::find($id);

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
