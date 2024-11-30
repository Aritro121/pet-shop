<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'service_id', 'user_id', 'date', 'status',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

