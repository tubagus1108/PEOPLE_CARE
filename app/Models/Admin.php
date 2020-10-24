<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;
    protected $table = "admin";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
}
