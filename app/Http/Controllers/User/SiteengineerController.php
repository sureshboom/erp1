<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siteengineer;
use App\Models\LandProject;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\Site;

class SiteengineerController extends Controller
{
    //

    public function dashboard()
    {
        
        return view('user.siteengineer.dashboard');
    }

    public function landsite()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $landprojects = LandProject::select('id','project_name','location','siteengineer_id','chiefengineer_id')->where('siteengineer_id',$siteengineer->id)->orderBy('id','desc')->get();

        return view('user.siteengineer.assigned.landsite',compact('landprojects'));
    }

    public function contractsite()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::select('id','project_name','location','siteengineer_id','chiefengineer_id')->where('siteengineer_id',$siteengineer->id)->orderBy('id','desc')->get();

        return view('user.siteengineer.assigned.contractsite',compact('contractprojects'));
    }

    public function villasite()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $villaprojects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.assigned.villasite',compact('villaprojects'));
    }

    public function mesthiri()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.mesthiri',compact('sites'));
    }

    public function contractprojectlist()
    {
        $projects = ContractProject::select('id','project_name')->get();
        return response()->json($projects);
    }

    public function villaprojectlist()
    {
        $projects = VillaProject::select('id','project_name')->get();
        return response()->json($projects);
    }
}
