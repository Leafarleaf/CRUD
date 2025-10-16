<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('motoristas', 'Motoristas::index');
$routes->get('motoristas/create', 'Motoristas::create');
$routes->get('motoristas/create', 'Motoristas::create');
$routes->post('motoristas/store', 'Motoristas::store');
$routes->get('motoristas/(:segment)/edit', 'Motoristas::edit/$1');
$routes->post('motoristas/update/(:segment)', 'Motoristas::update/$1');
$routes->delete('motoristas/(:segment)', 'Motoristas::delete/$1');

$routes->get('veiculos', 'Veiculos::index');
$routes->get('veiculos/(:segment)/edit', 'Veiculos::edit/$1');
$routes->post('veiculos/(:segment)/update', 'Veiculos::update/$1');
$routes->delete('veiculos/(:segment)', 'Veiculos::delete/$1');
$routes->get('veiculos/create', 'Veiculos::create');
$routes->post('veiculos/store', 'Veiculos::store');

$routes->get('viagens/create', 'Viagens::create');
$routes->post('viagens/store', 'Viagens::store');
$routes->get('viagens', 'Viagens::index');  
$routes->get('viagens/edit/(:num)', 'Viagens::edit/$1');
$routes->post('viagens/update/(:num)', 'Viagens::update/$1');