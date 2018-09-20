<?php

namespace App\Api\Controllers;
use App\User;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Http\Request;
use Illuminate\Auth\TokenGuard;

/**
 * @Resource("Users", uri="/users")
 */
class UserController extends BaseController
{
    protected $model;

    protected $request;
    public function __construct(Request $request,User $model)
    {
        $this->model = $model;
        $this->request = $request;
        //$this->middleware('auth');
    }

    public function login()
    {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

    }
    public function show(Request $request)
    {

        auth("api")->validate(['api_token'=>"admin@qq.com",'password'=>"admin123456"]);
        $user = $this->model->find(1);
        return $this->response->array($user);

    }
}