<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;
    protected $table = "admin_log";
    protected $guarded = [];

    public function newLog($admin_uid, $message, $destination_uid = '-'){
        $this->admin_uid = $admin_uid;
        $this->message = $message;
        $this->destination = $destination_uid;
        if($this->save())
            return true;
        return false;
    }
}
