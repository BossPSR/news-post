<?php
defined('BASEPATH') or exit('No direct script access allowed');



$route['default_controller'] = 'front-end/Home_ctr';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index']             = 'front-end/Home_ctr';
$route['loginMe']           = 'front-end/Login_ctr/loginMe';
$route['logout']            = 'front-end/Login_ctr/logout';
$route['register']          = 'front-end/Register_ctr';
$route['register_success']  = 'front-end/Register_ctr/regist_complete';
$route['forget_step1']      = 'front-end/Register_ctr/forgot_passwordProcess';
$route['forget_step2']      = 'front-end/Register_ctr/sendEmail';
$route['forget_step3']      = 'front-end/Register_ctr/reset_passwordProcess';
$route['about']             = 'front-end/About_ctr';
$route['ads']               = 'front-end/Ads_ctr';
$route['payment']           = 'front-end/Payment_ctr';
$route['credit']            = 'front-end/Credit_ctr';
$route['download']          = 'front-end/Download_ctr';

$route['contact']           = 'front-end/Contact_ctr/index';
$route['contact_add']       = 'front-end/Contact_ctr/contact_add';
