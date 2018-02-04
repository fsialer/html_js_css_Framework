<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_validacion extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$rules=array(
			array('field'=>'input_nombre',
					'label'=>'',
					'rules'=>'required|regex_match[/[a-z]/]|trim|xss_clean',
					'errors'=>array(
						'required'=>'el nombre es requerido.',
						'regex_match'=>'solo recibe un formato [a-z]')
				),
			array('field'=>'input_edad',
				'label'=>'edad',
				'rules'=>'required|integer',
				'errors'=>array(
						'required'=>'el nombre es requerido.',
						'integer'=>'tiene que ser integer'
						)
				),
			array('field'=>'input_fecha',
				'label'=>'fecha',
				'rules'=>'required',
				'errors'=>array(
						'required'=>'la fecha es requerido.',
						
						)
				),
			array('field'=>'input_dni',
				'label'=>'fecha',
				'rules'=>'required|numeric',
				'errors'=>array(
						'required'=>'la dni es requerido.',
						'numeric'=>'solo numeros'
						
						)
				),
			array('field'=>'genero',
				'label'=>'genero',
				'rules'=>'required',
				'errors'=>array(
						'required'=>'el genero es requerido.',
						
						
						)
				)

			);
		if ($this->input->post()) {
			$data_form=array('nombre'=>$this->input->post('input_nombre'),
				'edad'=>$this->input->post('input_edad'),
				'fecha'=>$this->input->post('input_fecha'),
				'dni'=>$this->input->post('input_dni'),
				'genero'=>$this->input->post('genero')
				);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==true) {
				var_dump($data_form);
			}else{
				$this->load->view('library_test/validation/validacion_form');
			}
		}else{
			$this->load->view('library_test/validation/validacion_form');
		}
	}
}
