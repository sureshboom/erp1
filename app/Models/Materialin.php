<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materialin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class,'site_id','id');
    }

    public function materialhistory()
    {
        return $this->hasMany(Materialin::class,'materialin_id','id');
    }
}
