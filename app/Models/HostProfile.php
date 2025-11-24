<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostProfile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'id_document',
        'profile_picture',
        'requirements_completed',
        'status',
    ];

    protected $casts = [
        'requirements_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
