<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    //
    protected $table = 'tasks';
    protected $fillable = ['name'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function host()
    {
        return $this->belongsTo('App\\Models\\HostsModel','host_id')->select(array('id', 'name'));;
    }
}
