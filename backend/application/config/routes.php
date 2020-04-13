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
$route['post_add_com']                  = 'Post_controller/post_add_com';
$route['post_edit_com']                  = 'Post_controller/post_edit_com';
$route['delete_post']                  = 'Post_controller/delete_post';
$route['List-Order']                  = 'Order_controller/list_order';
$route['List_order_pdf']                  = 'Order_controller/list_order_pdf';
$route['Main_order']                  = 'Order_controller/main_order';
$route['pdf_add_com']                  = 'Order_controller/pdf_add_com';
$route['pdf_edit_com']                  = 'Order_controller/pdf_edit_com';
$route['delete_pdf']                     = 'Order_controller/delete_pdf';
$route['List_Contact_us']                  = 'Contact_controller/list_Contact_us';
$route['contact_us_com']                  = 'Contact_controller/contact_us_com';
$route['contact_us_edit']                  = 'Contact_controller/contact_us_edit';
$route['delete_contact_us']                  = 'Contact_controller/delete_contact_us';
