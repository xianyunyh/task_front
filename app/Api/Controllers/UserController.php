<?php

namespace App\Api\Controllers;
use App\User;
class UserController extends BaseController
{
    public function show()
    {
        $user = User::all();
        return $this->response->array($user);


    }
}