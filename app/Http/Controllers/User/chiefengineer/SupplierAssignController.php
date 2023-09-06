<?php

namespace App\Http\Controllers\User\chiefengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierAssign;
use App\Models\LabourSupplier;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\Villa;

class SupplierAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ContractProject::select('id','project_name','location','supplier_id')->orderBy('id','desc')->get();

        return view('user.chiefengineer.laboursupplier.contract',compact('projects'));
    }

    public function villaprojectindex()
    {
        $projects = VillaProject::select('id','project_name','location')->orderBy('id','desc')->get();

        return view('user.chiefengineer.laboursupplier.villaproject',compact('projects'));
    }

    public function villaindex($id)
    {
        $projects = Villa::select('id','villaproject_id','villa_no','villa_area','supplier_id')->where('villaproject_id',$id)->orderBy('id','desc')->get();

        return view('user.chiefengineer.laboursupplier.villaindex',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villaprojects = VillaProject::select('id','project_name')->get();
        $contractprojects = ContractProject::select('id','project_name')->get();
        $laboursuppliers = LabourSupplier::select('id','name')->get();
        return view('user.chiefengineer.laboursupplier.assign',compact('villaprojects','contractprojects','laboursuppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'project_type' => 'required',
            'contractproject_id' => 'required_if:project_type,contract',
            'villaproject_id' => 'required_if:project_type,villa',
            'villa_id' => 'required_if:project_type,villa',
            'supplier_id' => 'required',
            'from_date' => 'required',
            'end_date' => 'required',
            'amount' => 'required|numeric'
        ]);
        
        switch($request->project_type)
        {
            case('contract'):
            $verify = SupplierAssign::where('contractproject_id',$request->contractproject_id)->where('supplier_id',$request->supplier_id)->first();
            break;
            case('villa'):
            $verify = SupplierAssign::where('villa_id',$request->villa_id)->where('villaproject_id',$request->villaproject_id)->where('supplier_id',$request->supplier_id)->first();
            break;
        }
        
        if($verify)
        {
            // return $verify;
            flashError('Already Exists');
            return back();
            
        }
        else
        {
            $assign = SupplierAssign::create($input);
            flashSuccess('Supplier Assigned Successfully');
            return redirect()->route('chiefengineer.supplierassignview');   
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
        SupplierAssign::find($id)->delete();
        flashSuccess('SupplierAssign Removed Successfully');
        return back();
    }

    public function villaviewlist(Request $request)
    {
        $villas = Villa::select('id','villa_no')->where('villaproject_id',$request->id)->get();
        return response()->json($villas);
    }

    public function suppliercontract($id)
    {
        $supplierassigns = SupplierAssign::select('id','contractproject_id','supplier_id','from_date','end_date','amount','created_at')->where('contractproject_id',$id)->orderBy('id','desc')->with('contractproject:id,project_name,location,total_land_area,total_buildup_area','laboursupplier:id,name,phone')->get();
        return view('user.chiefengineer.laboursupplier.contract.show',compact('supplierassigns'));
    }

    public function suppliervilla($id,$villa)
    {
        $supplierassigns = SupplierAssign::select('id','villaproject_id','villa_id','supplier_id','from_date','end_date','amount','created_at')->where('villaproject_id',$id)->where('villa_id',$villa)->orderBy('id','desc')->with('villaproject:id,project_name,location','laboursupplier:id,name,phone','villa')->get();
        return view('user.chiefengineer.laboursupplier.villa.show',compact('supplierassigns'));
        
    }

    public function supplierassignview()
    {
        $assignviews = SupplierAssign::where('status','!=','approved')->orderBy('id','desc')->with('contractproject','villaproject')->get();
        return view('user.chiefengineer.laboursupplier.assignview',compact('assignviews'));
    }
}
