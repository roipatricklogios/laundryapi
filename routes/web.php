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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});



// $router->post('/register', 'UserController@registration');
// $router->post('/logauth', 'UserController@logAuth');

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
   // Matches "/api/register
   $router->post('register', 'UserController@register');
   $router->post('logauth', 'UserController@logAuth');
   // $router->get('logauth', 'UserController@logAuth');
});