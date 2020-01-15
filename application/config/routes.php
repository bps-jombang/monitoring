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
$route['default_controller'] = 'auth';

// $route['admin/tes/(:any)'] = 'admin/tes/$1';

// ROUTES AUTHENTIFICATION LOGIN
$route['loginadmin']      = 'auth/prosesloginadmin';
$route['logout']          = 'auth/logout';

// ROUTES DETAIL DATA
$route['detailkegiatan/(:any)'] = 'admin/detailKegiatanUser/$1';
// ROUTES CREATE DATA
$route['mitra']           = 'admin/addmitra';
$route['user']            = 'admin/adduser';
$route['jabatan']         = 'admin/addjabatan';
$route['seksi']           = 'admin/addseksi';
$route['mitra']           = 'admin/addmitra';
$route['kegiatan']        = 'admin/addkegiatan';
$route['targetuser']      = 'admin/addtargetuser';

// ROUTES UPDATE DATA
$route['mitraupdate']     = 'admin/updatemitra';
$route['userupdate']      = 'admin/updateuser';
$route['jabatanupdate']   = 'admin/updatejabatan';
$route['seksiupdate']     = 'admin/updateseksi';
$route['mitraupdate']     = 'admin/updatemitra';
$route['kegiatanupdate']  = 'admin/updatekegiatan';
$route['targetuserupdate']= 'admin/updatetargetuser';

// ROUTES DELETE DATA JIKA ADA ID
$route['hapusdata/(:any)'] = 'admin/deleteMitra/$1'; // jika ada id
$route['hapusdata/(:any)'] = 'admin/deleteUser/$1'; 
$route['hapusdata/(:any)'] = 'admin/deleteJabatan/$1'; 
$route['hapusdata/(:any)'] = 'admin/deleteKegiatan/$1'; 
$route['hapusdata/(:any)'] = 'admin/deleteSeksi/$1'; 


$route['hapusdata']        = 'admin/deleteUser'; // jika tidak ada id


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
