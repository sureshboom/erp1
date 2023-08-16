<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandCustomer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function landproject()
    {
        return $this->belongsTo(LandProject::class,'project_id');
    }
    
    public function getSkslcIdAttribute()
    {
        return 'SKSLC ' . $this->attributes['id'];
    }
}
