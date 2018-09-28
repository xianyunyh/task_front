<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostsModel extends BaseModel
{
    protected $table = "hosts";
    protected $hidden = [];
    protected $fillable = ['name','host','port','protocol'];

}
