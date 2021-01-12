<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Members extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = "members";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
}
