<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config=array(
	'Front/login'=>array(
		array(
			'field'=>'email',
			'label'=>'email',
			'rules'=>'required|valid_email',
			'errors'=>array('required'=>'El email es requerido.','valid_email'=>'El email tiene que ser válido:example@mail.com')
			),		
		array(
			'field'=>'password',
			'label'=>'password',
			'rules'=>'required',
			'errors'=>array('required'=>'La contraseña es requerido.')
			)),
	'Front/summary'=>array(
		array(
			'field'=>'place[]',
			'label'=>'place[]',
			'rules'=>'required',
			'errors'=>array('required'=>'El lugar es requerido.')
			)),
	'User/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[3]|max_length[80]',
			'errors'=>array('required'=>'El Nombre es requerido.','max_length'=>'Los Nombres tiene que ser menor a 80 caracteres.','min_length'=>'Los Nombres tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'surname',
			'label'=>'surname',
			'rules'=>'required|min_length[3]|max_length[80]',
			'errors'=>array('required'=>'Los Apellidos es requerido.','max_length'=>'Los Apellidos tiene que ser menor a 80 caracteres.','min_length'=>'Los Apellidos tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'address',
			'label'=>'address',
			'rules'=>'required|min_length[3]|max_length[80]',
			'errors'=>array('required'=>'La Dirección es requerido.','max_length'=>'La Dirección tiene que ser menor a 80 caracteres.','min_length'=>'La Dirección tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'email',
			'label'=>'email',
			'rules'=>'required|valid_email|is_unique[users.email]',
			'errors'=>array('required'=>'El email es requerido.','valid_email'=>'El email tiene que ser válido:example@mail.com','is_unique'=>'El Email ingresado esta siendo usado.')
			),
		array(
			'field'=>'password',
			'label'=>'password',
			'rules'=>'required',
			'errors'=>array('required'=>'La contraseña es requerido.')
			),
		array(
			'field'=>'type',
			'label'=>'type',
			'rules'=>'required|in_list[admin,member]',
			'errors'=>array('required'=>'El tipo es requerido.','in_list'=>'El elemento elegido no es válido.')
			)),
	'User/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[3]|max_length[80]',
			'errors'=>array('required'=>'El Nombre es requerido.','max_length'=>'Los Nombres tiene que ser menor a 80 caracteres.','min_length'=>'Los Nombres tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'address',
			'label'=>'address',
			'rules'=>'required|min_length[3]|max_length[80]',
			'errors'=>array('required'=>'La Dirección es requerido.','max_length'=>'La Dirección tiene que ser menor a 80 caracteres.','min_length'=>'La Dirección tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'email',
			'label'=>'email',
			'rules'=>'required|valid_email',
			'errors'=>array('required'=>'El email es requerido.','valid_email'=>'El email tiene que ser válido:example@mail.com')
			),		
		array(
			'field'=>'type',
			'label'=>'type',
			'rules'=>'required|in_list[admin,member]',
			'errors'=>array('required'=>'El tipo es requerido.','in_list'=>'El elemento elegido no es válido.')
			)),
	'User/login'=>array(
		array(
			'field'=>'email',
			'label'=>'email',
			'rules'=>'required|valid_email',
			'errors'=>array('required'=>'El email es requerido.','valid_email'=>'El email tiene que ser válido:example@mail.com')
			),		
		array(
			'field'=>'password',
			'label'=>'password',
			'rules'=>'required',
			'errors'=>array('required'=>'La contraseña es requerido.')
			)),
	'User/change'=>array(		
		array(
			'field'=>'old_pass',
			'label'=>'old_pass',
			'rules'=>'required|callback_check_pass',
			'errors'=>array('required'=>'La contraseña es requerido.','check_pass'=>'Contraseña incorrecta')
			),
		array(
			'field'=>'new_pass',
			'label'=>'new_pass',
			'rules'=>'required',
			'errors'=>array('required'=>'La nueva contraseña es requerido.')
			),
		array(
			'field'=>'rnew_pass',
			'label'=>'rnew_pass',
			'rules'=>'required|matches[new_pass]',
			'errors'=>array('required'=>'La repeticion de la nueva contraseña es requerido.','matches'=>'La nueva contraseña no coincide')
			)),
	'Plan/create'=>array(		
		array(
			'field'=>'plan',
			'label'=>'plan',
			'rules'=>'required|in_list[monthly,annual]',
			'errors'=>array('required'=>'El plan es requerido.','in_list'=>'La opción no es válida.')
			),
		array(
			'field'=>'price',
			'label'=>'price',
			'rules'=>'required|decimal',
			'errors'=>array('required'=>'El precio es requerido.','decimal'=>'El precio tiene que ser decimal.')
			)),
	'Plan/edit'=>array(		
		array(
			'field'=>'plan',
			'label'=>'plan',
			'rules'=>'required|in_list[monthly,annual]',
			'errors'=>array('required'=>'El plan es requerido.','in_list'=>'La opción no es válida.')
			),
		array(
			'field'=>'price',
			'label'=>'price',
			'rules'=>'required|decimal',
			'errors'=>array('required'=>'El precio es requerido.','decimal'=>'El precio tiene que ser decimal.')
			)),
	'Subscription/create'=>array(		
		array(
			'field'=>'user',
			'label'=>'user',
			'rules'=>'required',
			'errors'=>array('required'=>'El usuario es requerido.')
			),
		array(
			'field'=>'plan',
			'label'=>'plan',
			'rules'=>'required',
			'errors'=>array('required'=>'El plan es requerido.')
			)),
	'Subscription/edit'=>array(		
		array(
			'field'=>'user',
			'label'=>'user',
			'rules'=>'required',
			'errors'=>array('required'=>'El usuario es requerido.')
			),
		array(
			'field'=>'plan',
			'label'=>'plan',
			'rules'=>'required',
			'errors'=>array('required'=>'El plan es requerido')
			)),
	'Country/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]|is_unique[countries.name]',
			'errors'=>array('required'=>'El Nombre del País es requerido.','max_length'=>'El Nombre del País tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del País tiene que ser mayor a 3 caracteres.','is_unique'=>'El Nombre del País ya existe.')
			)),

	'Country/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'El Nombre del País es requerido.','max_length'=>'El Nombre del País tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del País tiene que ser mayor a 3 caracteres.')
			)),
	'Author/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]|is_unique[authors.name]',
			'errors'=>array('required'=>'El Nombre del Autor es requerido.','max_length'=>'El Nombre del Autor tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del Autor tiene que ser mayor a 3 caracteres.','is_unique'=>'El Nombre del Autor ya existe.')
			)),
	'Author/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'El Nombre del Autor es requerido.','max_length'=>'El Nombre del Autor tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del Autor tiene que ser mayor a 3 caracteres.')
			)),
	'Publisher/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]|is_unique[publishers.name]',
			'errors'=>array('required'=>'El Nombre de la Editorial es requerido.','max_length'=>'El Nombre de la Editorial tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre de la Editorial tiene que ser mayor a 3 caracteres.','is_unique'=>'El Nombre de la Editorial ya existe.')
			)),
	'Publisher/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'El Nombre de la Editorial es requerido.','max_length'=>'El Nombre de la Editorial tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre de la Editorial tiene que ser mayor a 3 caracteres.')
			)),
	'Thematic/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]|is_unique[thematics.name]',
			'errors'=>array('required'=>'El Nombre de la Temática es requerido.','max_length'=>'El Nombre de la temática tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre de la Temática tiene que ser mayor a 3 caracteres.','is_unique'=>'El Nombre del Tematica ya existe.')
			)),
	'Thematic/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'El Nombre de la Temática es requerido.','max_length'=>'El Nombre de la temática tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre de la Temática tiene que ser mayor a 3 caracteres.')
			)),
	'Book/create'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]|is_unique[books.name]',
			'errors'=>array('required'=>'El Nombre del Libro es requerido.','max_length'=>'El Nombre del Libro tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del Libro tiene que ser mayor a 3 caracteres.','is_unique'=>'El Nombre del Libro ya existe.')
			),
		array(
			'field'=>'thematic',
			'label'=>'thematic',
			'rules'=>'required',
			'errors'=>array('required'=>'La temática es requerido.')
			),
		array(
			'field'=>'author[]',
			'label'=>'author[]',
			'rules'=>'required',
			'errors'=>array('required'=>'El autor es requerido.')
			),
		array(
			'field'=>'publisher',
			'label'=>'publisher',
			'rules'=>'required',
			'errors'=>array('required'=>'El Editorial es requerido.')
			),
		array(
			'field'=>'num_page',
			'label'=>'num_page',
			'rules'=>'required|numeric|is_natural_no_zero',
			'errors'=>array('required'=>'El número de páginas es requerido.','numeric'=>'El número de páginas tiene que ser numérico.','is_natural_no_zero'=>'El número de páginas tiene que ser mayor a 0.')
			),
		array(
			'field'=>'stock',
			'label'=>'stock',
			'rules'=>'required|numeric|is_natural_no_zero',
			'errors'=>array('required'=>'El número de ejemplares es requerido.','numeric'=>'El número de ejemplares tiene que ser numérico.','is_natural_no_zero'=>'El número de ejemplares tiene que ser mayor a 0.')
			),
		array(
			'field'=>'publication',
			'label'=>'publication',
			'rules'=>'required',
			'errors'=>array('required'=>'La fecha de publicación es requerido.')
			),
		array(
			'field'=>'location',
			'label'=>'location',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'La Ubicación es requerido.','max_length'=>'La ubicación tiene que ser menor a 80 caracteres.','min_length'=>'La ubicación tiene que ser mayor a 3 caracteres.')
			)),
		'Book/edit'=>array(
		array(
			'field'=>'name',
			'label'=>'name',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'El Nombre del Libro es requerido.','max_length'=>'El Nombre del Libro tiene que ser menor a 80 caracteres.','min_length'=>'El Nombre del Libro tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'thematic',
			'label'=>'thematic',
			'rules'=>'required',
			'errors'=>array('required'=>'La temática es requerido.')
			),
		array(
			'field'=>'author[]',
			'label'=>'author[]',
			'rules'=>'required',
			'errors'=>array('required'=>'El autor es requerido.')
			),
		array(
			'field'=>'publisher',
			'label'=>'publisher',
			'rules'=>'required',
			'errors'=>array('required'=>'El Editorial es requerido.')
			),
		array(
			'field'=>'num_page',
			'label'=>'num_page',
			'rules'=>'required|numeric|is_natural_no_zero',
			'errors'=>array('required'=>'El número de páginas es requerido.','numeric'=>'El número de páginas tiene que ser numérico.','is_natural_no_zero'=>'El número de páginas tiene que ser mayor a 0.')
			),		
		array(
			'field'=>'publication',
			'label'=>'publication',
			'rules'=>'required',
			'errors'=>array('required'=>'La fecha de publicación es requerido.')
			),
		array(
			'field'=>'location',
			'label'=>'location',
			'rules'=>'required|min_length[2]|max_length[80]',
			'errors'=>array('required'=>'La Ubicación es requerido.','max_length'=>'La ubicación tiene que ser menor a 80 caracteres.','min_length'=>'La ubicación tiene que ser mayor a 3 caracteres.')
			),
		array(
			'field'=>'state',
			'label'=>'state',
			'rules'=>'required|in_list[active,inactive]',
			'errors'=>array('required'=>'El estado es requerido.','in_list'=>'El elemento elegido no es válido.')
			))


	);