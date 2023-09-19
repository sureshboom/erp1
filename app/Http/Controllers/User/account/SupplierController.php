<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Materialin;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return view('user.account.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.account.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'supplier_name' => 'required',
            'supplier_phone' => 'required',
            'supplier_gstno' => 'nullable',
            'supplier_location' => 'required',
            'supplier_gpay' => 'required',
            'supplier_account' => 'nullable'
        ]);

        $supplier = Supplier::create($input);

        if($supplier)
        {
            flashSuccess('Supplier created Successfully');
            return redirect()->route('account.supplier.index');
        }else
        {
            flashSuccess('Something Wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $payments = Materialin::where('supplier_id',$id)->with('materialpayhistory')->get();

        return view('user.account.supplier.show',compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('user.account.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'supplier_name' => 'required',
            'supplier_phone' => 'required',
            'supplier_gstno' => 'nullable',
            'supplier_location' => 'required',
            'supplier_gpay' => 'required',
            'supplier_account' => 'nullable'
        ]);

        $supplier = Supplier::where('id',$id)->update($input);

        if($supplier)
        {
            flashSuccess('Supplier Updated Successfully');
            return redirect()->route('account.supplier.index');
        }else
        {
            flashSuccess('Something Wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::find($id)->delete();
        flashSuccess('Supplier Removed Successfully');
        return back();
    }
}
