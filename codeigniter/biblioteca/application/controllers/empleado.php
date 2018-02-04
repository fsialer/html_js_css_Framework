<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Empleado_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {
			
			$pagina=10;
			$config=array('base_url'=>base_url().'empleado/',
				'total_rows'=>$this->Empleado_model->total_empleados(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Empleado_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_empleados'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("empleado/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("empleado/index",$array_data);
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
						  'label'=>'nombres',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE ES REQUERIDO.',
							'min_length'=>'EL NOMBRE TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_ap',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO PATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO PATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_am',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO MATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO MATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|valid_email',
						  'errors'=>array(
							'required'=>'EL EMAIL ES REQUERIDO.',
							'valid_email'=>'EL EMAIL NO ES VALIDO.')
						),	
					array('field'=>'input_tel_cel',
						  'label'=>'telefono celular',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL TELEFONO/CELULAR ES REQUERIDO.',
							'min_length'=>'EL TELEFONO/CELULAR TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_dir',
						  'label'=>'direccion',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA DIRECCION ES REQUERIDO.',
							'min_length'=>'LA DIRECCION TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_dni',
						  'label'=>'dni',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL DNI ES REQUERIDO.',
							'min_length'=>'EL DNI TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_fn',
						  'label'=>'fecha nacimiento',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE NACIMIENTO ES REQUERIDO.')
						),										
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un estado.")
						)
					);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'email'=>$this->input->post('input_email'),'tel_cel'=>$this->input->post('input_tel_cel'),'direccion'=>$this->input->post('input_dir'),'dni'=>$this->input->post('input_dni'),'fecha_nac'=>$this->input->post('input_fn'),'estado'=>$this->input->post('estado'));
					$this->Empleado_model->insertar($form_data);
					$this->session->set_flashdata('msg','El empleado se agrego Exitosamente.');
					redirect(base_url().'empleado');				
				}else{				 
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$this->load->view('empleado/agregar');
					$this->load->view('template/footer');			
				}
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view('empleado/agregar');
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Empleado_model->obtener_empleado($id);	
			if ($result) {
				if ($this->input->post()) {
					$array_rules=array(
					array('field'=>'input_nom',
						  'label'=>'nombres',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE ES REQUERIDO.',
							'min_length'=>'EL NOMBRE TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_ap',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO PATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO PATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_am',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO MATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO MATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|valid_email',
						  'errors'=>array(
							'required'=>'EL EMAIL MATERNO ES REQUERIDO.',
							'valid_email'=>'EL EMAIL NO ES VALIDO.')
						),	
					array('field'=>'input_tel_cel',
						  'label'=>'telefono celular',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL TELEFONO/CELULAR ES REQUERIDO.',
							'min_length'=>'EL TELEFONO/CELULAR TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_dir',
						  'label'=>'direccion',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA DIRECCION ES REQUERIDO.',
							'min_length'=>'LA DIRECCION TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_dni',
						  'label'=>'dni',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL DNI ES REQUERIDO.',
							'min_length'=>'EL DNI TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_fn',
						  'label'=>'fecha nacimiento',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE NACIMIENTO ES REQUERIDO.')
						),										
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un estado.")
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'email'=>$this->input->post('input_email'),'tel_cel'=>$this->input->post('input_tel_cel'),'direccion'=>$this->input->post('input_dir'),'dni'=>$this->input->post('input_dni'),'fecha_nac'=>$this->input->post('input_fn'),'estado'=>$this->input->post('estado'));
						$this->Empleado_model->actualizar($id,$form_data);
						$this->session->set_flashdata('msg','El empleado se editado Exitosamente.');
						redirect(base_url().'empleado');		
					}else{
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
						$array_data=array('data_empleado'=>$result);		
						$this->load->view('empleado/editar',$array_data);
						$this->load->view('template/footer');
					}
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
					$array_data=array('data_empleado'=>$result);		
					$this->load->view('empleado/editar',$array_data);
					$this->load->view('template/footer');		
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'empleado');
			}
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Empleado_model->eliminar($id);
			$this->session->set_flashdata('msg','El empleado se borro exitosamente.');
			redirect(base_url().'empleado');			
		}else{
			redirect(base_url());
		}
	}
}