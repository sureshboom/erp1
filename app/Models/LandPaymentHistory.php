<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPaymentHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function landcustomer()
    {
        return $this->belongsTo(LandCustomer::class,'landcustomers_id');
    }
}
