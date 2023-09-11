<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materialin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purchaseHistories()
    {
        return $this->hasMany(Materialpurchasehistory::class, 'materialin_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for when a Materialin is updated
        static::updated(function ($materialin) {
            if ($materialin->isDirty('supplier_id') || $materialin->isDirty('amount')) {
                $originalSupplierId = $materialin->getOriginal('supplier_id');
                $originalAmount = $materialin->getOriginal('amount');

                // Decrement the old supplier's total and pending
                if ($originalSupplierId) {
                    $originalSupplier = Supplier::find($originalSupplierId);
                    $originalSupplier->decrement('total', $originalAmount);
                    $originalSupplier->decrement('pending', $originalAmount);
                }

                // Increment the new supplier's total and pending
                if ($materialin->supplier_id) {
                    $supplier = Supplier::find($materialin->supplier_id);
                    $supplier->increment('total', $materialin->amount);
                    $supplier->increment('pending', $materialin->amount);
                }
            }
        });

        // Listen for when a Materialin is deleted
        static::deleted(function ($materialin) {
            if ($materialin->supplier_id) {
                $supplier = Supplier::find($materialin->supplier_id);
                $supplier->decrement('total', $materialin->amount);
                $supplier->decrement('pending', $materialin->amount);
            }
            foreach ($materialin->purchaseHistories as $purchaseHistory) {
                $purchaseHistory->delete();
            }
        });
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    

    public function villaProject()
    {
        return $this->belongsTo(VillaProject::class, 'villa_project_id');
    }

    public function contractProject()
    {
        return $this->belongsTo(ContractProject::class, 'contract_project_id');
    }

    public function materialhistory()
    {
        return $this->hasMany(Materialpurchase::class,'materialin_id','id');
    }
}
