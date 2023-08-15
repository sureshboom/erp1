<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandProject;
use App\Models\Siteengineer;
use App\Models\Chiefengineer;
use App\Models\User;

class LandProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landprojects = LandProject::select('id','project_name','total_area','no_plots','location')->orderBy('id','desc')->get();

        return view('admin.landproject.index',compact('landprojects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.landproject.create',compact('users'));
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
            'total_area' => 'required',
            'no_plots' => 'required',
            'status' => 'required',
        ]);

        $landproject = LandProject::create($input);
        if($landproject)
        {
            flashSuccess('Land Project Created Successfully');
            return redirect()->route('landproject.index');
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
        $landprojects = LandProject::where('id',$id)->with('siteengineer:id,user_id,user_code,phone,photo,location','chiefengineer:id,user_id,user_code,phone,photo','siteengineer.user:id,name,role','chiefengineer.user:id,name,role')->get();
        

        return view('admin.landproject.show',compact('landprojects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $landproject = LandProject::find($id);
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.landproject.edit',compact('users','landproject'));
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
            'total_area' => 'required',
            'no_plots' => 'required',
            'status' => 'required',
        ]);
        $landproject = LandProject::find($id)->update($input);
        if($landproject)
        {
            flashSuccess('Land Project Updated Successfully');
            return redirect()->route('landproject.index');
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
        LandProject::find($id)
            ->delete();

        flashSuccess('Land Project Removed Successfully');
        return back();
    }
}
