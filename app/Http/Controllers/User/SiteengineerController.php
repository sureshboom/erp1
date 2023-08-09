<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siteengineer;
use App\Models\Site;

class SiteengineerController extends Controller
{
    //

    public function dashboard()
    {
        
        return view('user.siteengineer.dashboard');
    }

    public function assignedsite()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.site',compact('sites'));
    }

    public function mesthiri()
    {
        $siteengineer = Siteengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.mesthiri',compact('sites'));
    }
}
