<?php

namespace App\Api\Controllers;
use App\User;

/**
 * @Resource("Users", uri="/users")
 */
class UserController extends BaseController
{
    public function show()
    {
        $user = User::all();
        return $this->response->array($user);


    }
}