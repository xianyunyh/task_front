<?php
/**
 * Created by PhpStorm.
 * User: tianlei
 * Date: 18-9-24
 * Time: 下午5:21.
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        dd(auth()->user());
    }

    public function info()
    {
        return [
            'data'=> [
                'user' => 'admin',
                'roles'=> ['admin'],
            ],
            'code'=> 20000,
        ];
    }
}
