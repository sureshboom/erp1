<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\User;
use App\Models\Supervisor;
use App\Models\owner;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::select('id','sitename','siteid','sitetype','location','owner_id')->with('owner:id,owner_name')->get();

        return view('admin.site.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $site =Site::max('id');
        $owners = Owner::select('id','owner_name')->get();
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.site.create',compact('owners','users','site'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $input = $request->validate([
            'sitename' => 'required',
            'siteid' =>  'required',
            'sitetype' => 'required',
            'status' => 'required',
            'owner_id' => 'required',
            'siteengineer_id' => 'required',
            'chiefengineer_id' => 'required',
            'location' => 'required',
            'amount' => 'required',
            'site_date' => 'nullable',
        ]);
        if($request->site_date)
        {
            $dateTime = Carbon::parse($request->site_date);
            $date =  $dateTime->format('Y-m-d');

        }
        else{
            $date = null;
        }
        
        $site = Site::create([
            'sitename' => $request->sitename,
            'siteid' => $request->siteid,
            'sitetype' => $request->sitetype,
            'status' => $request->status,
            'owner_id' => $request->owner_id,
            'siteengineer_id' => $request->siteengineer_id,
            'chiefengineer_id' => $request->chiefengineer_id,
            'location' => $request->location,
            'site_date' => $date,
            'amount' => $request->amount
        ]);
        if($site)
        {
            flashSuccess('Site Created Successfully');
            return redirect()->route('site.index');
        }
        else
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
        $sites = Site::select('id','owner_id','siteengineer_id','chiefengineer_id','sitename','siteid','sitetype','site_date','status','location')->where('id',$id)->with('owner:id,owner_name,phone,location,referred_by','siteengineer:id,user_id,user_code,phone,photo,location','chiefengineer:id,user_id,user_code,phone,photo','siteengineer.user:id,name,role','chiefengineer.user:id,name,role')->get();
        

        return view('admin.site.show',compact('sites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $site = Site::find($id);
        $owners = Owner::select('id','owner_name')->get();
        $users = User::select('id','name')->whereIn('role',['siteengineer','chiefengineer'])->with('chiefengineer:id,user_id','siteengineer:id,user_id')->get();
        return view('admin.site.edit',compact('owners','users','site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->validate([
            'sitename' => 'required',
            'siteid' =>  'required',
            'sitetype' => 'required',
            'status' => 'required',
            'owner_id' => 'required',
            'siteengineer_id' => 'required',
            'chiefengineer_id' => 'required',
            'location' => 'required',
            'site_date' => 'nullable',
            'amount' => 'required',
        ]);
        if($request->site_date)
        {
            $dateTime = Carbon::parse($request->site_date);
            $date =  $dateTime->format('Y-m-d');

        }
        else{
            $date = null;
        }
        $site = Site::where('id',$id)->update([
            'sitename' => $request->sitename,
            'siteid' => $request->siteid,
            'sitetype' => $request->sitetype,
            'status' => $request->status,
            'owner_id' => $request->owner_id,
            'siteengineer_id' => $request->siteengineer_id,
            'chiefengineer_id' => $request->chiefengineer_id,
            'location' => $request->location,
            'site_date' => $date,
            'amount' => $request->amount,
        ]);
        if($site)
        {
            flashSuccess('Site Updated Successfully');
            return redirect()->route('site.index');
        }
        else
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
        //
        Site::find($id)
            ->delete();

        flashSuccess('Site Removed Successfully');
        return redirect()->route('site.index');
    }
}
