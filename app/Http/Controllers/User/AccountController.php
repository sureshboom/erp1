<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materialin;
use App\Models\Materialpurchasehistory;

class AccountController extends Controller
{

    public function dashboard()
    {
        
        return view('user.account.dashboard');
    }

    public function order()
    {
        
        $materials = Materialin::where('status','!=','order')->get();
        return view('user.account.material.index',compact('materials'));
    }

    public function show($id)
    {
        $materials = Materialpurchasehistory::where('materialin_id',$id)->get();
        $materialinid = $id;
        return view('user.account.material.show',compact('materials','materialinid'));
    }

    public function materialpaid($id)
    {
        $materialin = Materialin::where('id',$id)->update(['status' => 'paid']);
        if ($materialin) {
            flashSuccess('Meterial Payment Paid Successfully');
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
