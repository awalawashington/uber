<?php

namespace App\Models;

use App\Models\TaxiLocation;
use App\Models\RideConfirmation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Taxi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 

    protected $guard = 'taxi';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'vehicle_registration_number',
        'vehicle_type',
        'vehicle_color',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_number_verified_at' => 'datetime',
    ];

    public function taxi_locations()
    {
        return $this->hasMany(TaxiLocation::class)->latest()->first();
    }

    public function rides() 
    {
        return $this->hasMany(Ride::class);
    }

    public function ride_confirmations()
    {
        return $this->hasMany(RideConfirmation::class)->latest()->first();
    }
}
