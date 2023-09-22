<?php

namespace App\Http\Controllers\User\chiefengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chiefengineer;
use App\Models\Materialin;
use App\Models\Meterial;
use App\Models\Materialpurchase;
use App\Models\Materialpurchasehistory;

class MaterialstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $materials = Materialin::where('chiefengineer_id',$chiefengineer->id)->whereIn('status',['request','approved','cancel'])->get();
        return view('user.chiefengineer.materialstatus.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $materialspurs = Materialpurchasehistory::where('materialin_id',$id)->get();
        $siteid = Materialpurchasehistory::select('project_type','contract_project_id','villa_project_id','materialin_id')->where('materialin_id',$id)->first();
        $materials = Meterial::select('id','meterial_name')->get();
        return view('user.chiefengineer.materialstatus.edit',compact('materials','siteid','materialspurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $delete = Materialpurchasehistory::where('materialin_id',$id)->get();
        foreach ($delete as $history) {
            
            $history->delete();
        }
        
        if($delete)
        {
            $meterialstatus = Materialin::find($request->materialin_id)->update(['status' => 'request']);
            if($request->project_type == 'villa')
            {
                for ($i = 0; $i < count($request->meterial_id); $i++) 
                {
                    $data = [
                        'project_type' => $request->project_type,
                        'villa_project_id' =>$request->villa_project_id,
                        'materialin_id' => $request->materialin_id,
                        'meterial_id' => $request->meterial_id[$i],
                        'quantity' => $request->quantity[$i],
                        'description' => $request->description[$i],
                    ];

                    $materialQuantity = Materialpurchase::where('villa_project_id', $data['villa_project_id'])
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
                return redirect()->route('chiefengineer.material_status.index');
            }
            elseif($request->project_type == 'contract')
            {
                for ($i = 0; $i < count($request->meterial_id); $i++) 
                {
                    $data = [
                        'project_type' => $request->project_type,
                        'contract_project_id' =>$request->contract_project_id,
                        'materialin_id' => $request->materialin_id,
                        'meterial_id' => $request->meterial_id[$i],
                        'quantity' => $request->quantity[$i],
                        'description' => $request->description[$i],
                    ];

                    $materialQuantity = Materialpurchase::where('contract_project_id', $data['contract_project_id'])
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
                return redirect()->route('chiefengineer.material_status.index');
            }
            
        }
        else
        {
            flashSuccess('Something Wrong plz try again');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
