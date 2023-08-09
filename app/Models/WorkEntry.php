<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo(Site::class,'site_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
}
