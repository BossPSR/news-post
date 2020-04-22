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
$route['insert_ads_pdf']        = 'front-end/Ads_ctr/insert_ads_pdf';
$route['payment']           = 'front-end/Payment_ctr';
$route['credit']            = 'front-end/Credit_ctr';
$route['check_user_credit'] = 'front-end/Credit_ctr/check_user_credit';
$route['saveRecord_checkout'] = 'front-end/Credit_ctr/saveRecord_checkout';
$route['transfer_money']    = 'front-end/Credit_ctr/transfer_money';
$route['paypal_success']    = 'front-end/Credit_ctr/paypal_success';
$route['download']          = 'front-end/Download_ctr';
$route['download-search']   = 'front-end/Download_ctr/download_search';
$route['publish']           = 'front-end/Publish_ctr';
$route['order-history']     = 'front-end/Order_history_ctr';
$route['PDF']               = 'front-end/PDF_ctr';
$route['PDF-F']               = 'front-end/CustomFpdf_ctr';
$route['PDFHOME']               = 'front-end/CustomFpdf_ctr/home_pdf';
$route['publish-download-template']       = 'front-end/Publish_ctr/download_template';
$route['publish-download-pdf']            = 'front-end/Publish_ctr/download_pdf';
$route['profile']           = 'front-end/Profile_ctr/profile';
$route['profile-update']    = 'front-end/Profile_ctr/profile_edit';
$route['contact']           = 'front-end/Contact_ctr/index';
$route['contact_add']       = 'front-end/Contact_ctr/contact_add';

$route['textarea']          = 'front-end/Home_ctr/textarea';

$route['transfer']    = 'front-end/Transfer_history_ctr';
$route['transfer_insert']    = 'front-end/Transfer_history_ctr/transfer_insert';

