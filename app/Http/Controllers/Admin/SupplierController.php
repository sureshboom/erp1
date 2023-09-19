<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierAssign;
use App\Models\LabourSupplier;
use App\Models\Villa;
use App\Models\ContractProject;
use App\Models\SupplierPayment;
use App\Models\Materialin;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return view('admin.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            return redirect()->route('supplier.index');
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

        return view('admin.supplier.show',compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit',compact('supplier'));
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
            return redirect()->route('supplier.index');
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

    public function supplierassignview()
    {
        $assignviews = SupplierAssign::where('status','!=','approved')->orderBy('id','desc')->with('contractproject','villaproject')->get();
        return view('admin.supplierassign.index',compact('assignviews'));
    }

    public function supplierassignshow($id)
    {
        $assignview = SupplierAssign::where('id',$id)->with('laboursupplier')->get();
        return view('admin.supplierassign.show',compact('assignview'));
    }

    public function supplierassignapprove($id)
    {
        $assign = SupplierAssign::find($id);

        $supplieramount = LabourSupplier::where('id',$assign->supplier_id)->first();
        $supplieramount->increment('total',$assign->amount);
        switch($assign->project_type)
        {
            case('contract'):
                $contract = ContractProject::find($assign->contractproject_id);
                $contract->update(['supplier_id' =>$assign->supplier_id]);
            break;
            case('villa'):
                $villa = Villa::where('villa_no',$assign->villa_id)->where('villaproject_id',$assign->villaproject_id)->first();
                $villa->update(['supplier_id' =>$assign->supplier_id]);
            break;
        }
        $payment = SupplierPayment::create([
             'project_type'  => $assign->project_type, 
             'contractproject_id'  => $assign->contractproject_id,
             'villaproject_id'  => $assign->villaproject_id,
             'villa_id'  => $assign->villa_id,
             'supplier_id'  => $assign->supplier_id,
             'total'  => $assign->amount,
             'pending'  => $assign->amount
        ]);
        $assign->update(['status'=>'approved']);
        
        flashSuccess('LabourSupplier Assigned Successfully');
        
        return redirect()->route('supplierassignview');
    }

    public function supplierassigncancel($id)
    {
        $assign = SupplierAssign::find($id)->update(['status'=>'cancel']);

        if($assign)
        {
            flashSuccess('LabourSupplier Assigned Cancelled Successfully');
            return back();
        }
        else
        {
            flashSuccess('Something Wrong');
            return back();
        }
    }
}
