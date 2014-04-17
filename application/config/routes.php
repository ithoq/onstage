<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
*/
$route['event/(:any)/(:num)'] = "eventos/lookup/$1/$2";
$route['import/(:any)']       = "import/last/$1";
$route['hamburg']   = "home/hamburg";
$route['munich']    = "home/munich";
$route['dusseldorf']= "home/dusseldorf";
$route['koln']= "home/koln";
// Reserved Routes
$route['default_controller'] = "home";
$route['404_override'] = '';

// Authentication
$route[LOGIN_URL]				= 'users/login';
$route[REGISTER_URL]            = 'users/register';
$route['users/login']           = '';
$route['users/register']        = '';
$route['logout']				= 'users/logout';
$route['forgot_password']		= 'users/forgot_password';
$route['reset_password/(:any)/(:any)']	= "users/reset_password/$1/$2";

// Contexts
$route[SITE_AREA .'/([a-z_]+)/(:any)/(:any)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4/$5/$6";
$route[SITE_AREA .'/([a-z_]+)/(:any)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4/$5";
$route[SITE_AREA .'/([a-z_]+)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4";
$route[SITE_AREA .'/([a-z_]+)/(:any)/(:any)'] 		= "$2/$1/$3";
$route[SITE_AREA .'/([a-z_]+)/(:any)']				= "$2/$1/index";
$route[SITE_AREA .'/content']				= "admin/content/index";
$route[SITE_AREA .'/reports']				= "admin/reports/index";
$route[SITE_AREA .'/developer']				= "admin/developer/index";
$route[SITE_AREA .'/settings']				= "settings/index";
$route[SITE_AREA]	= 'admin/home';
// Activation
$route['activate']		        = 'users/activate';
$route['activate/(:any)']		= 'users/activate/$1';
$route['resend_activation']		= 'users/resend_activation';

/* End of file routes.php */
/* Location: ./application/config/routes.php */