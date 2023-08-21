<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function siteengineer()
    {
        return $this->belongsTo(Siteengineer::class,'siteengineer_id','id');
    }

    public function chiefengineer()
    {
        return $this->belongsTo(Chiefengineer::class,'chiefengineer_id','id');
    }

    public function getSkscpIdAttribute()
    {
        return 'SKSCP ' . $this->attributes['id'];
    }

    public function mesthiri()
    {
        return $this->belongsTo(Mesthiri::class,'mesthiri_id');
    }
}
