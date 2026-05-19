<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->post('/alunos', 'Aluno::create');
// $routes->put('/alunos', 'Aluno::update'); 
$routes->get('/alunos', 'Aluno::getAll');
$routes->get('/alunos/(:num)', 'Aluno::getById/$1');
// $routes->get('/alunos/maxId', 'Aluno::getMaxId');
// $routes->delete('/alunos', 'Aluno::delete');
