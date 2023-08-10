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
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $materials = Materialin::where('siteengineer_id',$siteengineer->id)->whereIn('status',['order','cancel','approved'])->get();
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
        ]);
        $site = Site::select('id','siteengineer_id','chiefengineer_id')->find($request->site_id);
        $materialin = Materialin::create([
            'site_id' => $site->id,
            'supplier_id' => $request->supplier_id,
            'siteengineer_id' => $site->siteengineer_id,
            'chiefengineer_id' => $site->chiefengineer_id,
            'status' => 'order',
        ]);
        if($materialin)
        {
            for ($i = 0; $i < count($request->meterial_id); $i++) 
            {
                $data = [
                    'site_id' => $site->id,
                    'materialin_id' => $materialin->id,
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
        $materials = Materialpurchasehistory::where('materialin_id',$id)->with('materialin:id,status')->get();
        $materialinid = $id;
        return view('user.siteengineer.materialorder.sitematerial',compact('materials','materialinid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materialspurs = Materialpurchasehistory::where('materialin_id',$id)->get();
        $siteid = Materialpurchasehistory::select('site_id','materialin_id')->where('materialin_id',$id)->first();
        $materials = Meterial::select('id','meterial_name')->get();
        return view('user.siteengineer.materialorder.edit',compact('materials','siteid','materialspurs'));

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
        Materialin::find($id)->delete();
        flashSuccess('Order removed Successfully');
        return back();
    }

    public function purchasedelete($id)
    {
        Materialpurchasehistory::find($id)->delete();
        flashSuccess('Meterial removed Successfully');
        return back();
    }

    public function purchaseupdate(Request $request)
    {
        $delete = Materialpurchasehistory::where('materialin_id',$request->materialin_id)->get();
        foreach ($delete as $history) {
            
            $history->delete();
        }
        if($delete)
        {
            $meterialstatus = Materialin::find($request->materialin_id)->update(['status' => 'order']);
            for ($i = 0; $i < count($request->meterial_id); $i++) 
            {
                $data = [
                    'site_id' => $request->site_id,
                    'materialin_id' => $request->materialin_id,
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
            flashSuccess('Order Updated Successfully');
            return redirect()->route('siteengineer.material_order.index');
        }
        else
        {
            flashSuccess('Something Wrong plz try again');
            return back();
        }
    }

    public function received()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $materials = Materialin::where('siteengineer_id',$siteengineer->id)->whereIn('status',['paid','verified','received'])->get();
        return view('user.siteengineer.materialorder.received',compact('materials'));
    }

    public function verified($id)
    {
        $materialin = Materialin::find($id)->update(['status' => 'verified','notes'=>null]);
        flashSuccess('Material Order verified updated');
        return back();
    }

    public function note($id)
    {
        $materialin = Materialin::find($id);

        return view('user.siteengineer.materialorder.note',compact('materialin'));
    }

    public function notestore(Request $request,$id)
    {
        $input = $request->validate(['notes' => 'required']);
        $materialin = Materialin::find($id)->update(['notes' => $request->notes]);
        if($materialin)
        {
            flashSuccess('Notes Updated');
            return redirect()->route('siteengineer.received');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }
}
