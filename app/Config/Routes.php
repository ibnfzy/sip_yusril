<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('OwnPanel', ['namespaces' => 'App\Controllers'], function ($routes) {

  // Menu Panel
  $routes->get('/', 'AdmController::index');

  // Kategori Barang
  $routes->get('Kategori', 'KategoriBarang::index');
  $routes->post('Kategori', 'KategoriBarang::create');
  $routes->get('Kategori/add', 'KategoriBarang::add');
  $routes->get('Kategori/(:num)', 'KategoriBarang::delete/$1');

  // Barang
  $routes->get('Barang', 'Barang::index');
  $routes->post('Barang', 'Barang::create');
  $routes->get('Barang/add', 'Barang::add');
  $routes->get('Barang/(:num)', 'Barang::edit/$1');
  $routes->post('Barang/(:num)', 'Barang::update/$1');
  $routes->get('BarangDelete/(:num)', 'Barang::delete/$1');


});