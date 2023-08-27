<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function payable()
    {
        return $this->morphTo();
    }

    public function landproject()
    {
        return $this->belongsTo(LandProject::class,'project_id');
    }

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'project_id');
    }

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'project_id');
    }

    public function landcustomer()
    {
        return $this->belongsTo(LandCustomer::class,'customer_id');
    }

    public function villacustomer()
    {
        return $this->belongsTo(ProjectCustomer::class,'customer_id');
    }

    public function contractcustomer()
    {
        return $this->belongsTo(ContractCustomer::class,'customer_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
