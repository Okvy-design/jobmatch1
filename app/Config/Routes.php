<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cari-job', 'Home::cari_job');
$routes->get('/apply/(:num)', 'Home::apply/$1', ['filter' => 'role:freelancer']);
$routes->post('/apply/(:num)', 'Home::apply_store/$1', ['filter' => 'role:freelancer']);

$routes->get('admin', function () {
    return redirect()->to('/admin/dashboard');
});

$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/login', 'Admin::attemptLogin');
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'admin']);
$routes->get('/admin/freelancer', 'Admin::freelancer', ['filter' => 'admin']);
$routes->get('/admin/company', 'Admin::company', ['filter' => 'admin']);
$routes->get('/admin/transaksi', 'Admin::transaksi', ['filter' => 'admin']);
$routes->get('/admin/transaksi/updateStatus/(:segment)', 'Admin::updateStatus/$1', ['filter' => 'admin']);
$routes->get('/admin/detail', 'Admin::detail', ['filter' => 'admin']);

$routes->get('/admin/laporan/freelance', 'Laporan::freelance', ['filter' => 'admin']);
$routes->get('/admin/laporan/company', 'Laporan::company', ['filter' => 'admin']);
$routes->get('/admin/laporan/transaksi', 'Laporan::transaksi', ['filter' => 'admin']);
$routes->post('/admin/laporan/freelance/cetak', 'Laporan::cetakFreelance', ['filter' => 'admin']);
$routes->post('/admin/laporan/company/cetak', 'Laporan::cetakCompany', ['filter' => 'admin']);
$routes->post('/admin/laporan/transaksi/cetak', 'Laporan::cetakTransaksi', ['filter' => 'admin']);



$routes->get('/company/profile', 'Company::profile', ['filter' => 'role:company']);
$routes->get('/company/profile/edit', 'Company::edit', ['filter' => 'role:company']);
$routes->post('/company/profile/create', 'Company::create', ['filter' => 'role:company']);
$routes->post('/company/profile/update/(:num)', 'Company::update/$1', ['filter' => 'role:company']);
$routes->get('/company/publish-job', 'PublishJob::index', ['filter' => 'role:company']);
$routes->get('/company/publish-job/create', 'PublishJob::create', ['filter' => 'role:company']);
$routes->post('/company/publish-job/store', 'PublishJob::store', ['filter' => 'role:company']);
$routes->get('/company/publish-job/show/(:num)', 'PublishJob::show/$1', ['filter' => 'role:company']);
$routes->get('/company/publish-job/edit/(:num)', 'PublishJob::edit/$1', ['filter' => 'role:company']);
$routes->post('/company/publish-job/update/(:num)', 'PublishJob::update/$1', ['filter' => 'role:company']);
$routes->get('/company/publish-job/delete/(:num)', 'PublishJob::delete/$1', ['filter' => 'role:company']);
$routes->get('/company/publish-job/close/(:num)', 'PublishJob::close/$1', ['filter' => 'role:company']);
$routes->get('/company/job-apply/(:num)', 'JobApply::index/$1', ['filter' => 'role:company']);
$routes->post('/company/job-apply/acc', 'JobApply::acc', ['filter' => 'role:company']);
$routes->get('company/job-apply/(:num)/(:num)', 'JobApply::jobDetail/$1/$2');
$routes->get('company/job-payment/(:num)/(:num)', 'JobApply::jobPayment/$1/$2');

$routes->get('company/payment/print/(:num)', 'PaymentController::print/$1');

$routes->get('company/payment', 'PaymentController::index');
$routes->get('company/payment/create', 'PaymentController::create');
$routes->post('company/payment/store', 'PaymentController::store');
$routes->get('company/payment/edit/(:num)', 'PaymentController::edit/$1');
$routes->post('company/payment/update/(:num)', 'PaymentController::update/$1');
$routes->delete('company/payment/delete/(:num)', 'PaymentController::delete/$1');

$routes->get('/freelancer/profile', 'Freelancer::profile', ['filter' => 'role:freelancer']);
$routes->get('/freelancer/profile/edit', 'Freelancer::edit', ['filter' => 'role:freelancer']);
$routes->post('/freelancer/profile/create', 'Freelancer::create', ['filter' => 'role:freelancer']);
$routes->post('/freelancer/profile/update/(:num)', 'Freelancer::update/$1', ['filter' => 'role:freelancer']);
$routes->get('/freelancer/applied-job', 'AppliedJob::index', ['filter' => 'role:freelancer']);
$routes->get('/freelancer/finished', 'AppliedJob::finished', ['filter' => 'role:freelancer']);
$routes->post('appliedjob/upload/(:num)', 'AppliedJob::upload/$1',['filter' => 'role:freelancer']);
$routes->get('freelancer/applied-job/detail/(:num)', 'AppliedJob::detail/$1');



