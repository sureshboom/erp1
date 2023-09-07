<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPaymentHistory extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected static function boot()
    {
        parent::boot();
        
        static::deleted(function ($paymenthistory) {
            if ($paymenthistory->supplier_payment_id) {
                $payment = SupplierPayment::find($paymenthistory->supplier_payment_id);
                $payment->decrement('paid', $paymenthistory->amount);
                $payment->increment('pending', $paymenthistory->amount);
            }
            
        });
    }

    public function supplierpayment()
    {
        return $this->belongsTo(SupplierPayment::class,'supplier_payment_id');
    }
}
