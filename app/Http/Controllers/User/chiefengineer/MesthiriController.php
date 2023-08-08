<?php

namespace App\Http\Controllers\User\chiefengineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesthiri;
use App\Models\MesthiriAssign;
use App\Models\Chiefengineer;
use App\Models\Site;

class MesthiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mesthiris = Mesthiri::orderBy('id','desc')->get();

        return view('user.chiefengineer.mesthiri.index',compact('mesthiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.chiefengineer.mesthiri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'alternate_no' => 'nullable',
            'location' => 'required',
            'gpay' => 'nullable',
            'account' => 'nullable',
        ]);

        $mesthiri = Mesthiri::create($input); 
        if($mesthiri)
        {
            flashSuccess('Mesthiri Created Successfully');
            return redirect()->route('chiefengineer.mesthiri.index');
        }
        else
        {
            flashError('Something Wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mesthiriassigns = MesthiriAssign::where('site_id',$id)->orderBy('id','desc')->get();
        return view('user.chiefengineer.mesthiri.show',compact('mesthiriassigns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mesthiri = Mesthiri::find($id);

        return view('user.chiefengineer.mesthiri.edit',compact('mesthiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'alternate_no' => 'nullable',
            'location' => 'required',
            'gpay' => 'nullable',
            'account' => 'nullable',
        ]);

        $mesthiri = Mesthiri::find($id)->update($input); 
        if($mesthiri)
        {
            flashSuccess('Mesthiri Updated Successfully');
            return redirect()->route('chiefengineer.mesthiri.index');
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
        Mesthiri::find($id)->delete();
        flashSuccess('Mesthiri removed Successfully');
        return back();
    }

    public function mesthiriindex()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('chiefengineer_id',$chiefengineer->id)->get();

        return view('user.chiefengineer.mesthiri.view',compact('sites'));
    }

    public function assign()
    {
        $chiefengineer = Chiefengineer::where('user_id',auth()->user()->id)->first();
        $sites = Site::where('chiefengineer_id',$chiefengineer->id)->get();
        $mesthiris = Mesthiri::select('id','name')->get();

        return view('user.chiefengineer.mesthiri.assign',compact('sites','mesthiris'));
    }

    public function assignstore(Request $request)
    {
        $input = $request->validate([
            'site_id' => 'required',
            'mesthiri_id' => 'required',
        ]);

        

        $site = Site::find($request->site_id);
        if($site->mesthiri_id == $request->mesthiri_id)
        {
            flashError('Already Exists');
            return back();
        }
        else
        {
            $sites = $site->update(['mesthiri_id' => $request->mesthiri_id]);
            if($sites)
            {
                MesthiriAssign::create($input);
                flashSuccess('Mesthiri Assigned Successfully');
                return redirect()->route('chiefengineer.mesthiriindex');
            }
            else
            {
                flashError('Something Wrong');
                return back();
            }
        }
    }
}
