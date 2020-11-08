<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalPegawai extends Model
{
    use HasFactory;
    protected $table = "employee";
    public $incrementing = false;
    protected $guarded = [];
    protected $primaryKey = 'uid';
}
