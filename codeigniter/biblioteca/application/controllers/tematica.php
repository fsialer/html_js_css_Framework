<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tematica extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Tematica_model');
		
	}

	public function index(){
		if ($this->session->userdata('login')) {
			$pagina=10;
			$config=array('base_url'=>base_url().'tematica/',
				'total_rows'=>$this->Tematica_model->total_tematicas(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Tematica_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_tematicas'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("tematica/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("tematica/index",$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function agregar(){
		if ($this->session->userdata('login')) {
			if ($this->input->post()) {
				$array_rules=array(
					array('field'=>'input_nom',
						  'label'=>'tematica',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA TEMATICA ES REQUERIDO.',
							'min_length'=>'LA TEMATICA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_abrev',
						  'label'=>'abreviatura',
						  'rules'=>'required|min_length[2]',
						  'errors'=>array(
							'required'=>'LA ABREVIATURA ES REQUERIDO.',
							'min_length'=>'LA ABREVIATURA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('nombre'=>$this->input->post('input_nom'),'abreviatura'=>$this->input->post('input_abrev'));
					$this->Tematica_model->insertar($form_data);
					$this->session->set_flashdata('msg','La tematica se agrego Exitosamente.');
					redirect(base_url().'tematica');
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$this->load->view('tematica/agregar');
					$this->load->view('template/footer');
				}
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view('tematica/agregar');
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Tematica_model->obtener_tematica($id);
			if ($result) {
				if ($this->input->post()) {
					$array_rules=array(
					array('field'=>'input_nom',
						  'label'=>'tematica',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA TEMATICA ES REQUERIDO.',
							'min_length'=>'LA TEMATICA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_abrev',
						  'label'=>'abreviatura',
						  'rules'=>'required|min_length[2]',
						  'errors'=>array(
							'required'=>'LA ABREVIATURA ES REQUERIDO.',
							'min_length'=>'LA ABREVIATURA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('nombre'=>$this->input->post('input_nom'),'abreviatura'=>$this->input->post('input_abrev'));
						$this->Tematica_model->actualizar($id,$form_data);
						$this->session->set_flashdata('msg','La tematica se edito Exitosamente.');
						redirect(base_url().'tematica');
					}else{
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
						$array_data=array('data_tematicas'=>$result);		
						$this->load->view('tematica/editar',$array_data);
						$this->load->view('template/footer');
					}
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
					$array_data=array('data_tematicas'=>$result);		
					$this->load->view('tematica/editar',$array_data);
					$this->load->view('template/footer');
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'tematica');
			}	
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Tematica_model->eliminar($id);
			$this->session->set_flashdata('msg','La tematica se borro exitosamente.');
			redirect(base_url().'tematica');			
		}else{
			redirect(base_url());
		}		
	}
}
