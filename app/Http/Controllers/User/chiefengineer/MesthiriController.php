<?php

namespace App\Http\Controllers\User\chiefengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesthiri;
use App\Models\MesthiriAssign;
use App\Models\Chiefengineer;
use App\Models\LandProject;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\site;

class MesthiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mesthiris = Mesthiri::orderBy('id','desc')->get();

        return view('user.chiefengineer.mesthiri.index',compact('mesthiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.chiefengineer.mesthiri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'phone' => 'required',
            'alternate_no' => 'nullable',
            'location' => 'required',
            'gpay' => 'nullable',
            'account' => 'nullable',
        ]);

        $mesthiri = Mesthiri::create($input); 
        if($mesthiri)
        {
            flashSuccess('Mesthiri Created Successfully');
            return redirect()->route('chiefengineer.mesthiri.index');
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
        // $mesthiriassigns = MesthiriAssign::where('site_id',$id)->orderBy('id','desc')->get();
        // return view('user.chiefengineer.mesthiri.show',compact('mesthiriassigns'));
    }

    public function assigncontract($id)
    {
        $mesthiriassigns = MesthiriAssign::where('contract_project_id',$id)->orderBy('id','desc')->get();
        return view('user.chiefengineer.mesthiri.showcontract',compact('mesthiriassigns'));
    }

    public function assignvilla($id)
    {
        $mesthiriassigns = MesthiriAssign::where('villa_project_id',$id)->orderBy('id','desc')->get();
        return view('user.chiefengineer.mesthiri.showvilla',compact('mesthiriassigns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mesthiri = Mesthiri::find($id);

        return view('user.chiefengineer.mesthiri.edit',compact('mesthiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'phone' => 'required',
            'alternate_no' => 'nullable',
            'location' => 'required',
            'gpay' => 'nullable',
            'account' => 'nullable',
        ]);

        $mesthiri = Mesthiri::find($id)->update($input); 
        if($mesthiri)
        {
            flashSuccess('Mesthiri Updated Successfully');
            return redirect()->route('chiefengineer.mesthiri.index');
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
        Mesthiri::find($id)->delete();
        flashSuccess('Mesthiri removed Successfully');
        return back();
    }

    public function mesthiricontract()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::where('chiefengineer_id',$chiefengineer->id)->get();

        return view('user.chiefengineer.mesthiri.view',compact('contractprojects'));
    }

    public function mesthirivilla()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $villaprojects = VillaProject::where('chiefengineer_id',$chiefengineer->id)->get();

        return view('user.chiefengineer.mesthiri.villaview',compact('villaprojects'));
    }

    public function assign()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::where('chiefengineer_id',$chiefengineer->id)->get();
        $villaprojects = VillaProject::where('chiefengineer_id',$chiefengineer->id)->get();
        $mesthiris = Mesthiri::select('id','name','nickname')->get();

        return view('user.chiefengineer.mesthiri.assign',compact('contractprojects','villaprojects','mesthiris'));
    }

    public function assignstore(Request $request)
    {
        $input = $request->validate([
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
            'mesthiri_id' => 'required',
        ]);

        $projectType = $request->project_type;
        $projectId = ($projectType === 'contract') ? $request->contract_project_id : $request->villa_project_id;
        $model = ($projectType === 'contract') ? ContractProject::class : VillaProject::class;

        $project = $model::find($projectId);

        if ($project->mesthiri_id == $request->mesthiri_id) {
            flashError('Already Exists');
            return back();
        }

        $projects = $project->update(['mesthiri_id' => $request->mesthiri_id]);

        if ($projects) {
            MesthiriAssign::create($input);
            flashSuccess('Mesthiri Assigned Successfully');
            return ($projectType === 'contract')
                ? redirect()->route('chiefengineer.mesthiricontract')
                : redirect()->route('chiefengineer.mesthirivilla');
        } else {
            flashError('Something Wrong');
            return back();
        }
    }

    // public function assignstore(Request $request)
    // {
        
    //     $input = $request->validate([
    //         'project_type' => 'required',
    //         'contract_project_id' => 'required_if:project_type,contract',
    //         'villa_project_id' => 'required_if:project_type,villa',
    //         'mesthiri_id' => 'required',
    //     ]);
    //     if($request->project_type == 'contract')
    //     {
    //         $project = ContractProject::find($request->contract_project_id);
    //         if($project->mesthiri_id == $request->mesthiri_id)
    //         {
    //             flashError('Already Exists');
    //             return back();
    //         }
    //         else
    //         {
    //             $projects = $project->update(['mesthiri_id' => $request->mesthiri_id]);
    //             if($projects)
    //             {
    //                 MesthiriAssign::create($input);
    //                 flashSuccess('Mesthiri Assigned Successfully');
    //                 return redirect()->route('chiefengineer.mesthiricontract');
    //             }
    //             else
    //             {  
    //                 flashError('Something Wrong');
    //                 return back();
    //             }
    //         }
    //     }
    //     else
    //     {
    //         $project = VillaProject::find($request->villa_project_id);

    //         if($project->mesthiri_id == $request->mesthiri_id)
    //         {
    //             flashError('Already Exists');
    //             return back();
    //         }
    //         else
    //         {
    //             $projects = $project->update(['mesthiri_id' => $request->mesthiri_id]);
    //             if($projects)
    //             {
    //                 MesthiriAssign::create($input);
    //                 flashSuccess('Mesthiri Assigned Successfully');
    //                 return redirect()->route('chiefengineer.mesthirivilla');
    //             }
    //             else
    //             {  
    //                 flashError('Something Wrong');
    //                 return back();
    //             }
    //         }
    //     }
        
    // }
}
