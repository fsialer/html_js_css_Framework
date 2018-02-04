<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lector extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Lector_model');
		$this->load->model('Usuario_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {			
			$pagina=10;
			$config=array('base_url'=>base_url().'lector/',
				'total_rows'=>$this->Lector_model->total_personas(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Lector_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_personas'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("lector/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("lector/index",$array_data);
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
					array('field'=>'input_username',
						  'label'=>'username',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL USERNAME ES REQUERIDO.',
							'min_length'=>'EL USERNAME TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_pwd',
						  'label'=>'pass',
						  'rules'=>'required|min_length[3]|matches[input_rpwd]',
						  'errors'=>array(
							'required'=>'LA CONTRASEÑA ES REQUERIDO.',
							'min_length'=>'EL pass TIENE QUE SER MAYOR DE 6 CARACTERES.',
							'matches'=>'LA CONTRASEÑA NO COINCIDEN.')
						),
					array('field'=>'input_rpwd',
						  'label'=>'pass',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA CONTRASEÑA ES REQUERIDO.',
							'min_length'=>'LA CONTRASEÑA TIENE QUE SER MAYOR DE 6 CARACTERES.')
						),
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
					array('field'=>'input_fr',
						  'label'=>'fecha registro',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE REGISTRO ES REQUERIDO.')
						),	
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|valid_email',
						  'errors'=>array(
							'required'=>'EL EMAIL MATERNO ES REQUERIDO.',
							'valid_email'=>'EL EMAIL NO ES VALIDO.')
						),	
					array('field'=>'input_dir',
						  'label'=>'direccion',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA DIRECCION ES REQUERIDO.',
							'min_length'=>'LA DIRECCION TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_tel_cel',
						  'label'=>'telefono celular',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL TELEFONO/CELULAR ES REQUERIDO.',
							'min_length'=>'EL TELEFONO/CELULAR TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_dni',
						  'label'=>'dni',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL DNI ES REQUERIDO.',
							'min_length'=>'EL DNI TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),																	
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"SELECCIONE UN ESTADO.")
						)
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data3=array('username'=>$this->input->post('input_username'));
					$result2=$this->Usuario_model->obtener_username($form_data3);
					if ($result2) {
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
						$this->session->set_flashdata('error','Este usuario ya esta utilizado');
						$this->load->view('lector/agregar');
						$this->load->view('template/footer');
					}else{
						$form_data2=array('username'=>$this->input->post('input_username'),'pwd'=>do_hash($this->input->post('input_pwd'),'md5'));
						$this->Usuario_model->insertar($form_data2);
						$result=$this->Usuario_model->listar_mayor_id();
						$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'email'=>$this->input->post('input_email'),'tel_cel'=>$this->input->post('input_tel_cel'),'direccion'=>$this->input->post('input_dir'),'fecha_reg'=>$this->input->post('input_fr'),'estado'=>$this->input->post('estado'),'id_usuario'=>$result->id,'dni'=>$this->input->post('input_dni'));
						$this->Lector_model->insertar($form_data);
						$this->session->set_flashdata('msg','El lector se agrego Exitosamente.');
						redirect(base_url().'lector');			
					}
						
				}else{				 
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$this->load->view('lector/agregar');
					$this->load->view('template/footer');			
				}
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view('lector/agregar');
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Lector_model->obtener_persona($id);	
			if ($result) {
				if ($this->input->post()) {
					$array_rules=array(
					array('field'=>'input_username',
						  'label'=>'username',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL USERNAME ES REQUERIDO.',
							'min_length'=>'EL USERNAME TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
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
					array('field'=>'input_fr',
						  'label'=>'fecha registro',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE REGISTRO ES REQUERIDO.')
						),	
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|valid_email',
						  'errors'=>array(
							'required'=>'EL EMAIL MATERNO ES REQUERIDO.',
							'valid_email'=>'EL EMAIL NO ES VALIDO.')
						),	
					array('field'=>'input_dir',
						  'label'=>'direccion',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'LA DIRECCION ES REQUERIDO.',
							'min_length'=>'LA DIRECCION TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_tel_cel',
						  'label'=>'telefono celular',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL TELEFONO/CELULAR ES REQUERIDO.',
							'min_length'=>'EL TELEFONO/CELULAR TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),																		
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"SELECCIONE UN ESTADO.")
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$id2=$result->id_usuario;
						$form_data2=array('username'=>$this->input->post('input_username'));
						$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'email'=>$this->input->post('input_email'),'tel_cel'=>$this->input->post('input_tel_cel'),'direccion'=>$this->input->post('input_dir'),'fecha_reg'=>$this->input->post('input_fr'),'estado'=>$this->input->post('estado'),'dni'=>$this->input->post('input_dni'));
						$this->Lector_model->actualizar($id,$form_data);
						$this->Lector_model->actualizar_username($id2,$form_data2);
						$this->session->set_flashdata('msg','El lector se edito Exitosamente.');
						redirect(base_url().'lector');				
					}else{				 
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
						$array_data=array('data_persona'=>$result);		
						$this->load->view('lector/editar',$array_data);
						$this->load->view('template/footer');			
					}
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
					$array_data=array('data_persona'=>$result);		
					$this->load->view('lector/editar',$array_data);
					$this->load->view('template/footer');	
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'lector');
			}
		}else{
			redirect(base_url());
		}
	}
	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Lector_model->obtener_persona($id);
			$id2=$result->id_usuario;	
			$this->Lector_model->eliminar($id);
			$this->Lector_model->eliminar_lector_usuario($id2);			
			$this->session->set_flashdata('msg','El lector se borro exitosamente.');
			redirect(base_url().'lector');			
		}else{
			redirect(base_url());
		}
	}


	public function verificar_usuario(){
		$form_data=array('username'=>$this->input->post('us'));
		
		$result=$this->Usuario_model->obtener_username($form_data);
		if ($result) {
			echo "<span>.</span>";
		}else{
			echo "<span>Puedes usar este usuario.</span>";
		}
	}

}