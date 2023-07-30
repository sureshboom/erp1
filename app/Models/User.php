<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    protected $dates = ['joined_date'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function telecaller(): HasOne
    {
        return $this->hasOne(Telecaller::class);
    }

    public function siteengineer(): HasOne
    {
        return $this->hasOne(Siteengineer::class);
    }

    public function chiefengineer(): HasOne
    {
        return $this->hasOne(Chiefengineer::class);
    }

    public function salesmanager(): HasOne
    {
        return $this->hasOne(Salesmanager::class);
    }

    public function salesperson(): HasOne
    {
        return $this->hasOne(Salesperson::class);
    }
}
