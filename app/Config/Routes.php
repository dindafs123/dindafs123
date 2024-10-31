<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang_masuk', 'BarangMasukController::index');
$routes->post('/barang_masuk/store', 'BarangMasukController::store');
$routes->get('/barang_keluar', 'BarangKeluarController::index');
$routes->post('/barang_keluar/store', 'BarangKeluarController::store');
$routes->get('/transaksi/create', 'Transaksi::create');
$routes->post('/transaksi/store', 'Transaksi::store');
$routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
