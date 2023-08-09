<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkEntry;
use App\Models\Siteengineer;
use App\Models\Site;

class WorkEnteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $works = WorkEntry::orderBy('id','desc')->get();

         return view('user.siteengineer.workentry.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id','sitename')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workentry.create',compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'working_date' => 'required',
            'site_id' => 'required',
            'works' => 'required',
        ]);
        $input['status'] = 'pending';
        $works = WorkEntry::create($input);
        if($works)
        {
            flashSuccess('Todays Work Details Entered');
            return redirect()->route('siteengineer.workentry.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $work = WorkEntry::find($id);
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id','sitename')->where('siteengineer_id',$siteengineer->id)->get();

         return view('user.siteengineer.workentry.edit',compact('work','sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'working_date' => 'required',
            'site_id' => 'required',
            'works' => 'required',
        ]);
        $works = WorkEntry::find($id)->update($input);
        if($works)
        {
            flashSuccess('Work Details Updated');
            return redirect()->route('siteengineer.workentry.index');
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
        //
        WorkEntry::find($id)->delete();
        flashSuccess('Work Details Removed');
        return back();
    }
}
