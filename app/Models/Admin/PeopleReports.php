<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleReports extends Model
{
    use HasFactory;
    protected $table = "reports";
    protected $guarded = [];
}
