<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $data = [
            'email'    => $request->json('username'),
            'password' => $request->json('password'),
        ];
        $res = Validator::make($data, [
            $this->username() => 'required|email',
            'password'        => 'required|string',
        ]);
        if ($res->fails()) {
            return response(['message' => $res->errors()->first(), 'code' => 30000]);
        }

        $res = Auth::attempt($data);
        if (false === $res) {
            return response(['message'=>'用户名或密码不正确', 'code' => 30000]);
        }
        session()->regenerate();
        $token = session('_token');

        return response(['data' => ['token' => $token], 'code' => 20000]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response(['message'=>'ok', 'code'=>20000]);
    }
}
