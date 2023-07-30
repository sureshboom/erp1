<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $owners = Owner::all();
        return view('admin.owner.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'owner_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'referred_by' => 'required',
        ]);

        $owner = Owner::create($input);
        if ($owner) {
            flashSuccess('Site Owner Created Successfully');
            return redirect()->route('owner.index');
        }
        else{
            flashError('Something wrong Please try again');
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
        //
        $owner = Owner::find($id);
        return view('admin.owner.edit',compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $input = $request->validate([
            'owner_name' => 'required',
            'phone' => 'required|numeric|min:9',
            'location' => 'required',
            'referred_by' => 'required',
        ]);

        $owner = Owner::where('id',$id)->update($input);
        if ($owner) {
            flashSuccess('Site Owner Updated Successfully');
            return redirect()->route('owner.index');
        }
        else{
            flashError('Something wrong Please try again');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Owner::find($id)->delete();

        flashSuccess('Owner Removed Successfully');
        return redirect()->route('owner.index');
    }
}
