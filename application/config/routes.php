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
/* Default access login */
$route['default_controller'] = 'auth';

/* ROUTES AUTH LOGIN  */
$route['process']         = 'auth/prosesloginadmin';
$route['loginadmin']      = 'auth/admin';
$route['logout']          = 'auth/logout';
$route['logout']          = 'auth/logout';

/* EXPORT EXCEL */
$route['exportexcel']     = 'admin/exportexcel';

/* ROUTES DETAIL DATA */
$route['detailkegiatan/(:any)/(:any)']  = 'admin/detailKegiatanUser/$1/$2';

/* ROUTES CREATE DATA */
$route['home']                          = 'admin/index'; 
$route['admin']                         = 'admin/addadmin'; // DONE
$route['mitra']                         = 'admin/addmitra'; // DONE
$route['user']                          = 'admin/adduser'; // DONE
$route['jabatan']                       = 'admin/addjabatan';
$route['pejabat']                       = 'admin/addpejabat';
$route['seksi']                         = 'admin/addseksi';  // DONE
$route['kegiatan']                      = 'admin/addkegiatan';
$route['targetuser']                    = 'admin/addtargetuser';
$route['listkegiatan']                  = 'admin/dataKegiatan';
$route['profile/(:any)']                = 'Page/profile';

/* ROUTES UPDATE DATA */
$route['update']                        = 'Page/updatepass';
$route['editadmin/(:any)']              = 'admin/editadmin/$1';
$route['editmitra/(:any)']              = 'admin/editmitra/$1'; // DONE
$route['editseksi/(:any)']              = 'admin/editseksi/$1';// DONE
$route['edituser/(:any)']               = 'admin/edituser/$1'; 
$route['editkegiatan/(:any)']           = 'admin/editkegiatan/$1'; // DONE
$route['editpejabat/(:any)']            = 'admin/editpejabat/$1';
$route['editjabatan/(:any)']            = 'admin/editjabatan/$1';

/* Modal */
$route['updatedetailuser/(:any)']       = 'admin/updatedetailuser/$1';
$route['updatedetailpejabat/(:any)']    = 'admin/updatedetailpejabat/$1';
$route['updatedetailmitra/(:any)']      = 'admin/updatedetailmitra/$1';

/* Routes update data */
$route['userupdate']                    = 'admin/updateuser';
$route['pejabatupdate']                 = 'admin/updatepejabat';
$route['jabatanupdate']                 = 'admin/updatejabatan';
$route['seksiupdate']                   = 'admin/updateseksi';
$route['mitraupdate']                   = 'admin/updatemitra';
$route['kegiatanupdate']                = 'admin/updatekegiatan';
$route['targetuserupdate']              = 'admin/updatetargetuser';

/* Routes delete data */
$route['hapusmitra/(:any)']             = 'admin/deleteMitra/$1'; // CLEAR
$route['hapususer/(:any)']              = 'admin/deleteUser/$1'; // CLEAR
$route['hapuspejabat/(:any)']           = 'admin/deletePejabat/$1'; // CLEAR
$route['hapusjabatan/(:any)']           = 'admin/deleteJabatan/$1'; // CLEAR
$route['hapuskegiatan/(:any)']          = 'admin/deleteKegiatan/$1'; 
$route['hapusseksi/(:any)']             = 'admin/deleteSeksi/$1'; // CLEAR
$route['hapusadmin/(:any)']             = 'admin/deleteAdmin/$1'; // CLEAR
$route['hapuskegiatandetail/(:any)']    = 'admin/deleteKegiatanDetail/$1'; 
$route['deleteallkegiatan']             = 'admin/deleteallkegiatan/'; 


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
