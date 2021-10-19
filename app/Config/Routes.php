<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/artikel', 'Artikel::index');

$routes->get('/user/admin', 'User\HomeAdmin::index', ['filter' => 'auth']);
// $routes->get('/user/admin/profile', 'User\HomeAdmin::profile', ['filter' => 'auth']);

// $routes->get('/user/admin/pemanduan/', 'User\Admin\Pemanduan::index/$1', ['filter' => 'auth']);
$routes->get('/user/admin/pemanduan/(:num)', 'User\Admin\Pemanduan::index/$1');

// $routes->get('/user/admin/artikel', 'User\Admin\Artikel::index', ['filter' => 'auth']);
// $routes->delete('/user/admin/artikel/(:num)', 'User\Admin\Artikel::delete/$1', ['filter' => 'auth']);
// $routes->get('/user/admin/artikel/detail/(:any)', 'User\Admin\Artikel::detail/$1', ['filter' => 'auth']);

// $routes->get('/user/admin/pengumuman', 'User\Admin\Pengumuman::index', ['filter' => 'auth']);

// $routes->get('/user/admin/umkm', 'User\Admin\Umkm::index', ['filter' => 'auth']);

// $routes->get('/user/admin/galeri', 'User\Admin\Galeri::index', ['filter' => 'auth']);

// $routes->get('/user/admin/adminlist', 'User\Admin\AdminList::index', ['filter' => 'auth']);
// $routes->get('/user/admin/adminlist/new_form', 'User\Admin\AdminList::new_form', ['filter' => 'auth']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
