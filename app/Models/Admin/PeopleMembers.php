<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleMembers extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
    public function city(){
        return $this->belongsToMany(City::class);
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
}

