<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('menu');
		$this->load->model('Departamento_model');
	}

	public function index(){
		if ($this->session->userdata('sesion')) {
			$pagina=8;
			$config=array('base_url'=>base_url().'departamento/',
				'total_rows'=>$this->Departamento_model->total_departamentos(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
			$this->pagination->initialize($config);
			$result=$this->Departamento_model->listado_departamento($config['per_page'],$this->uri->segment(2));	
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					)
			,'data_departamento'=>$result);
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$this->load->view('departamento/index',$array_data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
		
	}

	public function agregar(){
		if ($this->session->userdata('sesion')) {
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					)
			);			
			$array_rules=array(
					array('field'=>'input_departamento',
						  'label'=>'departamento',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DEL DEPARTAMENTO ES REQUERIDO.',
							'min_length'=>'EL DEPARTAMENTO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('nombre'=>$this->input->post('input_departamento'),
						'estado'=>$this->input->post('radio_estado'));
			if ($this->input->post()) {				
				$this->form_validation->set_rules($array_rules);				
				if ($this->form_validation->run()==true) {					
					$this->Departamento_model->agregar_departamento($array_form);
					redirect(base_url().'/departamento');
				}else{
					$this->load->view('departamento/agregar',$array_data);	
				}
			}else{					
				$this->load->view('departamento/agregar',$array_data);				
			}
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('sesion')) {
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$id=$this->uri->segment(3);
			$result=$this->Departamento_model->obtener_departamento($id);
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					),
				'data_departamento'=>$result
			);
			$array_rules=array(
					array('field'=>'input_departamento',
						  'label'=>'departamento',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DEL DEPARTAMENTO ES REQUERIDO.',
							'min_length'=>'EL DEPARTAMENTO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('nombre'=>$this->input->post('input_departamento'),
						'estado'=>$this->input->post('radio_estado'));
			if ($this->input->post()) {
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$this->Departamento_model->actualizar_departamento($id,$array_form);
						redirect(base_url().'/departamento');
					}else{
						$this->load->view('departamento/editar',$array_data);
					}
			}else{
				$this->load->view('departamento/editar',$array_data);	
			}	
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('sesion')) {
			$result=$this->Departamento_model->borrar_departamento($this->uri->segment(3));
		}else{
			redirect(base_url());
		}


	}

}
