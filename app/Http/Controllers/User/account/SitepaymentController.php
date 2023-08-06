<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;

use App\Models\SitePaymentHistory;

class SitepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sitepayments = Site::orderBy('id', 'DESC')->get();
        return view('user.account.sitepayment.index',compact('sitepayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sites = Site::select('id','sitename')->get();
        return view('user.account.sitepayment.create',compact('sites'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'site_id' => 'required',
            'total' => 'required|numeric',
            'amount' => 'required|numeric',
            'paytype' => 'required',
        ]);

        $payment = SitePaymentHistory::create([
            'site_id' => $request->site_id,
            'paytype' => $request->paytype,
            'amount' => $request->amount,
            'payway' => $request->payway
        ]);
        if($payment)
        {
            $site = Site::where('id',$request->site_id)->update([
                'paid' => $request->paid,
                'pending' => $request->pending,
            ]);
            if($site)
            {
                flashSuccess('Site Payment Created Successfully');
                return redirect()->route('account.site_payment.index');
            }
            else
            {
                flashError('Something Wrong');
                return back();
            }
        }
        else
            {
                flashError('Something Wrong');
                return back();
            }


        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $historys = SitePaymentHistory::where('site_id',$id)->get();
        return view('user.account.sitepayment.show',compact('historys'));   

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $history = SitePaymentHistory::find($id);
        return view('user.account.sitepayment.edit',compact('history'));
        // return $history;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'amount' => 'required|numeric',
            'paytype' =>'required',
            'payway' => 'nullable'
        ]);

        $up = SitePaymentHistory::find($id)->update($input);
        if($up)
        {
            flashSuccess('Payment Updated Successfully');
            return redirect()->route('account.site_payment.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        SitePaymentHistory::find($id)->delete();
        flashSuccess('Site Payment Removed Successfully');
        return back();
    }

    public function getsite($siteid)
    {
        $payment = Site::where('id', $siteid)->first();
        return response()->json($payment);

    }
}
