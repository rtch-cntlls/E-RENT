<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = [
        'user_id',
        'description',
        'type',
        'address',
        'price',
        'amenities',
    ];

    protected $casts = [
        'amenities' => 'array', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
