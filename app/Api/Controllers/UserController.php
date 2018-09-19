<?php

namespace App\Api\Controllers;
use App\User;
class UserController extends BaseController
{
    public function show()
    {
        $user = User::all();
       // return $this->response->array($all);
        return $this->response->error('This is an error.', 404);

    }
}