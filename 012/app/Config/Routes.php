<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('estados/(:num)/municipios', 'Municipio::getByEstado/$1');
