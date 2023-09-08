<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        
        static::deleted(function ($salary) {
            if ($salary->staff_id) {
                $payment = Advance::where('staff_id',$salary->staff_id);
                $payment->decrement('detection', $salary->detection);
                $payment->increment('amount', $salary->detection);
            }
            
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'staff_id');
    }
}
