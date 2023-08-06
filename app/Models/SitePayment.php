<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SitePayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function site()
    {
        $this->belongsTo(Site::class,'site_id','id');
    }
}
