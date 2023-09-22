<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransforDetails extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function material()
    {
        return $this->belongsTo(Meterial::class, 'meterial_id');
    }


    public function transforproject()
    {
        return $this->morphTo();
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
