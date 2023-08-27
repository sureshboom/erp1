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

    public function create()
    {
        return view('user.account.expense.create');
    }

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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $expense = Expense::find($id);
        return view('user.account.expense.edit',compact('expense'));
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
