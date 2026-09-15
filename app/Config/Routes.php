<!-- File ini berfungsi sebagai penghubung antara URL yang diakses user dengan Controller dan Method yang akan dijalankan. -->


<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ketika user membuka: http://localhost:8080/
// Jalankan:app/Controllers/LoginController.php method:index()
// Method index() nantinya akan menampilkan halaman login.
$routes->get('/', 'LoginController::index');

$routes->get('/login', 'LoginController::index');

// Dashboard hanya boleh diakses oleh user yang sudah login
// ['filter' => 'auth']
// terhubung dengan:
// app/Filters/AuthFilter.php
$routes->get(
    '/dashboard', 
    'DashboardController::index',
    ['filter' => 'auth']);

// Route untuk memproses login Dipanggil ketika user menekan tombol Login
// pada file: app/Views/auth/login.php Karena form login menggunakan method="post"
// maka route juga harus menggunakan post()
// Method yang dijalankan LoginController::process()
$routes->post(
    '/login/process',
    'LoginController::process'
);

// Ketika user klik tombol Logout maka Jalankan LoginController::logout() untuk menghapus seluruh session login.
$routes->get(
    '/logout',
    'LoginController::logout'
);

// Menampilkan daftar seluruh user.
// URL: /users Controller: UserController
// Method: index()
$routes->get(
    '/users',
    'UserController::index',
    ['filter' => 'auth']
);

// Menampilkan form tambah user.
// Tidak menyimpan data.
// Hanya menampilkan app/Views/users/create.php
$routes->get(
    '/users/create',
    'UserController::create',
    ['filter' => 'auth']
);

// Menyimpan data user baru.
// Dipanggil ketika tombol Simpan pada users/create.php ditekan.
// Method yang dijalankan: UserController::store()
$routes->post(
    '/users/store',
    'UserController::store',
    ['filter' => 'auth']
);

// Menampilkan form edit user.
// (:num) berarti menerima angka.
//
// Contoh:/users/edit/5
// akan menjadi: UserController::edit(5)
//
// Angka 5 akan diterima sebagai parameter $id.
$routes->get(
    '/users/edit/(:num)',
    'UserController::edit/$1',
    ['filter' => 'auth']
);

// Menyimpan hasil edit user.
//
// Contoh: /users/update/5
//
// akan menjalankan: update(5)
//
// lalu mengupdate data user dengan id = 5.
$routes->post(
    'users/update/(:num)',
    'UserController::update/$1',
    ['filter' => 'auth']
);

// Menghapus user berdasarkan id.
// Contoh: /users/delete/5
// akan menjalankan: delete(5)
// kemudian menghapus user dengan id = 5.
$routes->get(
    '/users/delete/(:num)',
    'UserController::delete/$1',
    ['filter' => 'auth']
);

//Route Untuk Departments

$routes->get(
    '/departments',
    'DepartmentController::index',
    ['filter' => 'auth']
);

$routes->get(
    '/departments/create',
    'DepartmentController::create',
    ['filter' => 'auth']
);

$routes->post(
    '/departments/store',
    'DepartmentController::store',
    ['filter' => 'auth']
);

$routes->get(
    '/departments/edit/(:num)',
    'DepartmentController::edit/$1',
    ['filter' => 'auth']
);

$routes->post(
    'departments/update/(:num)',
    'DepartmentController::update/$1',
    ['filter' => 'auth']
);

$routes->get(
    '/departments/delete/(:num)',
    'DepartmentController::delete/$1',
    ['filter' => 'auth']
);