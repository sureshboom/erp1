<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'amount'
    ];

    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'staff_id');
    }

    

    public function history()
    {
        return $this->hasMany(AdvanceHistory::class, 'advance_id');
    }

}
