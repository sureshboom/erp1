<?php

namespace App\Http\Controllers\User\telecaller;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitevisitarrange;
use App\Models\Customer;
use App\Models\Telecaller;

class SitevisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sitevisits = Sitevisitarrange::with('customer:id,customer_name')->get();
        return view('user.telecaller.sitevisit.index',compact('sitevisits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $customers = Customer::select('id','customer_name')->where('created_by_type','telecaller')->where('created_by_id',$telecaller->id)->get();
        return view('user.telecaller.sitevisit.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input =$request->validate([
            'customer_id' => 'required',
            'site_name' => 'required',
            'date' => 'required',
        ]);
        $input['status'] = 'open';
        $sitevisit = Sitevisitarrange::create($input);

        if($sitevisit){
            flashSuccess('Site Visit Arrange Created Successfully');
            return redirect()->route('telecaller.sitevisit.index');
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
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sitevisit = Sitevisitarrange::find($id);
        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $customers = Customer::select('id','customer_name')->where('created_by_type','telecaller')->where('created_by_id',$telecaller->id)->get();
        return view('user.telecaller.sitevisit.edit',compact('customers','sitevisit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $input =$request->validate([
            'customer_id' => 'required',
            'site_name' => 'required',
            'date' => 'required',
        ]);
        $dateTime = Carbon::parse($request->date);
        $date =  $dateTime->format('Y-m-d');
        $input['date'] = $date;
        $sitevisit = Sitevisitarrange::where('id',$id)->update($input);

        if($sitevisit){
            flashSuccess('Site Visit Arrange Updated Successfully');
            return redirect()->route('telecaller.sitevisit.index');
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
        Sitevisitarrange::find($id)
            ->delete();

        flashSuccess('Site Visit Removed Successfully');
        return redirect()->route('telecaller.sitevisit.index');
    }
}
