<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabourSupplier;

class LabourSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $labours = LabourSupplier::orderBy('id','desc')->get();

        return view('user.account.labour.index',compact('labours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('user.account.labour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'account' => 'required',
            'aadharno' => 'required',
            'pancard' => 'required',
            'aadharno' => 'required',
            'gstno' => 'required',
        ]);
        $roleFolder = 'images/laboursupplier';
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
        
        $customer = LabourSupplier::create($input);
        if($customer)
        {
            flashSuccess('Labour Supplier Created Successfully');
            return redirect()->route('account.labour_supplier.index');
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
        $labour = LabourSupplier::find($id);

        return view('user.account.labour.show',compact('labour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $labour = LabourSupplier::find($id);

        return view('user.account.labour.edit',compact('labour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'account' => 'required',
            'aadharno' => 'required',
            'pancard' => 'required',
            'aadharno' => 'required',
            'gstno' => 'required',
        ]);
        $roleFolder = 'images/laboursupplier';
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

        $customer = LabourSupplier::find($id)->update($input);
        if($customer)
        {
            flashSuccess('Labour Supplier Updated Successfully');
            return redirect()->route('account.labour_supplier.index');
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
        LabourSupplier::find($id)->delete();
        flashSuccess('Labour Supplier Removed Successfully');
        return back();

    }
}
