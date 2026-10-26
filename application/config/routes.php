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
$route['default_controller'] = 'login';
$route['admin'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ========================================================
// SSO DARI PORTAL ABSENSI STAFF PT TESTINDO
// ========================================================
$route['sso'] = 'sso/index';
// URL lama admin/data25/TST tetap jalan -> admin/arsip/TST/25
$route['admin/data(\d{2})/(:any)'] = 'admin/arsip/$2/$1';
// Alamat halaman tanpa nama method/kode (alamat lama, mis. index_2/TST, tetap jalan lewat aturan di bawah)
$route['data-testindo']             = 'admin/index_2/TST';
$route['data-testindo/20(\d{2})']   = 'admin/arsip/TST/$1';
$route['data-vibrasindo']           = 'admin/index_2/VB';
$route['tambah-data']               = 'admin/tambah';
$route['request-customer']          = 'admin/request_customer';
$route['sudah-po']                  = 'admin/data_sudah_po';
$route['sudah-quote']               = 'admin/data_sudah_quote';
$route['belum-quote']               = 'admin/data_belum_quote';
$route['close-gagal']               = 'admin/data_close';
$route['analytic/2024']             = 'admin/analytic_24';
$route['analytic/2023']             = 'admin/analytic_23';
$route['analytic/20(\d{2})']        = 'admin/analytic/$1';
$route['analytic/per-tahun']        = 'admin/analytic_pertahun';
$route['display-prospek']           = 'admin/display_dashboard';
$route['export-data']               = 'admin/halaman_export';
$route['ganti-foto']                = 'admin/upload_gambar';
$route['profil']                    = 'admin/upload_gambar';
// URL tanpa prefix admin/: /index_2/TST -> admin/index_2/TST (URL lama admin/... tetap jalan)
$route['(?!(?:admin|api|login|sso|crud|download|upload|welcome)(?:/|$))(.+)'] = 'admin/$1';
$route['sso/logout'] = 'sso/logout';
