<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/blog', 'Home::blog');
$routes->get('/ajuda', 'Home::ajuda');
$routes->get('/sobre', 'Home::sobre');

$routes->get("/admin", 'Admin::dashboard');
$routes->get("/admin/dashboard", 'Admin::dashboard');
$routes->get("/admin/login", 'Admin::login');
$routes->get("/admin/logout", 'Admin::logout');
