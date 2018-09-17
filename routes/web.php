<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/login',function(){
    return ["data"=>['token'=>"ok"],"code"=>20000];
});
Route::get('/user/info',function(){
    return [
        "code"=>20000,
        "data"=>[
            "roles"=>["admin"]

        ]
    ];
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
