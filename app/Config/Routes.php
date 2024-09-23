<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('edit/(:num)', 'EditController::edit/$1');

$routes->post('update/(:num)', 'EditController::update/$1');

$routes->get('cadastrar', 'CadastrarController::add');

$routes->post('cadastrar', 'CadastrarController::store');

$routes->delete('usuarios/delete/(:segment)', 'DeleteController::delete/$1');

