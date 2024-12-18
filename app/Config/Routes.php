<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::index');
// $routes->group('admin', function ($routes) {
//     $routes->get('mahasiswa', 'Mahasiswa::index');
//     $routes->get('dosen', 'Dosen::index');
//     $routes->get('matakuliah', 'MataKuliah::index');
// });
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
$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('create_users', 'AdminController::create');
    $routes->get('users', 'AdminController::users');
    $routes->post('users/store', 'AdminController::store');
    // edit
    $routes->get('users', 'UserController::index'); // Menampilkan list user
    $routes->get('edit/(:num)', 'UserController::edit/$1'); // Menampilkan form edit
    $routes->post('users/update/(:num)', 'UserController::update/$1'); // Menyimpan perubahan user
    $routes->get('users/delete/(:num)', 'AdminController::delete/$1');

    // kelola mahasiswa
    $routes->get('dashboardmhs', 'AdminController::mahasiswa');
    $routes->get('mhs_create', 'AdminController::createmhs');
    $routes->post('dashboardmhs/storemhs', 'AdminController::storemhs');
    $routes->get('/editmhs/(:num)', 'AdminController::edit/$1');
});

//mahasiswa
// $routes->get('/mahasiswa', 'MahasiswaController::index');
// $routes->get('/mahasiswa/mhs_create', 'MahasiswaController::create');
// $routes->get('/admin/mahasiswa/dashboard', 'AdminController::mahasiswa');
// $routes->post('/mahasiswa/store', 'MahasiswaController::store');
// $routes->get('/mahasiswa/edit/(:num)', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'MahasiswaController::update/$1');
$routes->get('/mahasiswa/delete/(:num)', 'MahasiswaController::delete/$1');


// Kelola Dosen
$routes->get('/dosen', 'DosenController::index');
