<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $guarded = [];

    

    public function siteengineer()
    {
        return $this->belongsTo(Siteengineer::class,'siteengineer_id','id');
    }

    public function chiefengineer()
    {
        return $this->belongsTo(Chiefengineer::class,'chiefengineer_id','id');
    }

    

    public function materialin()
    {
        return $this->hasMany(Materialin::class);
    }

    public function paymentHistories()
    {
        return $this->hasMany(SitePaymentHistory::class, 'site_id');
    }

    public function mesthiri()
    {
        return $this->belongsTo(Mesthiri::class,'mesthiri_id','id');
    }

    public function workentry()
    {
        return $this->hasMany(WorkEntry::class, 'site_id');
    }

}
