<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RideConfirmation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ride_id',
        'taxi_id',
        'confirmation',
    ];

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
