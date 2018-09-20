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
$api->version('v1', function ( Dingo\Api\Routing\Router $api) {
    $api->get('user/{id}', 'App\Api\Controllers\UserController@show');
    $api->post("user/login",'App\Api\Controllers\UserController@login');
});
