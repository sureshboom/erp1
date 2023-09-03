<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VillaProject;
use App\Models\Villa;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villaprojects = VillaProject::select('id','project_name')->get();

        return view('admin.villaproject.villacreate',compact('villaprojects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'villaproject_id' => 'required'
        ]);
        for ($i = 0; $i < count($request->villa_no); $i++)
        {
            $data = [
                        'villaproject_id' => $request->villaproject_id,
            'villa_no' => $request->villa_no[$i],
            'villa_area' => $request->villa_area[$i]
            ];
            $villavy = Villa::where('villaproject_id', $data['villaproject_id'])
                                ->where('villa_no', $data['villa_no'])
                                ->first();
            if($villavy)
            {
                
            }
            else
            {
                $villa = Villa::create($data);
            }
            
        }
            flashSuccess('Villas Created Successfully');
            return redirect()->route('villaproject.index');        
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
        $villa = Villa::find($id);
        return view('admin.villaproject.villaedit',compact('villa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'villa_no' => 'required',
            'villa_area' => 'required'
        ]);

        $villa = Villa::find($id)->update($input);
        if($villa)
        {
            flashSuccess('Villa Updated Successfully');
            $villaid = Villa::find($id);
            return redirect()->route('villaproject.show',$villaid->villaproject_id);
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
        Villa::find($id)
            ->delete();

        flashSuccess('Villa Removed Successfully');
        return back();
    }
}
