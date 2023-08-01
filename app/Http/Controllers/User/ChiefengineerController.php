<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chiefengineer;
use App\Models\Site;
use App\Models\Supplier;
use App\Models\Materialin;
use App\Models\Materialpurchase;
use App\Models\Materialpurchasehistory;

class ChiefengineerController extends Controller
{
    //
    public function dashboard()
    {
        
        return view('user.chiefengineer.dashboard');
    }

    public function assignedsite()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('chiefengineer_id',$chiefengineer->id)->get();

        return view('user.chiefengineer.site',compact('sites'));
    }

    public function suppliers()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return view('user.chiefengineer.suppliers',compact('suppliers'));
    }

    public function order()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $materials = Materialin::where('chiefengineer_id',$chiefengineer->id)->get();
        return view('user.chiefengineer.materialstatus.index',compact('materials'));
    }

    public function show($id)
    {
        $materials = Materialpurchasehistory::where('materialin_id',$id)->get();
        $materialinid = $id;
        return view('user.chiefengineer.materialstatus.show',compact('materials','materialinid'));
    }
    public function materialapprove($id)
    {
        $materialin = Materialin::where('id',$id)->update(['status' => 'approved']);
        if ($materialin) {
            flashSuccess('Meterial Approved Successfully');
            return back();
        }
        else
        {
            flashError('Something Wrong plz try again');
            return back();
        }
    }

    public function materialcancel($id)
    {
     
        $materialin = Materialin::where('id',$id)->update(['status' => 'cancel']);

        if ($materialin) {
            flashSuccess('Meterial Order Cancelled Successfully');
            return back();
        }
        else
        {
            flashError('Something Wrong plz try again');
            return back();
        }
    }
    

}
