<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCustomer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'project_id');
    }

    public function getSksvcIdAttribute()
    {
        return 'SKSVC ' . $this->attributes['id'];
    }
}
