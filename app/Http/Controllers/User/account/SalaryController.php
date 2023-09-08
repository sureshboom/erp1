<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use App\Models\Advance;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $salarys = Salary::orderBy('id','desc')->get();
        return view('user.account.salary.index',compact('salarys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id','desc')->get(['id','name']);

        return view('user.account.salary.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'staff_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'salary_amount' => 'required',
            'advance' => 'nullable',
            'detection' => 'nullable',
            'salary' => 'required'
        ]);

        $salary = Salary::where('staff_id',$request->staff_id)->where('from_date',$request->from_date)->first();
        if($salary)
        {
            flashError('Salary already Exists');
            return back();
        }
        else
        {
            $salaryv = Salary::create($input);
            if($request->detection != 0)
            {
                $advance = Advance::where('staff_id',$request->staff_id)->first();
                $advance->decrement('amount',$request->detection);
                $advance->increment('detection',$request->detection);
            }
            flashSuccess('Salary created Successfully');
            return redirect()->route('account.salary.index');
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
        $users = User::orderBy('id','desc')->get(['id','name']);

        $salary = Salary::find($id);

        return view('user.account.salary.edit',compact('users','salary'));
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
        Salary::find($id)->delete();
        flashSuccess('Salary Removed Successfully');
        return back();
    }

    public function advancelist(Request $request)
    {
        $advance = Advance::where('staff_id',$request->staff_id)->first();

        return response()->json($advance);

    }
}
