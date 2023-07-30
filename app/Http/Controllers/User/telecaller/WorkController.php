<?php

namespace App\Http\Controllers\User\telecaller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Telework;
use App\Models\Telecaller;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $works = Telework::where('telecaller_id',$telecaller->id)->get();
        return view('user.telecaller.work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.telecaller.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input =$request->validate([
            'called' => 'required|numeric',
            'follow_up' => 'required|numeric',
            'site_visit' => 'required|numeric',
        ]);

        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $input['telecaller_id'] = $telecaller->id;

        $cust = Telework::create($input);

        if($cust){
            flashSuccess('Today Work detail created Successfully');
            return redirect()->route('telecaller.todays_work.index');
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
        $work = Telework::find($id);
        return view('user.telecaller.work.edit',compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input =$request->validate([
            'called' => 'required|numeric',
            'follow_up' => 'required|numeric',
            'site_visit' => 'required|numeric',
        ]);

        $work = Telework::where('id',$id)->update($input);

        if($work){
            flashSuccess('Today Work detail Updated Successfully');
            return redirect()->route('telecaller.todays_work.index');
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
        Telework::find($id)
            ->delete();

        flashSuccess('Work Removed Successfully');
        return redirect()->route('telecaller.todays_work.index');
    }
}
