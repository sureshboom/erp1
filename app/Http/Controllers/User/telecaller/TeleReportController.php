<?php

namespace App\Http\Controllers\User\telecaller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Telework;
use App\Models\Telecaller;
use Carbon\Carbon;
class TeleReportController extends Controller
{
    public function workreport(Request $request)
    {
        $telecaller = Telecaller::where('user_id',auth()->user()->id)->first();
        $query = Telework::where('telecaller_id',$telecaller->id);
        if ($request->has('from_date') && $request->from_date != null && $request->to_date != null)
        {
            $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
            $query->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            
        }
        
        $teleworks = $query->get();
        // return $teleworks;
        return view('user.telecaller.reports.telework',compact('teleworks'));

    }

    public function alltelecallerwork(Request $request)
    {
        $telecallers = Telecaller::orderBy('id','desc')->get();
        $query = Telework::orderBy('id','desc');
        if($request->has('telecaller_id'))
        {
            $query->where('telecaller_id',$request->telecaller_id);
        }
        $start_date = Carbon::parse(request()->from_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->to_date)->toDateTimeString();
        

        if ($request->has('from_date') && $request->from_date != null )
        {
            $query->whereDate('created_at', '>=', $start_date);
        }

        if ($request->has('to_date') && $request->to_date != null )
        {
            $query->whereDate('created_at', '<=', $end_date);
        }

        $teleworks = $query->get();
        // return $teleworks;
        return view('user.salesmanager.reports.telework',compact('teleworks','telecallers'));
    }

    
}
