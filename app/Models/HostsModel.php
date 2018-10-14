<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostsModel extends BaseModel
{
    protected $table = "hosts";
    protected $hidden = ['updated_at'];
    public    $timestamps = true;
    protected $fillable = ['name','host','port','protocol'];


    public function tasks()
    {
        return $this->hasMany('TaskModel','host_id','id');
    }
}