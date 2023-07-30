<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salesmanager extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!app()->runningInConsole()) {
                $model->photo = createAvatar($model->user->name, 'uploads/images/salesmanager');
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
}
