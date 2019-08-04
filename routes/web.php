<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Hash;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('login', 'AuthController@login');


$router->get('logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);

$router->get('hash/{password}', ['middleware' => 'auth', function ($password) {

    $password_hash = Hash::make($password);
    return $password_hash;
}]);


