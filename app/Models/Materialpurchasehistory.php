<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materialpurchasehistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::deleted(function ($purchaseHistory) {
            $purchaseHistory->decrementMaterialPurchase($purchaseHistory);
        });
    }

    private function decrementMaterialPurchase($purchaseHistory)
    {
        $projectType = $purchaseHistory->project_type;
        $projectId = $projectType === 'contract' ? $purchaseHistory->contract_project_id : $purchaseHistory->villa_project_id;
        $meterialId = $purchaseHistory->meterial_id;
        $quantity = $purchaseHistory->quantity;

        $materialPurchase = MaterialPurchase::where('project_type', $projectType)
            ->where($projectType . '_project_id', $projectId)
            ->where('meterial_id', $meterialId)
            ->first();

        if ($materialPurchase) {
            $materialPurchase->decrement('quantity', $quantity);
        }
    }

    public function material()
    {
        return $this->belongsTo(Meterial::class,'meterial_id','id');
    }
    public function materialin()
    {
        return $this->belongsTo(Materialin::class,'materialin_id','id');
    }
}


