<?php

namespace App\Http\Controllers\User\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meterial;
use App\Models\Materialin;
use App\Models\MaterialPaymentHistory;

class MaterialPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materials = Materialin::where('status','!=','order')->get();

        return view('user.account.materialpayment.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materialins = Materialin::select('id')->where('status','!=','order')->get();
        return view('user.account.materialpayment.create',compact('materialins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'materialins_id' => 'required',
            'total' => 'required|numeric',
            'amount' => 'required|numeric',
            'paytype' => 'required',
        ]);

        $payment = MaterialPaymentHistory::create([
            'materialins_id' => $request->materialins_id,
            'paytype' => $request->paytype,
            'amount' => $request->amount,
            'payway' => $request->payway
        ]);
        if($payment)
        {
            $material = Materialin::where('id',$request->materialins_id)->update([
                'paid' => $request->paid,
                'pending' => $request->pending,
            ]);
            if($material)
            {
                flashSuccess('Site Payment Created Successfully');
                return redirect()->route('account.material_payment.index');
            }
            else
            {
                flashError('Something Wrong');
                return back();
            }
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
        $materialpayment = MaterialPaymentHistory::where('materialins_id',$id)->get();
        return view('user.account.materialpayment.show',compact('materialpayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $history = MaterialPaymentHistory::find($id);
        return view('user.account.materialpayment.edit',compact('history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->validate([
            'amount' => 'required|numeric',
            'paytype' =>'required',
            'payway' => 'nullable'
        ]);

        $up = MaterialPaymentHistory::find($id)->update($input);
        if($up)
        {
            flashSuccess('Material Payment Updated Successfully');
            return redirect()->route('account.material_payment.index');
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
        MaterialPaymentHistory::find($id)->delete();
        flashSuccess('Material Payment Removed Successfully');
        return back();
    }

    public function getorder($orderid)
    {
        $payment = Materialin::where('id', $orderid)->first();
        return response()->json($payment);

    }
}
