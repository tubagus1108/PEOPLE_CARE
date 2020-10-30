<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firefighters extends Model
{
    use HasFactory;
    protected $table = "rest";
    protected $guarded = [];
}
