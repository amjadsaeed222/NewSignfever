<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $guard='customer';
    protected $fillable = [
        'firstname','lastname','phone', 'email', 'password','street','city','state','zipcode'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
