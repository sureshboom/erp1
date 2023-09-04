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
        //
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
    }
}
