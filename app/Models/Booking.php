<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'property_id',
        'guest_id',
        'status',
        'amount',
        'check_in',
        'check_out',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function guest()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }
}
