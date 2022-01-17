<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//------------------------------------------------ROUTES FOR FRONT-------------------------------------------
$route['products'] = 'products/index';
$route['gallery'] = 'gallery/index';
$route['contact'] = 'contact/index';
$route['about'] = 'about/index';
$route['policy'] = 'policy/index';
$route['terms'] = 'terms/index';
$route['faq'] = 'faq/index';
$route['checkout'] = 'checkout/index';
$route['cart'] = 'cart/index';
$route['product-detail'] = 'product_detail/index';
$route['login-signup'] = 'login_signup/index';
$route['proceed-checkout'] = 'ecom_process/proceed_checkout';
// $route['category/(:any)/(:any)'] = 'home/category/$1/$2';

// $route['sub-category/(:any)/(:any)'] = 'home/sub_category/$1/$2';

$route['sign-in'] = 'customer/sign_in';
$route['sign-up'] = 'customer/sign_up';
$route['customer-logout'] = 'customer/customer_logout';
$route['customer-dashboard'] = 'customer/customer_dashboard';
$route['customer-orders'] = 'customer/customer_orders';
$route['customer-profile'] = 'customer/customer_edit_profile';
$route['customer-invoice/(:any)'] = 'customer/customer_invoice/$1';


//--------------------------------------------------cart-------------------------------------------------


//------------------------------------------------ROUTES FOR ADMIN-------------------------------------------

$route['login'] = 'admin/login';
$route['forget-password'] = 'admin/forget_form';
$route['register'] = 'admin/register';
$route['profile'] = 'admin/profile';
$route['list/(:any)'] = 'admin/lists/$1';
$route['view/(:any)/(:any)'] = 'admin/view/$1/$1';
$route['view-update/(:any)/(:any)'] = 'admin/read_status_view/$1/$1';
$route['add/(:any)'] = 'admin/add/$1';
$route['add_data/(:any)'] = 'admin/add_data/$1';
$route['edit/(:any)/(:any)'] = 'admin/edit/$1/$1';
$route['general-edit/(:any)/(:any)'] = 'admin/edit_extras/$1/$1';
$route['update_data/(:any)/(:any)'] = 'admin/update_data/$1/$1';
$route['delete/(:any)/(:any)'] = 'admin/delete/$1/$1';

$route['calculate-tax'] = 'admin/calculate_tax';

//------------------------------------------------ROUTES FOR MEMBERS-------------------------------------------
