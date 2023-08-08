<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::select('id','name')->get();
        return view('admin.worker.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.worker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            
        ]);

        $worker = Worker::create($input);

        if($worker)
        {
            flashSuccess('New Worker Added Successfully');
            return redirect()->route('worker.index');
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
        $worker = Worker::find($id);
        return view('admin.worker.edit',compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name' => 'required',

        ]);

        $worker = Worker::where('id',$id)->update($input);

        if($worker)
        {
            flashSuccess('Worker updated Successfully');
            return redirect()->route('worker.index');
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
        Worker::find($id)->delete();
        flashSuccess('Worker removed Successfully');
        return back();
    }
}
