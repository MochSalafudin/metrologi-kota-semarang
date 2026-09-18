<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth routes
$route['auth'] = 'auth/index';
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';

// User routes
$route['user/dashboard'] = 'user/dashboard';
$route['user/pengajuan'] = 'user/pengajuan';
$route['user/detail/(:num)'] = 'user/detail/$1';

// Admin routes
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/pengajuan'] = 'admin/pengajuan';
$route['admin/pengajuan/(:any)'] = 'admin/pengajuan/$1';
$route['admin/detail_pengajuan/(:num)'] = 'admin/detail_pengajuan/$1';
$route['admin/verify/(:num)'] = 'admin/verify/$1';
$route['admin/tolak/(:num)'] = 'admin/tolak/$1';
$route['admin/terbitkan_sertifikat/(:num)'] = 'admin/terbitkan_sertifikat/$1';
$route['admin/update_status/(:num)/(:any)'] = 'admin/update_status/$1/$2';
$route['admin/petugas'] = 'admin/petugas';
$route['admin/tambah_petugas'] = 'admin/tambah_petugas';
$route['admin/edit_petugas/(:num)'] = 'admin/edit_petugas/$1';
$route['admin/hapus_petugas/(:num)'] = 'admin/hapus_petugas/$1';
$route['admin/sertifikat'] = 'admin/sertifikat';
$route['admin/notifikasi'] = 'admin/notifikasi';
