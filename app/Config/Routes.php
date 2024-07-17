<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Routes
$routes->get('/login', 'Auth\\LoginController::showLoginForm');
$routes->post('/login', 'Auth\\LoginController::login');
$routes->post('/logout', 'Auth\\LoginController::logout');

// Registration Routes
$routes->get('/register', 'Auth\\RegisterController::showRegistrationForm');
$routes->post('/register', 'Auth\\RegisterController::register');

// Routes for authorized users
$routes->get('/profile', 'Auth\\ProfileController::index',['filter' => 'authGuard']);
$routes->post('/update-profile', 'Auth\\ProfileController::update_profile',['filter' => 'authGuard']);
$routes->post('/update-password', 'Auth\\ProfileController::update_password',['filter' => 'authGuard']);


// Search Routes
$routes->get('/search', 'Auth\\SearchController::index',['filter' => 'authGuard']);
$routes->post('/search', 'Auth\\SearchController::search',['filter' => 'authGuard']);
