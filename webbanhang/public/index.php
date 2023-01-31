<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'TTN Store');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

// Pages routes
$router->get('/', '\App\Controllers\PagesController@index');
$router->get('/home', '\App\Controllers\PagesController@index');
$router->get('/product-detail/(\d+)', '\App\Controllers\PagesController@detailPro');
$router->get('/payment/(\d+)/(\d+)', '\App\Controllers\PagesController@buyPro');
$router->post('/confirm/(\d+)', '\App\Controllers\PagesController@printBill');
$router->get('/history/(\d+)', '\App\Controllers\PagesController@history');
$router->post('/delete/(\d+)/(\d+)','\App\Controllers\PagesController@delBill');

//Product routes
$router->get('/admin','\App\Controllers\AdminController@showAdminPage');
$router->get('/add-product','\App\Controllers\AdminController@showAddPage');
$router->post('/product', '\App\Controllers\AdminController@create');
$router->get('/list-product','\App\Controllers\AdminController@showListPage');
$router->get('/edit-product/(\d+)','\App\Controllers\AdminController@showEditPage');
$router->post('/update/(\d+)','\App\Controllers\AdminController@update');
$router->post('/delete/(\d+)','\App\Controllers\AdminController@delete');
$router->get('/list-bill','\App\Controllers\AdminController@showListBill');
$router->get('/view-bill/(\d+)','\App\Controllers\AdminController@viewBill');
$router->post('/confirm-bill/(\d+)','\App\Controllers\AdminController@confirmBill');

$router->run();
