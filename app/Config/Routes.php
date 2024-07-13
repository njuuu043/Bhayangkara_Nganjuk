<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PowerBIController::index', ['filter'=>['auth','verified']]);

//Auth
$routes->get('/login', 'Auth\LoginController::login',['filter'=>'noauth']);
$routes->post('/auth', 'Auth\LoginController::auth',['filter'=>'noauth']);
$routes->get('/logout', 'Auth\LoginController::logout', ['filter'=>'auth']);
$routes->post('/validate-password', 'Auth\LoginController::validatePassword', ['filter'=>['auth','verified']]);
$routes->get('/validate-password', 'Auth\LoginController::changePassword', ['filter'=>['auth','verified']]);

//User Manajemen
$routes->get('/users', 'Admin\UserController::index',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/users/(:segment)', 'Admin\UserController::getData/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/users/add', 'Admin\UserController::add',['filter'=>['auth','checkPermission','verified']]);
$routes->delete('/users/(:segment)', 'Admin\UserController::delete/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/users/update/(:segment)', 'Admin\UserController::update/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/users/reset-password', 'Admin\UserController::resetPassword',['filter'=>['auth','checkPermission','verified']]);

//KPI Penilaian Kinerja
$routes->get('/penilaian-kinerja', 'KPI\PenilaianKinerjaController::index',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/penilaian-kinerja/upload', 'KPI\PenilaianKinerjaController::uploadFile',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/penilaian-kinerja/detail/(:segment)/(:segment)', 'KPI\PenilaianKinerjaController::detail/$1/$2',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/penilaian-kinerja/delete/(:segment)/(:segment)', 'KPI\PenilaianKinerjaController::delete/$1/$2',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/penilaian-kinerja/download', 'KPI\PenilaianKinerjaController::download',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/penilaian-kinerja/replace', 'KPI\PenilaianKinerjaController::replaceFile',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/penilaian-kinerja/reset', 'KPI\PenilaianKinerjaController::reset',['filter'=>['auth','checkPermission','verified']]);

//Bobot Penilaian Kineraj
//KPI Penilaian Kinerja
$routes->get('/bobot-penilaian-kinerja', 'KPI\BobotBSCController::index',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/bobot-penilaian-kinerja/get/(:segment)', 'KPI\BobotBSCController::getData/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/bobot-penilaian-kinerja/add', 'KPI\BobotBSCController::add',['filter'=>['auth','checkPermission','verified']]);
$routes->post('/bobot-penilaian-kinerja/update/(:segment)', 'KPI\BobotBSCController::update/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/bobot-penilaian-kinerja/delete/(:segment)', 'KPI\BobotBSCController::delete/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/bobot-penilaian-kinerja/detail/(:segment)', 'KPI\BobotBSCController::detail/$1',['filter'=>['auth','checkPermission','verified']]);
$routes->get('/bobot-penilaian-kinerja/edit/(:segment)', 'KPI\BobotBSCController::edit/$1',['filter'=>['auth','checkPermission','verified']]);