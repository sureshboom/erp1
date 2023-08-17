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

    public function getAttachment1Attribute($attachment1)
    {
        if ($attachment1 == null) {
            return '';
        } else {
            return asset($attachment1);
        }
    }

    public function getAttachment2Attribute($attachment2)
    {
        if ($attachment2 == null) {
            return '';
        } else {
            return asset($attachment2);
        }
    }
    
    public function getSksvcIdAttribute()
    {
        return 'SKSVC ' . $this->attributes['id'];
    }
}
