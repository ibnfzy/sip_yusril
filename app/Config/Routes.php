<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('OwnPanel', ['namespaces' => 'App\Controllers'], function ($routes) {
  $routes->get('/', 'AdmController::index');
});