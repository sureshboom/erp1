<?php

namespace App\Http\Controllers\User\salesperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salesperson;
use App\Models\Customer;
use App\Models\Sitevisitarrange;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $salesperson =Salesperson::where('user_id',auth()->user()->id)->first();
        $customers = Customer::where('created_by_type',auth()->user()->role)
                    ->where('created_by_id',$salesperson->id)
                    ->get();
        return view('user.salesperson.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.salesperson.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input =$request->validate([
            'customer_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'interested_project' => 'required',
            'interested_area' => 'required',
            'feedback' => 'required',
            'source' => 'required',
            'site_name' => 'required'
        ]);
        
        $salesperson = Salesperson::where('user_id',auth()->user()->id)->first();
        $input['created_by_type'] = auth()->user()->role;
        $input['created_by_id'] = $salesperson->id;
        $Date = Carbon::now()->format('Y-m-d');
        $cust = Customer::create($input);

        if($cust){
            $sitevisit = Sitevisitarrange::create([
                'customer_id' =>$cust->id,
                'site_name' =>$request->site_name,
                'date' =>$Date,
                'received_id' =>$salesperson->id,
                'status' => 'visited',
            ]);
            flashSuccess('Customer and Sitevisit created Successfully');
            return redirect()->route('salesperson.direct_customer.index');
        }
        else
        {
            flashError('Something wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer = Customer::find($id);
        return view('user.salesperson.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $input =$request->validate([
            'customer_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'interested_project' => 'required',
            'interested_area' => 'required',
            'feedback' => 'required',
            'source' => 'required'
        ]);
        
        
        $cust = Customer::where('id',$id)->update($input);

        if($cust){
            flashSuccess('Customer Updated Successfully');
            return redirect()->route('salesperson.direct_customer.index');
        }
        else
        {
            flashError('Something wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Customer::find($id)
            ->delete();

        flashSuccess('Customer Removed Successfully');
        return redirect()->route('salesperson.direct_customer.index');
    }

    public function salespersonvisit()
    {
        $sitevisits = Sitevisitarrange::where('status','!=','closed')->orderBy(
        DB::raw("CASE 
    WHEN status = 'open' THEN 1 
    WHEN status = 'visited' THEN 2 
    WHEN status = 'close' THEN 3 
    ELSE 4 
END"))->get();

        return view('user.salesperson.sitevisit.index',compact('sitevisits'));
    }
    public function viewvisitchange($id,$siteid)
    {
        $customer = Customer::find($id);
        $sitevisit = Sitevisitarrange::find($siteid);

        return view('user.salesperson.sitevisit.create',compact('sitevisit','customer'));
    }
    public function visitchange(Request $request,$id){
        $input = $request->validate(['feedback'=>'required']);
        $salesperson = Salesperson::where('user_id',auth()->user()->id)->first();
        $change = Sitevisitarrange::where('id',$id)->update([
            'status' => 'visited',
            'received_id' =>$salesperson->id,
        ]);

        if ($change) {
            Customer::find($request->customer_id)->update(['feedback'=>$request->feedback]);
            flashSuccess('Sitevisit Changed Successfully');
            return redirect()->route('salesperson.sitevisit');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }
}
