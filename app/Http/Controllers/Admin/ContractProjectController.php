<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContractProject;
use App\Models\Siteengineer;
use App\Models\Chiefengineer;
use App\Models\User;

class ContractProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractprojects = ContractProject::select('id','project_name','total_land_area','total_buildup_area','location')->orderBy('id','desc')->get();

        return view('admin.contractproject.index',compact('contractprojects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.contractproject.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'project_name' => 'required',
            'chiefengineer_id' => 'required',
            'siteengineer_id' => 'required',
            'site_date' => 'required',
            'dtcp_no' => 'required',
            'reg_no' => 'required',
            'location' => 'required',
            'total_land_area' => 'required',
            'total_buildup_area' => 'required',
            'status' => 'required',
        ]);
        

        $contractproject = ContractProject::create($input);
        if($contractproject)
        {
            flashSuccess('Contract Project Created Successfully');
            return redirect()->route('contractproject.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $contractprojects = ContractProject::where('id',$id)->with('siteengineer:id,user_id,user_code,phone,photo,location','chiefengineer:id,user_id,user_code,phone,photo','siteengineer.user:id,name,role','chiefengineer.user:id,name,role')->get();
        

        return view('admin.contractproject.show',compact('contractprojects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contractproject = ContractProject::find($id);
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.contractproject.edit',compact('users','contractproject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'project_name' => 'required',
            'chiefengineer_id' => 'required',
            'siteengineer_id' => 'required',
            'site_date' => 'required',
            'dtcp_no' => 'required',
            'reg_no' => 'required',
            'location' => 'required',
            'total_land_area' => 'required',
            'total_buildup_area' => 'required',
            'status' => 'required',
        ]);
        $contractproject = ContractProject::find($id)->update($input);
        if($contractproject)
        {
            flashSuccess('Contract Project Updated Successfully');
            return redirect()->route('contractproject.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       ContractProject::find($id)
            ->delete();

        flashSuccess('Contract Project Removed Successfully');
        return back();
    }
}
