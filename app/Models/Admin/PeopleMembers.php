<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleMembers extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $guarded = [];
}
