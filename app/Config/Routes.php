<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// $routes->group('Pemilik', ['filter' => 'auth:admin'], static function ($routes) {

$routes->get('/Home', 'Home::index', ['filter' => 'auth:admin']);
$routes->get('/Dashboard', 'Home::dashboard', ['filter' => 'auth:dokter']);

$routes->group('Pemilik', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('', 'Pemilik::index');
    $routes->get('tambah', 'Pemilik::tambah');
    $routes->post('save', 'Pemilik::simpan');
    $routes->get('ubah/(:hash)', 'Pemilik::ubah/$1');
    $routes->post('update', 'Pemilik::update');
    $routes->get('delete/(:hash)', 'Pemilik::delete/$1');
});
$routes->group('Peliharaan', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('', 'Peliharaan::index');
    $routes->get('tambah', 'Peliharaan::tambah');
    $routes->post('save', 'Peliharaan::simpan');
    $routes->get('ubah/(:hash)', 'Peliharaan::ubah/$1');
    $routes->post('update/(:num)', 'Peliharaan::update/$1');
    $routes->get('delete/(:hash)', 'Peliharaan::delete/$1');
});
$routes->group('Dokter', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('', 'Dokter::index');
    $routes->get('tambah', 'Dokter::tambah');
    $routes->post('save', 'Dokter::simpan');
    // $routes->get('reset/(:num)', 'Dokter::reset/$1');
    $routes->get('ubah/(:hash)', 'Dokter::ubah/$1');
    $routes->post('update/(:hash)', 'Dokter::update/$1');
    $routes->get('delete/(:hash)', 'Dokter::delete/$1');
});
$routes->group('Rekammedik', ['filter' => 'auth:dokter'], static function ($routes) {
    $routes->get('', 'Rekammedik::index');
    $routes->get('tambah', 'Rekammedik::tambah');
    $routes->post('save', 'Rekammedik::simpan');
    $routes->get('detail/(:hash)', 'Rekammedik::detail/$1');
    $routes->post('rekam', 'Rekammedik::rekam/$1');
    $routes->get('deletedetail/(:hash)', 'Rekammedik::deletedetail/$1');
    // $routes->get('reset/(:num)', 'Rekammedik::reset/$1');
    $routes->get('ubah/(:hash)', 'Rekammedik::ubah/$1');
    $routes->post('update/(:hash)', 'Rekammedik::update/$1');
    $routes->get('delete/(:hash)', 'Rekammedik::delete/$1');
});
$routes->group('Obat', static function ($routes) {
    $routes->get('', 'Obat::index');
    $routes->get('tambah', 'Obat::tambah');
    $routes->post('save', 'Obat::simpan');
    $routes->get('detail/(:num)', 'Obat::detail/$1');
    $routes->post('itemsave', 'Obat::itemsave');
    $routes->get('ubah/(:hash)', 'Obat::ubah/$1');
    $routes->post('update', 'Obat::update');
    // $routes->get('delete/(:hash)', 'Obat::delete/$1');
    $routes->post('detail/(:num)/delete', 'Obat::delete/$1');
});
