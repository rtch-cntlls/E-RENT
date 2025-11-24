<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

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

    protected $with = ['hostProfile'];
}
