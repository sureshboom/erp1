<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Telecaller;
use App\Models\Telework;
use App\Models\Salesperson;
use App\Models\Sitevisitarrange;
use Illuminate\Support\Facades\DB;

class SalesmanagerController extends Controller
{
    //
    public function dashboard()
    {
        
        return view('user.salesmanager.dashboard');
    }

    public function allcustomers()
    {
         $customers = Customer::select('id','customer_name','created_by_type','created_by_id','created_at','phone','location','interested_project','interested_area','source','feedback','response')->with('telecaller:id,user_id','salesperson:id,user_id','telecaller.user:id,name','salesperson.user:id,name')->get();
         
         // $customers = Customer::with('creator')->get();

// Lazy load telecaller and salesperson relationships for specific customers
        
        
        return view('user.salesmanager.customers',compact('customers'));
    }


    public function telework()
    {
        $teleworks = Telework::with('telecaller:id,user_id,user_code','telecaller.user:id,name')->get();
        return view('user.salesmanager.teleworks',compact('teleworks'));
    }

    public function siteview()
    {
        $siteviews = Sitevisitarrange::select('id','customer_id','date','site_name','status','received_id')->orderBy(
        DB::raw("CASE 
    WHEN status = 'open' THEN 1 
    WHEN status = 'visited' THEN 2 
    WHEN status = 'close' THEN 3 
    ELSE 4 
END"))->with('customer:id,customer_name,remarks')->get();
        return view('user.salesmanager.siteview',compact('siteviews'));
    }

    public function siteviewshow($id)
    {
     $siteviews = Sitevisitarrange::select('id','customer_id','date','site_name','status','received_id')->where('id',$id)->with('customer','salesperson:id,user_id,user_code')->get();
        return view('user.salesmanager.siteviewshow',compact('siteviews'));   
    }

    public function viewsiteviewchange($id,$siteid)
    {
        $customer = Customer::find($id);
        $sitevisit = Sitevisitarrange::find($siteid);

        return view('user.salesmanager.siteviewshows',compact('sitevisit','customer'));
    }

    public function siteviewchange(Request $request,$id){
        $input = $request->validate(['status' =>'required','remarks' =>'required','customer_id' =>'required']);
        $change = Sitevisitarrange::where('id',$id)->update([
            'status' => $request->status
        ]);
        Customer::where('id',$request->customer_id)->update(['remarks' => $request->remarks]);
        if ($change) 
        {
            
            flashSuccess('Sitevisit Closed Successfully');
            return redirect()->route('salesmanager.siteview');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }
}
