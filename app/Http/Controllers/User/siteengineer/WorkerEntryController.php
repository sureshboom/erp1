<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerEntry;
use App\Models\Worker;
use App\Models\Siteengineer;
use App\Models\ContractProject;
use App\Models\VillaProject;


class WorkerEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $contractproject = ContractProject::select('id')->where('siteengineer_id',$siteengineer->id)->get();
        $villaproject = VillaProject::select('id')->where('siteengineer_id',$siteengineer->id)->get();
        $contractWorkerIds = WorkerEntry::whereIn('contract_project_id', $contractproject->pluck('id'))->pluck('id');
        $villaWorkerIds = WorkerEntry::whereIn('villa_project_id', $villaproject->pluck('id'))->pluck('id');

        $workerIds = $contractWorkerIds->merge($villaWorkerIds)->unique();

        $workers = WorkerEntry::whereIn('id', $workerIds)->orderBy('id', 'desc')->get();

        // $workers = WorkerEntry::whereIn('contract_project_id', $contractproject->pluck('id'))->whereIn('villa_project_id', $villaproject->pluck('id'))->orderBy('id','desc')->get();
        return view('user.siteengineer.workerentry.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workers = Worker::select('name')->get();
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        
        $contractprojects = ContractProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workerentry.create',compact('workers','contractprojects','villaprojects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $input = $request->validate([
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
            'mesthiri_id' => 'required',
            'workeddate' => 'required'
        ]);
        if($request->project_type == 'contract')
        {
            $workers = WorkerEntry::select('id')->where('contract_project_id',$request->contract_project_id)->where('mesthiri_id',$request->mesthiri_id)->where('workeddate',$request->workeddate)->first();
        }
        else
        {
            $workers = WorkerEntry::select('id')->where('villa_project_id',$request->villa_project_id)->where('mesthiri_id',$request->mesthiri_id)->where('workeddate',$request->workeddate)->first();
        }
        
        if($workers)
        {
            flashError('Already Exists');
            return back();
        }
        else
        {
            $workers = [];
        
            foreach ($request['worker_type'] as $index => $workerType) {
                $workers[] = [$workerType => $request['count'][$index]];

            }
            
            $data = [
                    'project_type' =>$request->project_type,
                    'mesthiri_id' => $request->mesthiri_id,
                    'workeddate' => $request->workeddate,
                    'workers' => $workers,
                    'count' => array_sum($request['count']),
                    'status' => 'pending',
                ];
            if($request->project_type == 'contract')
            {   
                $data['contract_project_id'] = $request->contract_project_id;
            }
            else
            {
                $data['villa_project_id'] = $request->villa_project_id;
            }
            WorkerEntry::create($data);
            flashSuccess('Workers Entry created Successfully');

            return redirect()->route('siteengineer.workerentry.index');
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
        $worker = WorkerEntry::find($id);
        $workers = Worker::select('name')->get();
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $contractprojects = ContractProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        $villaprojects = VillaProject::select('id','project_name')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workerentry.edit',compact('worker','workers','contractprojects','villaprojects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'project_type' => 'required',
            'contract_project_id' => 'required_if:project_type,contract',
            'villa_project_id' => 'required_if:project_type,villa',
            'mesthiri_id' => 'required',
            'workeddate' => 'required'
        ]);
        if($request->project_type == 'contract')
        {
            $worker = WorkerEntry::select('id')->where('contract_project_id',$request->contract_project_id)->where('mesthiri_id',$request->mesthiri_id)->where('workeddate',$request->workeddate)->first();
            $mesthiri = ContractProject::find($request->contract_project_id);
            $mesthiri_id = $mesthiri->mesthiri_id;
        }
        else
        {
            $worker = WorkerEntry::select('id')->where('villa_project_id',$request->villa_project_id)->where('mesthiri_id',$request->mesthiri_id)->where('workeddate',$request->workeddate)->first();
            $mesthiri = VillaProject::find($request->villa_project_id);
            $mesthiri_id = $mesthiri->mesthiri_id;
        }
        if($worker)
        {
            flashError('Already Exists');
            return back();     
        }
        else
        {
            $workers = [];
        
            foreach ($request['worker_type'] as $index => $workerType) {
                $workers[] = [$workerType => $request['count'][$index]];

            }
                
            $data = [
                    'project_type' =>$request->project_type,
                    'mesthiri_id' => $mesthiri_id,
                    'workeddate' => $request->workeddate,
                    'workers' => $workers,
                    'count' => array_sum($request['count']),
                    'status' => 'pending',
                ];
            if($request->project_type == 'contract')
            {   
                $data['contract_project_id'] = $request->contract_project_id;
            }
            else
            {
                $data['villa_project_id'] = $request->villa_project_id;
            }
            $update = WorkerEntry::find($id)->update($data);
            
            if($update)
            {
                flashSuccess('Workers Entry updated Successfully');

                return redirect()->route('siteengineer.workerentry.index');
            }
            else
            {
                flashError('Something Wrong');
                return back();
            }    
        }
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WorkerEntry::find($id)->delete();
        flashSuccess('Workers Entry Removed Successfully');
        return back();
    }

    public function getsite($type,$id)
    {
        $model = ($type === 'contract') ? ContractProject::class : VillaProject::class;
        $project = $model::find($id);

        return response()->json($project);
    }
}
