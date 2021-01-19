<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "city";
    protected $guarded = [];
    protected $appends = ['city_name'];
    public function post(){
        return $this->belongsToMany(PeopleMembers::class);
    }
    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function getProvinceNameAttribute(){
        return $this->province->name ?? '-';
    }
}
