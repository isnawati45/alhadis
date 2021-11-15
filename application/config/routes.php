<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login_page'] = 'auth/login';
$route['admin_page'] = 'dashboard';