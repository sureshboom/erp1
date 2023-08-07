<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialPaymentHistory extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function materialin()
    {
        $this->belongsTo(Materialin::class,'materialins_id');
    }
}
