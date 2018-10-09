<?php


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
$api->version('v1', ['middleware' => 'web'], function (Dingo\Api\Routing\Router $api) {
    $api->post('login', 'App\Http\Controllers\Api\LoginController@login');
    $api->get('logout', 'App\Http\Controllers\Api\LoginController@logout');
    $api->group(['middleware' => 'auth'], function (Dingo\Api\Routing\Router $api) {
        $api->get('user/info', 'App\Http\Controllers\Api\UserController@info');
        $api->get('user/show', 'App\Http\Controllers\Api\UserController@show');
        $api->resource('task', 'App\Http\Controllers\Api\TaskController');
        $api->resource('hosts', 'App\Http\Controllers\Api\HostsController');
        $api->resource('log', 'App\Http\Controllers\Api\LogController');
    });
});
