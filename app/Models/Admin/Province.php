<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = "province";
    protected $guarded = [];
    public function members(){
        return $this->hasMany(PeopleMembers::class);
    }
    public function city(){
        return $this->hasMany(City::class);
    }
}

