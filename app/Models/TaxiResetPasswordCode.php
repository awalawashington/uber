<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxiResetPasswordCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'reset_password_verification_code',
        'reset_password_verification_code_expires_at',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'reset_password_verification_code_expires_at' => 'datetime',
    ];
}
