<?php

namespace App\Http\Controllers\User\siteengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerEntry;
use App\Models\Worker;
use App\Models\Siteengineer;
use App\Models\Site;

class WorkerEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id')->where('siteengineer_id',$siteengineer->id)->get();
        $workers = WorkerEntry::whereIn('site_id', $sites->pluck('id'))->orderBy('id','desc')->get();
        return view('user.siteengineer.workerentry.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workers = Worker::select('name')->get();
        $siteengineer = Siteengineer::select('id','user_id')->where('user_id',auth()->user()->id)->first();
        $sites = Site::select('id','sitename')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workerentry.create',compact('workers','sites'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'site_id' => 'required',
            'mesthiri_id' => 'required',
            'workeddate' => 'required'
        ]);

        
        
        $workers = WorkerEntry::where('site_id',$request->site_id)->where('mesthiri_id',$request->mesthiri_id)->where('workeddate',$request->workeddate)->get();
        if($workers->isNotEmpty())
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
                    'site_id' => $request->site_id,
                    'mesthiri_id' => $request->mesthiri_id,
                    'workeddate' => $request->workeddate,
                    'workers' => $workers,
                    'count' => array_sum($request['count']),
                    'status' => 'pending',
                ];
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
        $sites = Site::select('id','sitename')->where('siteengineer_id',$siteengineer->id)->get();
        return view('user.siteengineer.workerentry.edit',compact('worker','workers','sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'site_id' => 'required',
            'mesthiri_id' => 'required',
            'workeddate' => 'required'
        ]);
        $workers = [];
        
            foreach ($request['worker_type'] as $index => $workerType) {
                $workers[] = [$workerType => $request['count'][$index]];

            }
            
            $data = [
                    'site_id' => $request->site_id,
                    'mesthiri_id' => $request->mesthiri_id,
                    'workeddate' => $request->workeddate,
                    'workers' => $workers,
                    'count' => array_sum($request['count']),
                    'status' => 'pending',
                ];
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WorkerEntry::find($id)->delete();
        flashSuccess('Workers Entry Removed Successfully');
        return back();
    }
}
