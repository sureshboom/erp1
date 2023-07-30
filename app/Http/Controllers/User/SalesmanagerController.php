<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Telecaller;
use App\Models\Telework;
use App\Models\Salesperson;
use App\Models\Sitevisitarrange;

class SalesmanagerController extends Controller
{
    //
    public function dashboard()
    {
        
        return view('user.salesmanager.dashboard');
    }

    public function allcustomers()
    {
         $customers = Customer::select('id','customer_name','created_by_type','created_by_id','created_at','phone','location','interested_project','interested_area','source','feedback')->with('telecaller:id,user_id','salesperson:id,user_id','telecaller.user:id,name','salesperson.user:id,name')->get();
         
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
        $siteviews = Sitevisitarrange::select('id','customer_id','date','site_name','status','received_id')->with('customer:id,customer_name')->get();
        return view('user.salesmanager.siteview',compact('siteviews'));
    }

    public function siteviewshow($id)
    {
     $siteviews = Sitevisitarrange::select('id','customer_id','date','site_name','status','received_id')->where('id',$id)->with('customer','salesperson:id,user_id,user_code')->get();
        return view('user.salesmanager.siteviewshow',compact('siteviews'));   
    }

    public function siteviewchange($id){
        $change = Sitevisitarrange::where('id',$id)->update([
            'status' => 'closed',
        ]);

        if ($change) {
            flashSuccess('Sitevisit Closed Successfully');
            return back();
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }
}
