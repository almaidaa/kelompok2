<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::index');
$routes->group('admin', function ($routes) {
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->get('dosen', 'Dosen::index');
    $routes->get('matakuliah', 'MataKuliah::index');
});
$routes->group('dosen', function ($routes) {
    $routes->get('input-nilai', 'Nilai::input');
});
$routes->group('mahasiswa', function ($routes) {
    $routes->get('krs', 'KRS::index');
    $routes->get('khs', 'Nilai::khs');
});

// $routes->group('admin', ['filter' => 'auth'], function ($routes) {
//     $routes->get('/', 'AdminController::index'); // Dashboard Admin
//     $routes->get('users', 'AdminController::manageUsers'); // Kelola User
//     $routes->get('mahasiswa', 'AdminController::manageMahasiswa'); // Kelola Mahasiswa
//     $routes->get('dosen', 'AdminController::manageDosen'); // Kelola Dosen
//     $routes->get('matakuliah', 'AdminController::manageMatakuliah'); // Kelola Mata Kuliah
// });
$routes->get('/login', 'AuthController::login'); // Form login
$routes->post('/login', 'AuthController::doLogin'); // Proses login
$routes->get('/logout', 'AuthController::logout'); // Logout

// Dashboard Admin
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/create_users', 'AdminController::create');
$routes->get('/admin/users', 'AdminController::users');
$routes->post('/admin/users/store', 'AdminController::store');
$routes->get('/admin/users/delete/(:num)', 'AdminController::delete/$1');

// Kelola Dosen
$routes->get('/dosen', 'DosenController::index');
