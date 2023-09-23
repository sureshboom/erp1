<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransforDetails extends Model
{
    use HasFactory;

    protected $guarded =[];


    protected static function boot()
    {
        parent::boot();

        

        // Listen for when a Materialin is deleted
        static::deleted(function ($transfor) {
            if ($transfor->mp_id) {
                $mp = Materialpurchase::find($transfor->mp_id);
                $mp->decrement('transfor_out', $transfor->quantity);
            }
            if($transfor->project_type == 'villa')
            {
                $ti = Materialpurchase::where('project_type','villa')->where('villa_project_id',$transfor->project_id)->where('meterial_id',$transfor->meterial_id)->first();
                $ti->decrement('transfor_in', $transfor->quantity);
            }
            else
            {
                $ti = Materialpurchase::where('project_type','contract')->where('contract_project_id',$transfor->project_id)->where('meterial_id',$transfor->meterial_id)->first();
                $ti->decrement('transfor_in', $transfor->quantity);
            }
        });
    }


    public function material()
    {
        return $this->belongsTo(Meterial::class, 'meterial_id');
    }


    public function transforproject()
    {
        return $this->morphTo();
    }

    public function mp()
    {
        return $this->belongsTo(Materialpurchase::class,'mp_id');
    }

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'project_id');
    }

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'project_id');
    }
}
