<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Katalog', 'Home::katalog');
$routes->get('Katalog/(:num)', 'Home::katalog_kategori/$1');
$routes->get('Detail/(:num)', 'Home::detail/$1');

$routes->get('Cart', 'Home::cart');
$routes->get('add_barang/(:num)', 'Home::add_barang/$1');
$routes->get('remove_barang/(:any)', 'Home::remove_barang/$1');
$routes->get('clear_cart', 'Home::clear_cart');
$routes->post('update_cart', 'Home::update_cart');

$routes->get('Login', 'AdminLogin::index');
$routes->post('Login', 'AdminLogin::auth');
$routes->get('Logoff', 'AdminLogin::logoff');

$routes->get('User/Login', 'CustLogin::index');
$routes->get('User/Daftar', 'CustLogin::daftar');
$routes->post('User/Daftar', 'CustLogin::signup');
$routes->post('User/Login', 'CustLogin::auth');
$routes->get('User/Logoff', 'CustLogin::logout');

$routes->get('test', function () {
  date_default_timezone_set('Singapore');
  echo date('Y-m-d', strtotime(date('Y-m-d') . ' + 1 Days'));
});

$routes->group('OwnPanel', ['namespaces' => 'App\Controllers'], function ($routes) {

  // Menu Panel
  $routes->get('/', 'AdmController::index');
  $routes->get('Transaksi', 'AdmController::transaksi');
  $routes->get('Transaksi/(:num)/(:num)', 'AdmController::invoice/$1/$2');
  $routes->get('Pelanggan', 'AdmController::pelanggan');
  $routes->get('LapKeuangan', 'AdmController::laporan_keuangan');
  $routes->get('AnalisaStok', 'AdmController::analisa_stok');

  $routes->post('TambahStok', 'AdmController::add_stok');

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

  // Corousel
  $routes->get('Corousel', 'Corousel::index');
  $routes->post('Corousel', 'Corousel::create');
  $routes->get('Corousel/add', 'Corousel::new');
  $routes->get('Corousel/(:num)', 'Corousel::delete/$1');
});

$routes->group('Panel', ['namespaces' => 'App\Controllers'], function ($routes) {

  $routes->get('/', 'UserController::index');
  $routes->get('Checkout', 'UserController::checkout');

  $routes->get('Transaksi/(:num)', 'UserController::invoice/$1');
  $routes->post('Transaksi/(:num)', 'UserController::upload/$1');
  $routes->get('Transaksi', 'UserController::transaksi');

  $routes->get('Review', 'UserController::review');
  $routes->post('Review/(:num)', 'UserController::review_add/$1');
  $routes->get('Review/(:num)', 'UserController::review_delete/$1');
});