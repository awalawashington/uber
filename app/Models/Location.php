<?php

namespace App\Models;

use App\Models\TaxiLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
    ];

    public function rides_from()
    {
        return $this->hasMany(Ride::class, 'from', 'id');
    }

    public function rides_to()
    {
        return $this->hasMany(Ride::class, 'to', 'id');
    }

    public function taxi_location()
    {
        return $this->hasMany(TaxiLocation::class);
    }
}
