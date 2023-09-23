<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransforDetails;
use App\Models\Siteengineer;
use App\Models\ContractProject;
use App\Models\VillaProject;
use App\Models\Materialpurchase;

class TransforController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $transfors = TransforDetails::orderBy('id','desc')->with('mp','mp.villaproject:id,project_name,location','mp.contractproject:id,project_name,location')->get();

        return view('user.siteengineer.materialtransfor.index',compact('transfors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.materialtransfor.create',compact('contractprojects','villaprojects'));
    }

    public function contractprojectslist()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $projects = ContractProject::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.materialtransfor.contract',compact('projects'));
    }

    public function villaprojectslist()
    {
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $projects = VillaProject::where('siteengineer_id',$siteengineer->id)->get();

        return view('user.siteengineer.materialtransfor.villa',compact('projects'));
    }

    public function transforcreate($id,$type)
    {
        $query = Materialpurchase::where('project_type',$type);
        if($type == 'contract')
        {
            $query->where('contract_project_id',$id);
        }
        else
        {
            $query->where('villa_project_id',$id);
        }
        $materials = $query->get();
        
        $contractprojects = ContractProject::orderBy('id','desc')->get();
        $villaprojects = VillaProject::orderBy('id','desc')->get();
        return view('user.siteengineer.materialtransfor.create',compact('contractprojects','villaprojects','materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $input = $request->validate([
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
        ]);

        
        for ($i = 0; $i < count($request->meterial_id); $i++) 
        {
            $materials = Materialpurchase::find($request->meterial_id[$i]);
            $data = [
             'project_type' => $request->project_type,
             'mp_id' =>$request->meterial_id[$i],
             'meterial_id' => $materials->meterial_id,
             'quantity' => $request->quantity[$i],
            ];
            $gty = $request->quantity[$i];
            if($request->project_type == 'villa')
            {
                $data['project_id'] = $request->villa_project_id;
                $mpv = Materialpurchase::where('project_type',$request->project_type)->where('meterial_id',$materials->meterial_id)->where('villa_project_id',$request->villa_project_id)->first();

                if($mpv)  
                {
                    
                    $mpv->transfor_in += $request->quantity[$i];
                    $mpv->save();
                    $materials->transfor_out += $request->quantity[$i];
                    $materials->save();
                    TransforDetails::create($data);
                }
                else
                {
                    $materials->transfor_out += $request->quantity[$i];
                    $materials->save();
                    $mp = Materialpurchase::create([
                        'project_type' => $request->project_type,
                        'villa_project_id' => $request->villa_project_id,
                        'meterial_id' => $materials->meterial_id,
                        'transfor_in' => $gty,
                        'quantity' => 0,
                    ]);
                    TransforDetails::create($data);
                }
            }
            else
            {
               $data['project_id'] = $request->contract_project_id;
                $mpv = Materialpurchase::where('project_type',$request->project_type)->where('meterial_id',$materials->meterial_id)->where('contract_project_id',$request->contract_project_id)->first();
                if($mpv)  
                {
                    
                    $mpv->transfor_in += $request->quantity[$i];
                    $mpv->save();
                    $materials->transfor_out += $request->quantity[$i];
                    $materials->save();
                    
                    TransforDetails::create($data);
                }
                else
                {
                    $materials->transfor_out += $request->quantity[$i];
                    $materials->save();
                    $mp = Materialpurchase::create([
                        'project_type' => $request->project_type,
                        'contract_project_id' => $request->contract_project_id,
                        'meterial_id' => $materials->meterial_id,
                        'transfor_in' => $gty,
                        'quantity' => 0,
                    ]);
                    TransforDetails::create($data);
                }
            }
            
            
        }

        flashSuccess('Material Transfor Successfully');

        return redirect()->route('siteengineer.material_transfors.index');
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
        TransforDetails::find($id)->delete();

        flashSuccess('Transfor Material Removed');
        return back();
    }
}
