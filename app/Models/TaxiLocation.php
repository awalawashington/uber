<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiLocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'taxi_id',
        'location_id',
    ];

    protected $dates = ['deleted_at'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }

    public function rides()
    {
        return $this->hasMany(Ride::class, 'from')->where('taxi_id', NULL);
    }
}
