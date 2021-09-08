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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Profil Page
$routes->add('/', 'ProfilPage::beranda');
$routes->add('/profil-desa', 'ProfilPage::profilDesa');
$routes->add('/lembaga-masyarakat', 'ProfilPage::lembagaMasyarakat');
$routes->add('/berita', 'ProfilPage::berita');
$routes->add('/blog', 'ProfilPage::blog');
$routes->add('/post/(:segment)', 'ProfilPage::viewPost/$1');
$routes->add('/belanja', 'ProfilPage::belanja');

//Admin Page
$routes->add('/admin', 'AdminPage::index');
$routes->add('/login', 'AdminPage::login');
$routes->add('/admin/carrousel', 'AdminPage::carrousel');
$routes->add('/admin/edit-carrousel/(:num)', 'AdminPage::editCarrousel/$1');
$routes->add('/admin/persentase-pekerjaan', 'AdminPage::persentasePekerjaan');
$routes->add('/admin/sambutan', 'AdminPage::sambutan');
$routes->add('/admin/edit-sambutan/(:num)', 'AdminPage::editSambutan/$1');
$routes->add('/admin/kontak', 'AdminPage::kontak');
$routes->add('/admin/profil-desa', 'AdminPage::profilDesa');
$routes->add('/admin/edit-profil-desa/(:any)', 'AdminPage::editProfilDesa/$1');
$routes->add('/admin/lembaga-masyarakat', 'AdminPage::lembagaMasyarakat');
$routes->add('/admin/edit-lembaga-masyarakat/(:any)', 'AdminPage::editLembagaMasyarakat/$1');
$routes->add('/admin/berita', 'AdminPage::berita');
$routes->add('/admin/edit-berita/(:any)', 'AdminPage::editBerita/$1');
$routes->add('/admin/belanja', 'AdminPage::belanja');
$routes->add('/admin/edit-belanja/(:any)', 'AdminPage::editProduk/$1');

/*
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
