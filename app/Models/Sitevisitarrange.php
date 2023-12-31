<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sitevisitarrange extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function salesperson()
    {
        return $this->belongsTo(Salesperson::class,'received_id','id');
    }
}
