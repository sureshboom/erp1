<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::orderBy('id','desc')->get();
        return view('user.account.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.account.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $input = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'edate' => 'required',
            'amount' => 'required|numeric',
            'approved_by' => 'required',
            'received_by' => 'required',
        ]);

        $exp = Expense::create($input);
        if($exp)
        {
            flashSuccess('Expense Created Successfully');
            return redirect()->route('account.expense.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::find($id);
        return view('user.account.expense.index',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'edate' => 'required',
            'amount' => 'required|numeric',
            'approved_by' => 'required',
            'received_by' => 'required',
        ]);

        $exp = Expense::find($id)->update($input);
        if($exp)
        {
            flashSuccess('Expense Updated Successfully');
            return redirect()->route('account.expense.index');
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
        Expense::find($id)->delete();
        flashSuccess('Expense Removed Successfully');
        return back();
    }
}
