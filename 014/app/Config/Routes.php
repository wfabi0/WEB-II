<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rota principal que carrega a View com a Tabela e os Modais
$routes->get('/', 'Home::index');
$routes->get('/clientes', 'Home::index'); // Redireciona /clientes para a Home também

// ==========================================================
// ROTAS AJAX (As rotas consumidas pelo JavaScript via fetch)
// ==========================================================

// 1. Rota para buscar as Cidades dinamicamente (Select)
$routes->post('clientes/buscarCidades', 'Municipios::buscarCidades');

// 2. Rota para Criar E Editar Clientes (O CI4 faz os dois juntos!)
$routes->post('clientes/salvar', 'Clientes::salvar');

// 3. Rota para Excluir um Cliente
$routes->post('clientes/excluir', 'Clientes::excluir');


// ==========================================================
// ROTAS EXTRAS (Caso você tenha páginas separadas no futuro)
// ==========================================================
// Se você quiser manter a rota de detalhes que estava no seu código original:
$routes->get('clientes/detalhe/(:num)', 'Clientes::verDetalhe/$1');