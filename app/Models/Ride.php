<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from',
        'to',
        'distance',
        'price',
        'taxi_id',
        'completed',
    ];

    protected $casts = [
        'completed' => 'datetime',
    ];

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function from_location()
    {
        return $this->belongsTo(Location::class, 'from');
    }

    public function to_location()
    {
        return $this->belongsTo(Location::class,'to');
    }

    public function ride_confirmations()
    {
        return $this->hasMany(RideConfirmation::class)->latest()->first();
    }
}
