<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiVerificationCode extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'email',
        'email_verification_code',
        'email_verification_code_expires_at',
        'phone_number_verification_code',
        'phone_number_verification_code_expires_at',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'email_verification_code_expires_at' => 'datetime',
        'phone_number_verification_code_expires_at' => 'datetime',
    ];
}
