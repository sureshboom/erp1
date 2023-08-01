<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materialpurchasehistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function material()
    {
        return $this->belongsTo(Meterial::class,'meterial_id','id');
    }
}


