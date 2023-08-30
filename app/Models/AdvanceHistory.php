<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::updated(function($advancehistory){
            $originalAmount = $advancehistory->getOriginal('amount');
            $updatedAmount = $advancehistory->getAttribute('amount');

            $amountDifference = $updatedAmount - $originalAmount;

            if ($advancehistory->isDirty('amount')) {

                $advance = Advance::find($advancehistory->advance_id);
                
                $advance->amount += $amountDifference;
                $advance->save();
            }
        });
        

        static::deleted(function ($advancehistory) {
            if ($advancehistory->advance_id) {
                $advance = Advance::find($advancehistory->advance_id);
                $advance->decrement('amount', $advancehistory->amount);
            }
            
        });
    }

    public function advance()
    {
        $this->belongsTo(Advance::class,'advance_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'staff_id');
    }
}
