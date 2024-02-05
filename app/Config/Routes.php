<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/detail/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/rekap', 'Admin::rekap', ['filter' => 'role:admin']);
$routes->get('/admin/setting', 'Admin::setting', ['filter' => 'role:admin']);
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/delete/(:num)', 'Admin::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/trash', 'Admin::trash', ['filter' => 'role:admin']);
$routes->get('/admin/delete2/(:num)', 'Admin::delete2/$1', ['filter' => 'role:admin']);
$routes->get('/admin/restore/(:any)', 'Admin::restore/$1', ['filter' => 'role:admin']);
$routes->get('/admin/atasan', 'Admin::atasan', ['filter' => 'role:admin']);
$routes->post('/admin/up_atasan', 'Admin::up_atasan', ['filter' => 'role:admin']);
$routes->post('/admin/delete_atasan/(:num)', 'Admin::delete_atasan/$1', ['filter' => 'role:admin']);
$routes->get('/admin/laporan', 'Admin::laporan', ['filter' => 'role:admin']);


//Laporan Kinerja Harian
$routes->get('/laporan', 'Laporan::index');
$routes->post('/laporan/create', 'Laporan::create');
$routes->post('/laporan/delete/(:num)', 'Laporan::delete/$1');


//Izin
$routes->get('/izin', 'Izin::index');
$routes->get('/izin/rekap', 'Izin::rekap');
$routes->post('/izin/create', 'Izin::create');
$routes->get('/izin/edit/(:num)', 'Izin::edit/$1');
$routes->post('/izin/update/(:num)', 'Izin::update/$1');
$routes->post('/izin/delete/(:num)', 'Izin::delete/$1', ['filter' => 'role:admin']);


//User
$routes->get('/user', 'User::index');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');


//$routes->resource('izin', )
