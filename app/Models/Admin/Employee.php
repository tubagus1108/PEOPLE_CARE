<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "employee";
    public $incrementing = false;
    protected $guarded = [];
    protected $primaryKey = 'uid';
    protected $dates = ['deleted_at'];
}
