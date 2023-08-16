<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractCustomer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'project_id');
    }

    public function getSksccIdAttribute()
    {
        return 'SKSCC ' . $this->attributes['id'];
    }
}
