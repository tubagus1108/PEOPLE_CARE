<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "city";
    protected $guarded = [];
    public function post(){
        return $this->belongsToMany(PeopleMembers::class);
    }
}
