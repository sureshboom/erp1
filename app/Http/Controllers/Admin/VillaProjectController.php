<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillaProject;
use App\Models\Siteengineer;
use App\Models\Chiefengineer;
use App\Models\User;

class VillaProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villaprojects = VillaProject::select('id','project_name','total_land_area','total_buildup_area','no_of_unit','location')->orderBy('id','desc')->get();

        return view('admin.villaproject.index',compact('villaprojects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.villaproject.create',compact('users'));
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
            'no_of_unit' => 'required',
            'status' => 'required',
        ]);
        

        $villaproject = VillaProject::create($input);
        if($villaproject)
        {
            flashSuccess('Villa Project Created Successfully');
            return redirect()->route('villaproject.index');
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
      $villaprojects = VillaProject::where('id',$id)->with('siteengineer:id,user_id,user_code,phone,photo,location','chiefengineer:id,user_id,user_code,phone,photo','siteengineer.user:id,name,role','chiefengineer.user:id,name,role','villas')->get();
        

        return view('admin.villaproject.show',compact('villaprojects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $villaproject = VillaProject::find($id);
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.villaproject.edit',compact('users','villaproject'));
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
            'no_of_unit' => 'required',
            'status' => 'required',
        ]);
        $villaproject = VillaProject::find($id)->update($input);
        if($villaproject)
        {
            flashSuccess('Villa Project Updated Successfully');
            return redirect()->route('villaproject.index');
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
       VillaProject::find($id)
            ->delete();

        flashSuccess('Villa Project Removed Successfully');
        return back();
    }
}
