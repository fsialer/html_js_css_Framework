<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Libro_model');
		$this->load->model('Tematica_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {			
				$this->load->view('template/head');
				$this->parser->parse('template/title',
				array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));	
				$this->load->view('biblioteca/panel');
				$this->load->view('template/footer');			
		}else{
			$result=$this->Tematica_model->lista_tematicas();
			$data_tematicas[0]='--SELECCION UNA TEMATICA--';
			foreach ($result as $tematicas) {
				$data_tematicas[$tematicas->id]=$tematicas->nombre;
			}
			if ($this->input->post()) {
				$form_data=array('id_tematica'=>$this->input->post('cboTematica'),'datos_autor'=>$this->input->post('input_autor'),'nom_libro'=>$this->input->post('input_libro'));	
				$result=$this->Libro_model->buscar_libro($form_data);
				if ($result) {
					$this->load->view('template/head');
						$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
					$array_data=array('data_libros'=>$result,'data_tematicas'=>$data_tematicas);
					$this->load->view('biblioteca/index',$array_data);
					$this->load->view('template/footer');
				}else{
					$this->load->view('template/head');
						$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
					$array_data=array('data_libros'=>$result,'data_tematicas'=>$data_tematicas);
					$this->session->set_flashdata('msg','NO SE ENCONTRARON RESULTADOS.');
					$this->load->view('biblioteca/index',$array_data);
					$this->load->view('template/footer');
				}				
			}else{
				$form_data=array('id_tematica'=>$this->input->post('cboTematica'),'datos_autor'=>$this->input->post('input_autor'),'nom_libro'=>$this->input->post('input_libro'));	
				$result=$this->Libro_model->buscar_libro($form_data);
				$this->load->view('template/head');
						$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
				$array_data=array('data_libros'=>$result,'data_tematicas'=>$data_tematicas);
				$this->load->view('biblioteca/index',$array_data);
				$this->load->view('template/footer');
			}

		}		
	}
}