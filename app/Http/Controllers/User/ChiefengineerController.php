<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chiefengineer;
use App\Models\Site;
use App\Models\Supplier;
use App\Models\WorkEntry;
use App\Models\WorkerEntry;
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
        $materials = Materialin::where('chiefengineer_id',$chiefengineer->id)->whereIn('status',['order','approved','cancel'])->get();
        return view('user.chiefengineer.materialstatus.index',compact('materials'));
    }
    public function received()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $materials = Materialin::where('chiefengineer_id',$chiefengineer->id)->whereIn('status',['paid','verified','received'])->get();
        return view('user.chiefengineer.materialstatus.view',compact('materials'));
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

    public function workentry()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id')->where('chiefengineer_id',$chiefengineer->id)->get();
        $works = WorkEntry::whereIn('site_id', $sites->pluck('id'))->orderBy('id','desc')->get();
        return view('user.chiefengineer.works',compact('works'));
    }
    
    public function workverify($id)
    {
        $verify = WorkEntry::find($id)->update(['status' => 'verified']);
        if($verify)
        {
            flashSuccess('Work Details Verified Successfully');
            return back();
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    public function WorkerEntry()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id')->where('chiefengineer_id',$chiefengineer->id)->get();
        $workers = WorkerEntry::whereIn('site_id', $sites->pluck('id'))->orderBy('id','desc')->get();
        return view('user.chiefengineer.workerentry.index',compact('workers'));
    }

    public function Workersalary($id)
    {
        $workers = WorkerEntry::find($id);
        return view('user.chiefengineer.workerentry.edit',compact('workers'));
    }

    public function Workersalarychange(Request $request,$id)
    {
        $input = $request->validate([
            'salary' => 'required'
        ]);

        $salary = WorkerEntry::find($id)->update(['salary' => $request->salary,'status' => 'verified']);
        if($salary)
        {
            flashSuccess('Workers Salary created Successfully');
            return redirect()->route('chiefengineer.workersentry');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }
}
