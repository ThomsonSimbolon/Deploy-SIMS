<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes Auth Login
$routes->get('login', 'AuthController::login');
$routes->post('login/loggedIn', 'AuthController::loggedIn');

// Routes Registrasi
$routes->get('register', 'AuthController::register');
$routes->post('register/store', 'AuthController::store');

// Routes Logout
$routes->get('logout', 'AuthController::logout');

// Routes Product
$routes->get('/', 'ProductController::index', ['filter' => 'auth']);
$routes->get('product', 'ProductController::index', ['filter' => 'auth']);
$routes->get('product/create', 'ProductController::create', ['filter' => 'auth']);
$routes->post('product/store', 'ProductController::store', ['filter' => 'auth']);
$routes->get('product/edit/(:num)', 'ProductController::edit/$1', ['filter' => 'auth']);
$routes->post('product/update/(:num)', 'ProductController::update/$1', ['filter' => 'auth']);
$routes->get('product/delete/(:num)', 'ProductController::delete/$1', ['filter' => 'auth']);

// Routes untuk export ke excel
$routes->get('product/export-excel', 'ProductController::exportExcel', ['filter' => 'auth']);

// Routes Profile
$routes->get('profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->post('profile/update/(:num)', 'ProfileController::update/$1', ['filter' => 'auth']);
