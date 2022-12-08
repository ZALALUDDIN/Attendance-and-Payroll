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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'DashboardCtrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'Dashboard';

/* user profile */
$route['profile']['get'] = 'Profile/index';
$route['profile']['post'] = 'Profile/store';

$route['change_password']['get'] = 'Profile/cp';
$route['change_password']['post'] = 'Profile/cp_store';

/* employee route */
$route['employee'] = 'UserCtrl/index';
$route['employee/add']['get'] = 'UserCtrl/create';
$route['employee/store']['post'] = 'UserCtrl/store';
$route['employee/edit/(:num)'] = 'UserCtrl/update/$1';
$route['employee/delete/(:num)'] = 'UserCtrl/destroy/$1';

/* attendance route */
$route['attendance'] = 'AttendanceCtrl/index';
$route['attendance/add']['get'] = 'AttendanceCtrl/create';
$route['attendance/get_empdata_list']['get'] = 'AttendanceCtrl/get_empdata_list';
$route['attendance/get_empdata']['get'] = 'AttendanceCtrl/get_empdata';
$route['attendance/get_empdata']['get'] = 'AttendanceCtrl/get_empdata';
$route['attendance/add']['post'] = 'AttendanceCtrl/store';
$route['attendance/update'] = 'AttendanceCtrl/update';
/* salary route */
$route['salary'] = 'SalaryCtrl/index';
$route['salary/add']['get'] = 'SalaryCtrl/create';
$route['salary/get_salarydata_list']['get'] = 'SalaryCtrl/get_salarydata_list';
$route['salary/store']['post'] = 'SalaryCtrl/store';
$route['salary/edit/(:num)'] = 'SalaryCtrl/update/$1';
$route['salary/delete/(:num)'] = 'SalaryCtrl/destroy/$1';



/* auth route */
$route['auth'] = 'AuthCtrl/index';
$route['auth/add']['get'] = 'AuthCtrl/register';
$route['auth/delete/(:num)'] = 'AuthCtrl/destroy/$1';

/* Auth route */
$route['register']['get'] = 'AuthCtrl/register';
$route['register']['post'] = 'AuthCtrl/store';
$route['login']['get'] = 'AuthCtrl/login';
$route['login']['post'] = 'AuthCtrl/login_check';
$route['logout']['get'] = 'AuthCtrl/logout';

$route['logout']['get'] = 'AuthCtrl/logout';
$route['lock']['get'] = 'AuthCtrl/lock';

/* block magic route */
$route['(.+)']="Error_page/page_missing";

