<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        //$url = 'https://example.com/reset-password?token='.$token;

        $this->notify(new ResetPasswordNotification($token));
    }
}
