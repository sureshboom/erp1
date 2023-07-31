<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materialin;
use App\Models\Meterial;
use App\Models\Materialpurchase;
use App\Models\Materialpurchasehistory;
use App\Models\Supplier;

use App\Models\Siteengineer;
use App\Models\Site;

class MaterialrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $materials = Materialin::all();
        return view('user.siteengineer.materialorder.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id','sitename')->where('siteengineer_id',$siteengineer->id)->get();
        $suppliers = Supplier::get();
        $materials = Meterial::select('id','meterial_name')->get();
        return view('user.siteengineer.materialorder.create',compact('suppliers','sites','materials'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'supplier_id' => 'required',
            'site_id' => 'required',
            'amount' => 'required|numeric',
        ]);
        $site = Site::select('id','siteengineer_id','chiefengineer_id')->find($request->site_id);
        $materialin = Materialin::create([
            'site_id' => $site->id,
            'supplier_id' => $request->supplier_id,
            'siteengineer_id' => $site->siteengineer_id,
            'chiefengineer_id' => $site->chiefengineer_id,
            'amount' => $request->amount,
            'status' => 'order',
        ]);
        if($materialin)
        {
            for ($i = 0; $i < count($request->meterial_id); $i++) 
            {
                $data = [
                    'site_id' => $site->id,
                    'materialin_id' =>$materialin->id,
                    'meterial_id' => $request->meterial_id[$i],
                    'quantity' => $request->quantity[$i],
                ];

                $materialQuantity = Materialpurchase::where('site_id', $data['site_id'])
                                        ->where('meterial_id', $data['meterial_id'])
                                        ->first();
                if ($materialQuantity) {
                    $materialQuantity->quantity += $data['quantity'];
                    $materialQuantity->save();
                } else {
                    Materialpurchase::create($data);
                }
                Materialpurchasehistory::create($data);
            }
            flashSuccess('Order Placed Successfully');
            return redirect()->route('siteengineer.material_order.index');
        }
        else
        {
            flashSuccess('Something Wrong plz try again');
            return back();
        }

        // return $request;
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
