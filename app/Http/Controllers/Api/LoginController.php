<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email'=>$request->json('username'),
            'password'=>$request->json('password')
        ];
        $res =  Auth::attempt($data);
        if(false === $res) {

        }
        session()->regenerate();
        return response(['data'=>['token'=>$res],'code'=>20000]);
    }

    public function logout(Request $request)
    {
    }

}