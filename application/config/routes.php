<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'AuthController/view';
$route['AuthController/AdminHome'] = 'AuthController/AdminHome';
$route['AuthController/UserHome'] = 'AuthController/UserHome';
$route['UserController/view'] = 'UserController/view';
$route['AdminController/addRules'] = 'AdminController/addRules';
