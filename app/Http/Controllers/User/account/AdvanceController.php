<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advance;
use App\Models\AdvanceHistory;
use App\Models\User;

class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $advances = Advance::orderBy('id','desc')->get();

        return view('user.account.advance.index',compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staffs = User::select('id','name')->orderBy('id','desc')->get();

        return view('user.account.advance.create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'staff_id' => 'required',
            'advance_date' => 'required',
            'amount' => 'required|numeric',
            'notes' => 'required',
        ]);
        
        $advance = Advance::firstOrNew(['staff_id' =>$request->staff_id]);
        $advance->amount += $request->amount;
        $advance->save();

        $advancehy = AdvanceHistory::create([
            'advance_id' => $advance->id,
            'staff_id' => $request->staff_id,
            'advance_date' => $request->advance_date,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);


        if($advancehy)
        {
            flashSuccess('Advance Added Successfully');
            return redirect()->route('account.advance.index');
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
        $advances = AdvanceHistory::where('advance_id',$id)->get();
        return view('user.account.advance.show',compact('advances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $advance = AdvanceHistory::find($id);
        $staffs = User::select('id','name')->orderBy('id','desc')->get();

        return view('user.account.advance.edit',compact('staffs','advance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->validate([
            'advance_date' => 'required',
            'amount' => 'required|numeric',
            'notes' => 'required',
        ]);
        
        $advance = AdvanceHistory::find($id)->update($input);

        if($advance)
        {
            flashSuccess('Advance Updated Successfully');
            return redirect()->route('account.advance.index');
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
        //
        AdvanceHistory::find($id)->delete();
        flashSuccess('Advance Removed Successfully');
        return back();
    }
}
