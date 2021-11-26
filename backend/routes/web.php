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
// on a une route /, accessible en GET, qui va appeler la méthode home de
// MainController. Nommée "main-home" pour le reverse-routing
$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);


$router->get(
    '/tests',
    [
        'uses' => 'MainController@tests',
        'as'   => 'main-test'
    ]
);

// list all categories
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'categories-list'
    ]
);