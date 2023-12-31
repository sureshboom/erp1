<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaProject extends Model
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

    public function getSksvpIdAttribute()
    {
        return 'SKSVP ' . $this->attributes['id'];
    }

    public function mesthiri()
    {
        return $this->belongsTo(Mesthiri::class,'mesthiri_id');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    public function materialin()
    {
        return $this->hasOne(Materialin::class, 'villa_project_id');
    }
    public function materialhistory()
    {
        return $this->hasMany(Materialpurchase::class,'villa_project_id');
    }
    public function villas()
    {
        return $this->hasMany(Villa::class,'villaproject_id');
    }

    public function lsassign()
    {
        return $this->morphMany(SupplierAssign::class, 'lassign');
    }

    public function transfor()
    {
        return $this->morphMany(TransforDetails::class, 'transforproject');
    }
}
