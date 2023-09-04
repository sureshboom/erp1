<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierAssign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lassign()
    {
        return $this->morphTo();
    }


    public function contractproject()
    {
         return $this->belongsTo(ContractProject::class,'contractproject_id')
    }

    public function villaproject()
    {
         return $this->belongsTo(VillaProject::class,'villaproject_id')
    }

    public function villa()
    {
         return $this->belongsTo(Villa::class,'villa_id')
    }
}
