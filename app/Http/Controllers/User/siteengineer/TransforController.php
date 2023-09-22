<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransforDetails;
use App\Models\Siteengineer;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\Materialpurchase;

class TransforController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $transfors = TransforDetails::orderBy('id','desc')->get();

        return view('user.siteengineer.materialtransfor.index',compact('transfors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.materialtransfor.create',compact('contractprojects','villaprojects'));
    }

    public function contractprojectslist()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $projects = ContractProject::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.materialtransfor.contract',compact('projects'));
    }

    public function villaprojectslist()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $projects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.materialtransfor.villa',compact('projects'));
    }

    public function transforcreate($id,$type)
    {
        $query = Materialpurchase::where('project_type',$type);
        if($type == 'contract')
        {
            $query->where('contract_project_id',$id);
        }
        else
        {
            $query->where('villa_project_id',$id);
        }
        $materials = $query->get();
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.materialtransfor.create',compact('contractprojects','villaprojects','materials'));
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
