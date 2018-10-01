<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    //
    protected $table = 'tasks';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
