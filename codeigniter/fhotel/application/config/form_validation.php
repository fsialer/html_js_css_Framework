<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config=array(
	'Amenity/create'=>array(
		array(
			'field'=>'nom_am',
			'label'=>'nom_am',
			'rules'=>'required|max_length[80]|is_unique[amenities.name_am]',
			'errors'=>array(
				'required'=>'La amenidad es requerido.',
				'max_length'=>'El nombre de la amenidad excedio su capacidad máxima',
				'is_unique'=>'La amenidad ya existe.'
				)
			)

		),
	'Type_room/create'=>array(
		array(
			'field'=>'nom_tiph',
			'label'=>'nom_tiph',
			'rules'=>'required|max_length[80]|is_unique[amenities.name_am]',
			'errors'=>array(
				'required'=>'La amenidad es requerido.',
				'max_length'=>'El nombre de la amenidad excedio su capacidad máxima',
				'is_unique'=>'La amenidad ya existe.'
				)
			),
		array(
			'field'=>'descrip_tiph',
			'label'=>'descrip_tiph',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La descripción del tipo de habitación es requerido.'
				)
			),
		array(
			'field'=>'capmax_tiph',
			'label'=>'capmax_tiph',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'La capacidad máxima del tipo de habitación es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor.'
				)
			),
		array(
			'field'=>'amenidades[]',
			'label'=>'amenidades[]',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'Las amenidades son requeridas.'
				)
			),
		array(
			'field'=>'habitaciones[]',
			'label'=>'habitaciones[]',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'Las habitaciones son requeridas.'
				)
			),
		),
	'Room/create'=>array(
		array(
			'field'=>'num_hab',
			'label'=>'num_hab',
			'rules'=>'required|max_length[20]|is_unique[rooms.num_r]',
			'errors'=>array(
				'required'=>'El número de la habitación es requerido.',
				'max_length'=>'El número de la habitación excedio su capacidad máxima',
				'is_unique'=>'El número de la habitación ya existe.'
				)
			)

		),
	'Rate/create'=>array(
		array(
			'field'=>'tip_hab',
			'label'=>'tip_hab',
			'rules'=>'is_natural_no_zero',
			'errors'=>array(
				'is_natural_no_zero'=>'El tipo de habitación es requerido.',
				
				)
			),
		array(
			'field'=>'nom_ta',
			'label'=>'nom_ta',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'El nombre de la tarifa es requerido.',
				'max_length'=>'El nombre de la tarifa excedio su capacidad máxima.',
				
				)
			),
		array(
			'field'=>'prec_ta',
			'label'=>'prec_ta',
			'rules'=>'required|is_natural_no_zero',
			'errors'=>array(
				'required'=>'El precio de la tarifa es requerido.',
				'is_natural_no_zero'=>'No esta permitido este tipo de valor.',
				
				)
			),

		),
	'Position/create'=>array(
		array(
			'field'=>'nom_carg',
			'label'=>'nom_carg',
			'rules'=>'required|max_length[80]|is_unique[positions.name_pos]',
			'errors'=>array(
				'required'=>'El nombre del cargo es requerido.',
				'max_length'=>'Elnombre del cargo excedio su capacidad máxima',
				'is_unique'=>'El nombre del cargo ya existe.'
				)
			)

		),
	'Employee/create'=>array(
		array(
			'field'=>'cargo',
			'label'=>'cargo',
			'rules'=>'is_natural_no_zero',
			'errors'=>array(
				'is_natural_no_zero'=>'El cargo es requerido.'
				)
			),
		array(
			'field'=>'nom_emp',
			'label'=>'nom_emp',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'Los nombres completos del empleado es requerido.',
				'max_length'=>'Los nombres completos del empleado excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'ape_emp',
			'label'=>'ape_emp',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'Los apellidos del empleado es requerido.',
				'max_length'=>'Los apellidos del empleado excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'dir_emp',
			'label'=>'dir_emp',
			'rules'=>'required|max_length[80]',
			'errors'=>array(
				'required'=>'La dirección del empleado es requerido.',
				'max_length'=>'La dirección del empleado excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'telf_emp',
			'label'=>'telf_emp',
			'rules'=>'required|max_length[20]',
			'errors'=>array(
				'required'=>'El telefono del empleado es requerido.',
				'max_length'=>'El telefono del empleado excedio su capacidad máxima'
				)
			),
		array(
			'field'=>'email_emp',
			'label'=>'email_emp',
			'rules'=>'required|max_length[80]|is_unique[employees.email_emp]',
			'errors'=>array(
				'required'=>'El email del empleado es requerido.',
				'max_length'=>'El email del empleado excedio su capacidad máxima',
				'is_unique'=>'El email del empleado ya existe.'
				)
			),
		array(
			'field'=>'dni_emp',
			'label'=>'dni_emp',
			'rules'=>'required|max_length[80]|is_unique[employees.dni_emp]',
			'errors'=>array(
				'required'=>'El documento de identidad es requerido.',
				'max_length'=>'El documento de identidad excedio su capacidad máxima',
				'is_unique'=>'El documento de identidad ya existe.'
				)
			),

		),
	'Front/availables'=>array(
		array(
			'field'=>'f_llegada',
			'label'=>'f_llegada',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La fecha de llegada es requerido.'
				)
			),
		array(
			'field'=>'f_salida',
			'label'=>'f_salida',
			'rules'=>'required',
			'errors'=>array(
				'required'=>'La fecha de salida es requerido.'
				)
			)
		)



	);