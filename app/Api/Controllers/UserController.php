<?php

namespace App\Api\Controllers;

use App\User;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Http\Request;
use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

/**
 * @Resource("Users", uri="/users")
 */
class UserController extends BaseController
{
    protected $model;

    protected $request;

    public function __construct(Request $request, User $model)
    {
        $this->model   = $model;
        $this->request = $request;
        //$this->middleware('auth');
    }

    public function login()
    {
        $email      = $this->request->json('email');
        $password   = $this->request->json('password');
        $authResult = auth()->guard('api')
                        ->attempt(['email' => $email, 'password' => $password]);
        if (false === $authResult) {
            return response(['message' => "用户名或者密码不对",'code'=> 0]);
        }
        return response(['token' => $authResult]);
    }

    public function show(Request $request)
    {
        $res = auth()->guard('api')
            ->attempt(['email' => "admin@qq.com", 'password' => "123456"]);
        $user = $this->model->find(1);
        return $this->response->array($user);

    }
}