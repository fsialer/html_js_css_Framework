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
$route['default_controller'] = 'Biblioteca';
$route['usuario/(:num)'] = 'Usuario';
$route['usuario/agregar'] = 'Usuario/agregar';
$route['usuario/editar/(:num)'] = 'Usuario/editar';
$route['usuario/borrar/(:num)'] = 'Usuario/borrar';
$route['usuario/login'] = 'Usuario/login';
$route['usuario/logout'] = 'Usuario/logout';
$route['empleado/(:num)'] = 'Empleado';
$route['empleado/agregar'] = 'Empleado/agregar';
$route['empleado/editar/(:num)'] = 'Empleado/editar';
$route['empleado/borrar/(:num)'] = 'Empleado/borrar';
$route['lector/(:num)'] = 'Lector';
$route['lector/agregar'] = 'Lector/agregar';
$route['lector/editar/(:num)'] = 'Lector/editar';
$route['lector/borrar/(:num)'] = 'Lector/borrar';
$route['lector/verificar_usuario'] = 'Lector/verificar_usuario';
$route['suscripcion/(:num)'] = 'Suscripcion';
$route['suscripcion/agregar'] = 'Suscripcion/agregar';
$route['suscripcion/editar/(:num)'] = 'Suscripcion/editar';
$route['suscripcion/borrar/(:num)'] = 'Suscripcion/borrar';
$route['suscripcion/filtrar_persona'] = 'Suscripcion/filtrar_persona';
$route['autor/(:num)'] = 'Autor';
$route['autor/agregar'] = 'Autor/agregar';
$route['autor/editar/(:num)'] = 'Autor/editar';
$route['autor/borrar/(:num)'] = 'Autor/borrar';
$route['editorial/(:num)'] = 'Editorial';
$route['editorial/agregar'] = 'Editorial/agregar';
$route['editorial/editar/(:num)'] = 'Editorial/editar';
$route['editorial/borrar/(:num)'] = 'Editorial/borrar';
$route['libro/(:num)'] = 'Libro';
$route['libro/agregar'] = 'Libro/agregar';
$route['libro/editar/(:num)'] = 'Libro/editar';
$route['libro/borrar/(:num)'] = 'Libro/borrar';
$route['libro/abastecer/(:num)'] = 'Libro/abastecer';
$route['tematica/(:num)'] = 'Tematica';
$route['tematica/agregar'] = 'Tematica/agregar';
$route['tematica/editar/(:num)'] = 'Tematica/editar';
$route['tematica/borrar/(:num)'] = 'Tematica/borrar';
$route['nacionalidad/(:num)'] = 'Nacionalidad';
$route['nacionalidad/agregar'] = 'Nacionalidad/agregar';
$route['nacionalidad/editar/(:num)'] = 'Nacionalidad/editar';
$route['nacionalidad/borrar/(:num)'] = 'Nacionalidad/borrar';
$route['prestamo/(:num)'] = 'Prestamo';
$route['prestamo/resumen'] = 'Prestamo/resumen';
$route['prestamo/agregar'] = 'Prestamo/agregar';
$route['prestamo/login_lect'] = 'Prestamo/login_lect';
$route['prestamo/devolver/(:num)'] = 'Prestamo/devolver';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
