<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('urunler/(:segment)', 'CatalogController::category/$1');
$routes->get('urun/(:segment)', 'CatalogController::show/$1');
$routes->get('sayfa/(:segment)', 'PageController::show/$1');
$routes->get('iletisim', 'ContactController::index');
$routes->post('iletisim', 'ContactController::send');

$routes->get('yonetim/giris', 'Admin\\AuthController::login');
$routes->post('yonetim/giris', 'Admin\\AuthController::attempt');
$routes->post('yonetim/cikis', 'Admin\\AuthController::logout', ['filter' => 'adminAuth']);
$routes->group('yonetim', ['filter' => 'adminAuth'], static function ($routes): void {
    $routes->get('/', 'Admin\\DashboardController::index');
    $routes->get('urunler', 'Admin\\ProductController::index');
    $routes->get('urunler/yeni', 'Admin\\ProductController::create');
    $routes->post('urunler', 'Admin\\ProductController::store');
    $routes->get('urunler/(:num)/duzenle', 'Admin\\ProductController::edit/$1');
    $routes->post('urunler/(:num)', 'Admin\\ProductController::update/$1');
    $routes->post('urunler/(:num)/sil', 'Admin\\ProductController::delete/$1');
    $routes->get('menu', 'Admin\\MenuController::index');
    $routes->get('menu/yeni', 'Admin\\MenuController::create');
    $routes->post('menu', 'Admin\\MenuController::store');
    $routes->get('menu/(:num)/duzenle', 'Admin\\MenuController::edit/$1');
    $routes->post('menu/(:num)', 'Admin\\MenuController::update/$1');
    $routes->post('menu/(:num)/sil', 'Admin\\MenuController::delete/$1');
    $routes->get('mesajlar', 'Admin\\MessageController::index');
    $routes->post('mesajlar/(:num)/okundu', 'Admin\\MessageController::read/$1');
    $routes->post('mesajlar/(:num)/sil', 'Admin\\MessageController::delete/$1');
});
