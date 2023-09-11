<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'villaproject_id');
    }

    public function villacustomer()
    {
        return $this->belongsTo(ProjectCustomer::class,'vilano');
    }

    public function villacustomers()
    {
        return $this->hasOne(ProjectCustomer::class,'vilano');
    }
    
    public function lsassign()
    {
        return $this->morphMany(SupplierAssign::class, 'lassign');
    }

    public function lsupplier()
    {
        return $this->belongsTo(LabourSupplier::class, 'supplier_id');
    }
}
