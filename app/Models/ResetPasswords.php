<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPasswords extends Model
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [
        'email','password'
    ];

    protected $hidden = [
        'password',
    ];
}
