<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'AuthController/view';

$route['AuthController/AdminHome'] = 'AuthController/AdminHome';
$route['AuthController/view'] = 'AuthController/view';
$route['AuthController/UserHome'] = 'AuthController/UserHome';
$route['AuthController/userView'] = 'AuthController/userView';
$route['AuthController/register'] = 'AuthController/register';

$route['AdminController/addRules'] = 'AdminController/addRules';
$route['AdminController/showRulesTable'] = 'AdminController/showRulesTable';
$route['AdminController/editRule'] = 'AdminController/editRule';
$route['AdminController/updateRule'] = 'AdminController/updateRule';

$route['UserController/view'] = 'UserController/view';
$route['UserController/userHome'] = 'UserController/userHome';
$route['UserController/showUserRankTable'] = 'UserController/showUserRankTable';
$route['UserController/insertUserData'] = 'UserController/insertUserData';
