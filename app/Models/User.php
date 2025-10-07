<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'province',
        'postal_code',
        'profile_photo',
        'status',
        'role',
        'google_id',
        'is_verified',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'last_login_at' => 'datetime',
        'is_verified' => 'boolean',
        'password' => 'hashed',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function verifications()
    {
        return $this->hasMany(UserVerification::class);
    }

    public function oauthProviders()
    {
        return $this->hasMany(OAuthProvider::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLogs::class);
    }
}
