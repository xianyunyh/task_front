<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/**
 * @var Dingo\Api\Routing\Router;
 */
$api = app()->get('Dingo\Api\Routing\Router');
$api->version('v1',['middleware' => 'web'], function ( Dingo\Api\Routing\Router $api) {
    $api->get('user/show', 'App\Http\Controllers\Api\UserController@show');
    $api->post("login",'App\Http\Controllers\Api\LoginController@login');
    $api->get("user/info",'App\Http\Controllers\Api\UserController@info');
});
