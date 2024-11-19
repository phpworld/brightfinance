<?php
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('kyc/success', 'Home::success');
$routes->get('kyc/failure', 'Home::failure');

$routes->post('/contact/submit', 'Home::submit');

$routes->get('/loan-apply/', 'KycController::index');
$routes->get('kyc/failure/', 'KycController::mail_fail');
$routes->get('/kyc', 'KycController::view_kyc_data'); 
$routes->get('kyc/view/(:num)', 'KycController::view_full_kyc/$1');

$routes->get('/search_kyc', 'KycController::search_kyc_data'); 
$routes->post('/search_kyc', 'KycController::search_kyc');

$routes->post('kyc/submit', 'KycController::submit');

$routes->get('admin/register', 'UserController::register');
$routes->post('admin/register', 'UserController::register');
$routes->get('admin/login', 'UserController::login');
$routes->get('admin/logout', 'UserController::logout');
$routes->post('admin/login', 'UserController::login');
$routes->get('admin/dashboard', 'UserController::dashboard', ['filter' => 'auth']);

$routes->get('admin/kyc', 'KycController::view_admin_kyc_data', ['filter' => 'auth']); 
$routes->get('admin/kyc/view/(:num)', 'KycController::view_admin_full_kyc/$1', ['filter' => 'auth']);

$routes->get('admin/search_kyc', 'KycController::search_admin_kyc_data', ['filter' => 'auth']); 
$routes->post('admin/search_kyc', 'KycController::search_admin_kyc', ['filter' => 'auth']);

$routes->get('admin/change-password', 'UserController::changePassword');
$routes->post('admin/change-password', 'UserController::changePassword');
$routes->get('admin/payment_history', 'UserController::paymentHistory',['filter' => 'auth']);

//////////////
$routes->get('/dsa', 'DsaController::index');
$routes->get('/dsa/register', 'DsaController::register');
$routes->post('/dsa-register/submit', 'DsaController::submit');

$routes->get('/dsa/dashboard', 'DsaController::dashboard');

$routes->get('/dsa-login', 'DsaController::login');
$routes->post('/dsa-login/send-otp', 'DsaController::sendOtp');
$routes->post('/dsa-login/verify-otp', 'DsaController::verifyOtp');

////////////