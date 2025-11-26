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
