<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Salesperson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!app()->runningInConsole()) {
                $model->photo = createAvatar($model->user->name, 'uploads/images/salesperson');
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

    public function getAttachmentAttribute($attachment)
    {
        if ($attachment == null) {
            return '';
        } else {
            return asset($attachment);
        }
    }

    public function getAttachment1Attribute($attachment1)
    {
        if ($attachment1 == null) {
            return '';
        } else {
            return asset($attachment1);
        }
    }

    public function getAttachment2Attribute($attachment2)
    {
        if ($attachment2 == null) {
            return '';
        } else {
            return asset($attachment2);
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'created_by_id')->where('created_by_type', 'salesperson');
    }

}

