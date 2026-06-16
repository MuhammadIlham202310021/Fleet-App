<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');

$routes->get('/login', 'LoginController::index');
$routes->get(
    '/dashboard', 
    'DashboardController::index',
    ['filter' => 'auth']);
$routes->post(
    '/login/process',
    'LoginController::process'
);
$routes->get(
    '/logout',
    'LoginController::logout'
);
$routes->get(
    '/users',
    'UserController::index',
    ['filter' => 'auth']
);
$routes->get(
    '/users/create',
    'UserController::create',
    ['filter' => 'auth']
);
$routes->post(
    '/users/store',
    'UserController::store',
    ['filter' => 'auth']
);

$routes->get(
    '/users/edit/(:num)',
    'UserController::edit/$1',
    ['filter' => 'auth']
);

$routes->post(
    'users/update/(:num)',
    'UserController::update/$1',
    ['filter' => 'auth']
);

$routes->get(
    '/users/delete/(:num)',
    'UserController::delete/$1',
    ['filter' => 'auth']
);

$routes->get(
    '/departments',
    'DepartmentController::index',
    ['filter' => 'auth']
);

$routes->get(
    '/departments/create',
    'DepartmentController::create',
    ['filter' => 'auth']
);

$routes->post(
    '/departments/store',
    'DepartmentController::store',
    ['filter' => 'auth']
);