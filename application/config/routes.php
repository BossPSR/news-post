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
$route['forget_step3']      = 'front-end/Register_ctr/forget_sendemail';
$route['forget_step4']      = 'front-end/Register_ctr/reset_passwordProcess';
$route['about']             = 'front-end/About_ctr';
$route['ads']               = 'front-end/Ads_ctr';
$route['insert_ads']        = 'front-end/Ads_ctr/insert_ads';
$route['payment']           = 'front-end/Payment_ctr';
$route['credit']            = 'front-end/Credit_ctr';
$route['check_user_credit'] = 'front-end/Credit_ctr/check_user_credit';
$route['saveRecord_checkout'] = 'front-end/Credit_ctr/saveRecord_checkout';
$route['paypal_success']    = 'front-end/Credit_ctr/paypal_success';
$route['download']          = 'front-end/Download_ctr';

$route['PDF']               = 'front-end/PDF_ctr';

$route['contact']           = 'front-end/Contact_ctr/index';
$route['contact_add']       = 'front-end/Contact_ctr/contact_add';
