<?php

namespace App\Models;

class HostsModel extends BaseModel
{
    protected $table = 'hosts';
    protected $hidden = [];
    public $timestamps = true;
    protected $fillable = ['name', 'host', 'port', 'protocol'];

    public function tasks()
    {
        return $this->hasMany('TaskModel', 'host_id', 'id');
    }
}
