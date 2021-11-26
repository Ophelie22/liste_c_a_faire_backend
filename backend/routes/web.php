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
$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);


// this route will used to explore Lumen features
$router->get(
    '/bdd/select',
    [
        'uses' => 'DecouverteLumenController@bddSelect',
        'as'   => 'main-bddSelect'
    ]
);

$router->get(
    '/bdd/selectAllORM',
    [
        'uses' => 'DecouverteLumenController@bddSelectWithModel',
        'as'   => 'main-bddSelectWithModel'
    ]
);

$router->get(
    '/bdd/selectByIdORM',
    [
        'uses' => 'DecouverteLumenController@bddSelectByIdWithModel',
        'as'   => 'main-bddSelectByIdWithModel'
    ]
);

$router->get(
    '/bdd/bddSelectManyByIdWithModel',
    [
        'uses' => 'DecouverteLumenController@bddSelectManyByIdWithModel',
        'as'   => 'main-bddSelectManyByIdWithModel'
    ]
);

$router->get(
    '/bdd/bddSelectWithCustomModelQuery',
    [
        'uses' => 'DecouverteLumenController@bddSelectWithCustomModelQuery',
        'as'   => 'main-bddSelectWithCustomModelQuery'
    ]
);

$router->get(
    '/bdd/bddSelectCourseCategory',
    [
        'uses' => 'DecouverteLumenController@bddSelectCourseCategory',
        'as'   => 'main-bddSelectCourseCategory'
    ]
);

$router->get(
    '/bdd/bddSelectTasksFromCategory',
    [
        'uses' => 'DecouverteLumenController@bddSelectTasksFromCategory',
        'as'   => 'main-bddSelectTasksFromCategory'
    ]
);


// declaratipon of a new route to retrieve categories list
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'category-list'
    ]
);
// retrieve data for a specific category
$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);