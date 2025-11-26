<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_verified',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function hostProfile()
    {
        return $this->hasOne(HostProfile::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    protected $with = ['hostProfile'];
}
