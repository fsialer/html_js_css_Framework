<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Front';
$route['migrate']='Migrate';
$route['member/auth/login']='Front/login';
$route['summary']='Front/summary';
$route['admin']='Front/admin';
$route['summary']='Front/summary';
$route['admin/users']='User';
$route['admin/users/(:num)']='User';
$route['admin/users/change/(:num)']='User/change';

$route['admin/users/create']='User/create';
$route['admin/users/edit/(:num)']='User/edit/$1';
$route['admin/users/delete/(:num)']='User/delete/$1';
$route['admin/auth/login']='User/login';
$route['admin/auth/logout']='User/logout';
$route['admin/countries']='Country';
$route['admin/countries/(:num)']='Country';
$route['admin/countries/create']='Country/create';
$route['admin/countries/edit/(:num)']='Country/edit/$1';
$route['admin/countries/delete/(:num)']='Country/delete/$1';
$route['admin/authors']='Author';
$route['admin/authors/(:num)']='Author';
$route['admin/authors/create']='Author/create';
$route['admin/authors/edit/(:num)']='Author/edit/$1';
$route['admin/authors/delete/(:num)']='Author/delete/$1';
$route['admin/publishers']='Publisher';
$route['admin/publishers/(:num)']='Publisher';
$route['admin/publishers/create']='Publisher/create';
$route['admin/publishers/edit/(:num)']='Publisher/edit/$1';
$route['admin/publishers/delete/(:num)']='Publisher/delete/$1';
$route['admin/thematics']='Thematic';
$route['admin/thematics/(:num)']='Thematic';
$route['admin/thematics/create']='Thematic/create';
$route['admin/thematics/edit/(:num)']='Thematic/edit/$1';
$route['admin/thematics/delete/(:num)']='Thematic/delete/$1';
$route['admin/books']='Book';
$route['admin/books/(:num)']='Book';
$route['admin/books/create']='Book/create';
$route['admin/books/edit/(:num)']='Book/edit/$1';
$route['admin/books/delete/(:num)']='Book/delete/$1';
$route['admin/plans']='Plan';
$route['admin/plans/(:num)']='Plan';
$route['admin/plans/create']='Plan/create';
$route['admin/plans/edit/(:num)']='Plan/edit/$1';
$route['admin/plans/delete/(:num)']='Plan/delete/$1';
$route['admin/subscriptions']='Subscription';
$route['admin/subscriptions/(:num)']='Subscription';
$route['admin/subscriptions/create']='Subscription/create';
$route['admin/subscriptions/edit/(:num)']='Subscription/edit/$1';
$route['admin/subscriptions/delete/(:num)']='Subscription/delete/$1';
$route['admin/loans']='Loan';
$route['admin/loans/(:num)']='Loan';
$route['admin/loans/give/(:num)']='Loan/give/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
