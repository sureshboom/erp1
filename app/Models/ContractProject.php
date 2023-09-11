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

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    public function lsassign()
    {
        return $this->morphMany(SupplierAssign::class, 'lassign');
    }

    public function lsupplier()
    {
        return $this->belongsTo(LabourSupplier::class, 'supplier_id');
    }

    public function materialin()
    {
        return $this->hasMany(Materialin::class, 'contract_project_id');
    }

    public function materialhistory()
    {
        return $this->hasMany(Materialpurchase::class,'contract_project_id');
    }
}
