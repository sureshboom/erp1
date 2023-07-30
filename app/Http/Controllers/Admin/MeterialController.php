<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meterial;

class MeterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meterials = Meterial::select('id','meterial_name','unit')->get();
        return view('admin.meterial.index',compact('meterials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.meterial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'meterial_name' => 'required',
            'unit' => 'required'
        ]);

        $meterial = Meterial::create($input);

        if($meterial)
        {
            flashSuccess('New Meterial Added Successfully');
            return redirect()->route('meterial.index');
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
        $meterial = Meterial::find($id);
        return view('admin.meterial.edit',compact('meterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->validate([
            'meterial_name' => 'required',
            'unit' => 'required'
        ]);

        $meterial = Meterial::where('id',$id)->update($input);

        if($meterial)
        {
            flashSuccess('Meterial updated Successfully');
            return redirect()->route('meterial.index');
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
        //
        Meterial::find($id)->delete();
        flashSuccess('Material removed Successfully');
        return back();
    }
}
