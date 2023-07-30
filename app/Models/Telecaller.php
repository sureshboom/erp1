<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Telecaller extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!app()->runningInConsole()) {
                $model->photo = createAvatar($model->user->name, 'uploads/images/telecaller');
            }
        });
    }

    public function getPhotoAttribute($photo)
    {
        if ($photo == null) {
            return asset('uploads/images/icon.jpg');
        } else {
            return asset($photo);
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'created_by_id')->where('created_by_type', 'telecaller');
    }

    
    
}
