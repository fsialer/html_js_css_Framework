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
$route['default_controller'] = 'welcome';
$route['loginusuario/(:num)'] = 'loginUsuario';
$route['loginusuario/login'] = 'loginUsuario/login';
$route['loginusuario/agregar'] = 'loginUsuario/agregar';
$route['loginusuario/editar/(:num)'] = 'loginUsuario/editar';
$route['loginusuario/borrar/(:num)'] = 'loginUsuario/borrar';
$route['dropdownestados/(:num)']="dropdownEstados";
$route['dropdownestados/agregar']="dropdownEstados/agregar";
$route['dropdownestados/cargar_provincias']="dropdownEstados/cargar_provincias";
$route['dropdownestados/editar/(:num)']="dropdownEstados/editar";
$route['dropdownestados/borrar/(:num)']="dropdownEstados/borrar";
$route['vpproducto/(:num)'] = 'vpProducto';
$route['vpproducto/agregar'] = 'vpProducto/agregar';
$route['vpproducto/editar/(:num)'] = 'vpProducto/editar';
$route['vpproducto/borrar/(:num)'] = 'vpProducto/borrar';
$route['vpproducto/abastecer/(:num)'] = 'vpProducto/abastecer';
$route['vpproducto/buscar/([a-z]+)/(\d+)'] = 'vpProducto/buscar';
$route['vpventa']='vpVenta';
$route['library_encript']="Library_encript";
$route['library_validacion']="Library_validacion";
$route['library_parser']="Library_parser";
$route['library_table']="Library_table";
$route['helper_arrays']="Helper_arrays";
$route['helper_captchars']="Helper_captchars";
$route['helper_cookies']="Helper_cookies";
$route['helper_dates']="Helper_dates";
$route['helper_directories']="Helper_directories";
$route['home']="Home";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
