<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    use HasFactory;

    protected $guarded =[];

     protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public function contractproject()
    {
         return $this->belongsTo(ContractProject::class,'contractproject_id');
    }

    public function villaproject()
    {
         return $this->belongsTo(VillaProject::class,'villaproject_id');
    }

    public function villa()
    {
         return $this->belongsTo(Villa::class,'villa_id');
    }

    public function laboursupplier()
    {
         return $this->belongsTo(LabourSupplier::class,'supplier_id');
    }

    public function paymenthistory()
    {
         return $this->hasMany(SupplierPaymentHistory::class,'supplier_payment_id');
    }
}
