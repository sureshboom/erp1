<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesthiriAssign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mesthiri()
    {
        return $this->belongsTo(Mesthiri::class,'mesthiri_id');
    }

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'contract_project_id');
    }

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'villa_project_id');
    }
}
