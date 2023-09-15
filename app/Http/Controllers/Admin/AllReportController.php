<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use App\Models\Payment;
use App\Models\LandCustomer;
use App\Models\LandProject;
use App\Models\ContractCustomer;
use App\Models\ContractProject;
use App\Models\ProjectCustomer;
use App\Models\VillaProject;
use Carbon\Carbon;
class AllReportController extends Controller
{
    //

    public function salaryreport(Request $request)
    {
        $users = User::orderBy('id','desc')->get();

        $query = Salary::orderBy('id','desc');

        if($request->has('staff_id') && $request->staff_id != null )
        {
            $query->where('staff_id',$request->staff_id);
        }
        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        

        if ($request->has('from_date') && $request->from_date != null )
        {
            // $query->whereBetween('from_date', [$start_date, $end_date]);
            $query->whereDate('from_date', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            // $query->whereBetween('to_date', [$start_date, $end_date]);
            $query->whereDate('from_date', '<=', $end_date);
        }

        $salarys = $query->get();


        // return $salarys;
        return view('admin.reports.salary',compact('users','salarys'));

    }

    public function expensereport(Request $request)
    {
        $query = Payment::where('payment_type','expense');

        if($request->has('type') && $request->type != null )
        {
            $query->where('payment_subtype',$request->type);
        }
        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        

        if ($request->has('from_date') && $request->from_date != null )
        {
            // $query->whereBetween('from_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            // $query->whereBetween('to_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '<=', $end_date);
        }

        $expenses = $query->get();

        return view('admin.reports.expense',compact('expenses'));
    }

    public function landproject(Request $request)
    {
        $landprojects = LandProject::orderBy('id','desc')->get();

        $query = Payment::where('payment_type', 'project')
                    ->where('payment_subtype', 'land')
                    ->with('payable');

        if($request->has('project_id') && $request->project_id != null)
        {
            $query->where('project_id',$request->project_id);
        }

        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        if ($request->has('from_date') && $request->from_date != null )
        {
            // $query->whereBetween('from_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            // $query->whereBetween('to_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '<=', $end_date);
        }

        $payments = $query->get();

        return view('admin.reports.landproject',compact('landprojects','payments'));
    }


    public function contractproject(Request $request)
    {
        $contractprojects = ContractProject::orderBy('id','desc')->get();

        $query = Payment::where('payment_type', 'project')
                    ->where('payment_subtype', 'contract')
                    ->with('payable');

        if($request->has('project_id') && $request->project_id != null)
        {
            $query->where('project_id',$request->project_id);
        }

        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        if ($request->has('from_date') && $request->from_date != null )
        {
            // $query->whereBetween('from_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            // $query->whereBetween('to_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '<=', $end_date);
        }

        $payments = $query->get();

        return view('admin.reports.contractproject',compact('contractprojects','payments'));
    }

    public function villaproject(Request $request)
    {
        $villaprojects = VillaProject::orderBy('id','desc')->get();

        $query = Payment::where('payment_type', 'project')
                    ->where('payment_subtype', 'villa')
                    ->with('payable');

        if($request->has('project_id') && $request->project_id != null)
        {
            $query->where('project_id',$request->project_id);
        }

        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        if ($request->has('from_date') && $request->from_date != null )
        {
            // $query->whereBetween('from_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            // $query->whereBetween('to_date', [$start_date, $end_date]);
            $query->whereDate('payment_date', '<=', $end_date);
        }

        $payments = $query->get();

        return view('admin.reports.villaproject',compact('villaprojects','payments'));
    }

}
