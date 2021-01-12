<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Members extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "members";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
}
