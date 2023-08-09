<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerEntry extends Model
{
    use HasFactory;

    protected $casts = [
        'workers' => 'array',
    ];

    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo(Site::class,'site_id');
    }

    public function mesthiri()
    {
        return $this->belongsTo(Mesthiri::class,'mesthiri_id');
    }
}
