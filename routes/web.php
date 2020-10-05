<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'v1'], function () use ($router) 
{
    $router->group(['middleware' => 'auth'], function () use ($router) 
    {
        $router->post('/opticBonus', ['as' => 'opticBonus','uses' => 'v1\ServiceController@opticBonus']);
    });
});