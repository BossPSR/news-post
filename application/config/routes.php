<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'front-end/Home_ctr';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'front-end/Home_ctr';
$route['register'] = 'front-end/Register_ctr';
$route['about'] = 'front-end/About_ctr';
$route['ads'] = 'front-end/Ads_ctr';
$route['payment'] = 'front-end/Payment_ctr';
$route['credit'] = 'front-end/Credit_ctr';
$route['download'] = 'front-end/Download_ctr';
$route['contact'] = 'front-end/Contact_ctr';


