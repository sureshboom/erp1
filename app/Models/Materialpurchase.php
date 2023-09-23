<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialpurchase extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function getQtyAttribute()
    {
        return $this->quantity + $this->transfor_in - $this->transfor_out;
    }
    public function material()
    {
        return $this->belongsTo(Meterial::class, 'meterial_id');
    }

    protected $fillable = ['project_type','contract_project_id','materialin_id','villa_project_id', 'meterial_id', 'quantity','transfor_in'];

    public function villaproject()
    {
        return $this->belongsTo(VillaProject::class,'villa_project_id');
    }

    public function contractproject()
    {
        return $this->belongsTo(ContractProject::class,'contract_project_id');
    }

    public function transforout()
    {
        return $this->hasMany(TransforDetails::class,'mp_id');
    }
}
