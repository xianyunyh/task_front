<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getOneByPk(int $id) :array
    {
        return $this->find($id) ?? [];
    }
}