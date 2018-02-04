<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('menu');
		$this->load->model('Departamento_model');
		$this->load->model('Provincia_model');
	}

	public function index(){
		if ($this->session->userdata('sesion')) {
			$pagina=8;
			$config=array('base_url'=>base_url().'provincia/',
				'total_rows'=>$this->Provincia_model->total_provincias(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
			$this->pagination->initialize($config);
			$result=$this->Provincia_model->listado_provincia($config['per_page'],$this->uri->segment(2));	
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					)
			,'data_provincia'=>$result);
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$this->load->view('provincia/index',$array_data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
	}

	public function agregar(){
		if ($this->session->userdata('sesion')) {
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$array_departamento=$this->Departamento_model->listar_departamentos();
			$lista_departamento[0]='---SELECCIONE UN DEPARTAMENTO---';
			foreach ($array_departamento as $departamento) {
				$lista_departamento[$departamento->id]=$departamento->nombre;
			}
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					),
				'data_departamento'=>$lista_departamento
			);
			$array_rules=array(
					array('field'=>'cboRegion',
						'label'=>'regiones',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'input_provincia',
						  'label'=>'provincia',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DE LA PROVINCIA ES REQUERIDO.',
							'min_length'=>'LA PROVINCIA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('id_departamento'=>$this->input->post('cboDepartamento'),
						'nombre'=>$this->input->post('input_provincia'),
						'estado'=>$this->input->post('radio_estado'));

			if ($this->input->post()) {
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$this->Provincia_model->agregar_provincia($array_form);
					redirect(base_url().'/provincia');
				}else{
					$this->load->view('provincia/agregar',$array_data);	
				}
			}else{				
				$this->load->view('provincia/agregar',$array_data);	
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
			$result=$this->Provincia_model->obtener_provincia($id);
			$array_departamento=$this->Departamento_model->listar_departamentos();
			$lista_departamento[0]='---SELECCIONE UN DEPARTAMENTO---';
			foreach ($array_departamento as $departamento) {
				$lista_departamento[$departamento->id]=$departamento->nombre;
			}
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					),
				'data_departamento'=>$lista_departamento,
				'data_provincia'=>$result
			);
			$array_rules=array(
					array('field'=>'cboDepartamento',
						'label'=>'departamento',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'input_provincia',
						  'label'=>'provincia',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DE LA PROVINCIA ES REQUERIDO.',
							'min_length'=>'LA PROVINCIA TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('id_departamento'=>$this->input->post('cboDepartamento'),
						'nombre'=>$this->input->post('input_provincia'),
						'estado'=>$this->input->post('radio_estado'));
			if ($this->input->post()) {
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$this->Provincia_model->actualizar_provincia($id,$array_form);
					redirect(base_url().'/provincia');
				}else{
					$this->load->view('provincia/editar',$array_data);
				}
			}else{
				$this->load->view('provincia/editar',$array_data);
			}
			
		}else{
			redirect(base_url());
		}

	}

	public function borrar(){
		if ($this->session->userdata('sesion')) {
			$result=$this->Provincia_model->borrar_provincia($this->uri->segment(3));
		}else{
			redirect(base_url());
		}
	}
}