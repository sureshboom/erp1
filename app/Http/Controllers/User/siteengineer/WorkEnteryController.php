<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkEntry;
use App\Models\Siteengineer;
use App\Models\ContractProject;
use App\Models\VillaProject;

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
        $contractprojects = ContractProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workentry.create',compact('contractprojects','villaprojects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'working_date' => 'required',
            'works' => 'required',
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
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
        $contractprojects = ContractProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();

         return view('user.siteengineer.workentry.edit',compact('work','contractprojects','villaprojects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'working_date' => 'required',
            'works' => 'required',
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
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
