<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class PeopleMembers extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "members";
    protected $primaryKey = "uid";
    public $incrementing = false;
    protected $guarded = [];
    protected $appends = ['province_name','city_name'];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Province Relation
    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function getProvinceNameAttribute(){
        return $this->province->name ?? '-';
    }

    // City Relation
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function getCityNameAttribute(){
        return $this->city->name ?? '-';
    }
}

