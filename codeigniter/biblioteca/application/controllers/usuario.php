<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuario_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {			
			$pagina=10;
			$config=array('base_url'=>base_url().'usuario/',
				'total_rows'=>$this->Usuario_model->total_usuarios(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Usuario_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_usuarios'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("usuario/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("usuario/index",$array_data);
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
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un estado.")
						)
					);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('username'=>$this->input->post('input_username'),'pwd'=>do_hash($this->input->post('input_pwd'),'md5'));
					$this->Usuario_model->insertar($form_data);
					$this->session->set_flashdata('msg','El usuario se agrego Exitosamente.');
					redirect(base_url().'usuario');				
				}else{				 
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$this->load->view('usuario/agregar');
					$this->load->view('template/footer');			
				}
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view('usuario/agregar');
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}		
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Usuario_model->obtener_usuario($id);		
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
					array('field'=>'estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un estado.")
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('username'=>$this->input->post('input_username'),'estado'=>$this->input->post('estado'));
						$this->Usuario_model->actualizar($id,$form_data);
						$this->session->set_flashdata('msg','El usuario se edito Exitosamente.');
						redirect(base_url().'usuario');				
					}else{		
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));	 
						$array_data=array('data_usuario'=>$result);		
						$this->load->view('usuario/editar',$array_data);
						$this->load->view('template/footer');							
					}
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
					$array_data=array('data_usuario'=>$result);		
					$this->load->view('usuario/editar',$array_data);
					$this->load->view('template/footer');					
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'usuario');
			}
		}else{
			redirect(base_url());
		}			
	
}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Usuario_model->eliminar($id);
			$this->session->set_flashdata('msg','El usuario se borro exitosamente.');
			redirect(base_url().'usuario');			
		}else{
			redirect(base_url());
		}		
	}

	public function login(){
		if (!$this->session->userdata('login')) {
			if ($this->input->post()){
				$form_data=array('username'=>$this->input->post('input_username'),'pwd'=>do_hash($this->input->post('input_pwd'),'md5'));
				$result=$this->Usuario_model->login($form_data);
				if ($result) {
					$this->session->set_userdata('login',array('usuario'=>$result->username));
					redirect(base_url());
				}else{
					redirect(base_url().'usuario/login');
				}
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR AL SISTEMA</a>'));
				$this->load->view('usuario/login');
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
		
	}

	public function verificar_usuario($data){
      $this->db->where(array('username'=>$data['username']));
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }


	public function logout(){
		if ($this->session->userdata('login')) {
			$this->session->sess_destroy();
			redirect(base_url());
		}else{
			redirect(base_url());
		}
	}
}