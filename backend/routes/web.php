<<?php
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
// list all categories
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'categories-list'
    ]
);
// get information for one category
$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'categories-item'
    ]
);

// list all tasks
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'tasks-list'
    ]
);
// add a task
$router->post(
     '/tasks',
    [ 
        'uses' => 'TaskController@add',
        'as'   => 'task-add'
    ]
);