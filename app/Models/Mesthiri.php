<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesthiri extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'mesthiri_id');
    }

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'mesthiri_id');
    }

    public function getSksmtIdAttribute()
    {
        return 'SKSMT ' . $this->attributes['id'];
    }
}
