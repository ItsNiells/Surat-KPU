<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Auth::index');              // halaman login
$routes->get('/login', 'Auth::index');         // alias login
$routes->post('/auth/login', 'Auth::login');   // proses login
$routes->get('/logout', 'Auth::logout');       // logout

/*
|--------------------------------------------------------------------------
| HOME ROUTE
|--------------------------------------------------------------------------
*/
$routes->get('/home', 'Home::index');          // dashboard setelah login

/*
|--------------------------------------------------------------------------
| SURAT ROUTES
|--------------------------------------------------------------------------
*/
$routes->group('surat', function ($routes) {
    // Surat Masuk
    $routes->get('masuk', 'Surat::indexMasuk');
    $routes->get('tambahMasuk', 'Surat::tambahMasuk');
    $routes->post('simpanMasuk', 'Surat::simpanMasuk');
    $routes->get('editMasuk/(:num)', 'Surat::editMasuk/$1');
    $routes->post('updateMasuk/(:num)', 'Surat::updateMasuk/$1');
    $routes->get('hapusMasuk/(:num)', 'Surat::hapusMasuk/$1');

    // Surat Keluar
    $routes->get('keluar', 'Surat::indexKeluar');
    $routes->get('tambahKeluar', 'Surat::tambahKeluar');
    $routes->post('simpanKeluar', 'Surat::simpanKeluar');
    $routes->get('editKeluar/(:num)', 'Surat::editKeluar/$1');
    $routes->post('updateKeluar/(:num)', 'Surat::updateKeluar/$1');
    $routes->get('hapusKeluar/(:num)', 'Surat::hapusKeluar/$1');

    // Kategori Surat
    $routes->get('kategori/(:any)', 'Surat::kategori/$1');
});
