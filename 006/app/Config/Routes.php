<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::home');
$routes->get('/home', 'Home::home');
$routes->get('/quem-somos', 'Home::quemSomos');
$routes->get('/noticias', 'Home::noticias');
$routes->get('/fale-conosco', 'Home::faleConosco');
$routes->view("welcome-message", "welcome_message");
