<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']            = 'Login_controller/login';
$route['404_override']                  = '';
$route['translate_uri_dashes']          = FALSE;

$route['Dashboard']                     = 'Dashboard_controller/dashboard';
$route['Login']                         = 'Login_controller/login';
$route['LoginMe']                       = 'Login_controller/loginMe';
$route['Logout']                        = 'Login_controller/logout';
$route['List-admin']                    = 'Admin_controller/list_admin';
$route['List-Contact']                  = 'Contact_controller/list_Contact';
$route['List-Post']                     = 'Post_controller/list_post';
