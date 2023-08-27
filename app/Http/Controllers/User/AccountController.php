<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materialin;
use App\Models\Materialpurchasehistory;
use App\Models\Supplier;

class AccountController extends Controller
{

    public function dashboard()
    {
        
        return view('user.account.dashboard');
    }

    public function order()
    {
        
        $materials = Materialin::where('status','!=','request')->get();
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
        $materialamount = Materialin::find($id);
        $suppliers = Supplier::select('id','supplier_name')->get();

        return view('user.account.material.edit',compact('materialamount','suppliers'));
    }
    public function amountstore(Request $request,$id)
    {
        $input = $request->validate([
            'supplier_id' => 'required',
            'amount' => 'required',
        ]);

        $materialin = Materialin::find($id)->update(['supplier_id' => $request->supplier_id,'amount' => $request->amount,'status' => 'order']);

        if($materialin)
        {
            // $supplierv = Supplier::find($request->supplier_id)->increment('')
            flashSuccess('Material Order Placed');
            return redirect()->route('account.materialstatus');
        }
        else
        {
            flashError('Something Wrong');
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
