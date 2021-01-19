<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use Notifiable;
    protected $table = "admin";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = [
        'name', 'email', 'password',
    ];
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

}
