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
    protected static function booted()
    {
        static::deleting(function ($materialIn) {
            foreach ($materialIn->purchaseHistories as $purchaseHistory) {
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
        return $this->hasMany(Materialin::class,'materialin_id','id');
    }
}
