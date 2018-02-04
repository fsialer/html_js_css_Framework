<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class loginUsuario extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('loginUsuario_model');
		$this->load->library('recaptcha');
	}
	public function index(){
		
		$pagina=3;
		$config=array('base_url'=>base_url().'loginusuario/',
				'total_rows'=>$this->loginUsuario_model->total_usuarios(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
			$this->pagination->initialize($config);
			$result=$this->loginUsuario_model->listar($config['per_page'],$this->uri->segment(2));
		if ($result) {
			$array_data=array('data_usuarios'=>$result);
			$this->load->view("login/usuario/index",$array_data);
		}else{
			echo 'No hay Datos';
		}
	}

	public function agregar(){
		$data['recaptcha_html']=$this->recaptcha->recaptcha_get_html();
		if ($this->input->post()) {
			$this->recaptcha->recaptcha_check_answer();
			$form_data=array('username'=>$this->input->post("input_username"),
				'pass'=>do_hash($this->input->post("input_pass"), 'md5'),
				'email'=>$this->input->post("input_email"),
				'sexo'=>$this->input->post("sexo")				
				);
			$array_rules=array(
					array('field'=>'input_username',
						  'label'=>'username',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL USERNAME ES REQUERIDO.',
							'min_length'=>'EL USERNAME TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'input_pass',
						  'label'=>'pass',
						  'rules'=>'required|min_length[3]|matches[input_rpass]',
						  'errors'=>array(
							'required'=>'EL pass ES REQUERIDO.',
							'min_length'=>'EL pass TIENE QUE SER MAYOR DE 6 CARACTERES.',
							'matches'=>'El pass no coincide.')
						),
					array('field'=>'input_rpass',
						  'label'=>'pass',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL pass ES REQUERIDO.',
							'min_length'=>'EL repass TIENE QUE SER MAYOR DE 6 CARACTERES.')
						),
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|min_length[3]|valid_email',
						  'errors'=>array(
							'required'=>'EL email ES REQUERIDO.',
							'min_length'=>'EL pass TIENE QUE SER MAYOR DE 6 CARACTERES.',
							'valid_email'=>'El email no es valido.')
						),
					array('field'=>'sexo',
						'label'=>'sexo',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un sexo.")
						)
			);

			$this->form_validation->set_rules($array_rules);
			if ($this->form_validation->run()==true && $this->recaptcha->getIsValid()) {
				$this->loginUsuario_model->agregar($form_data);
				$this->session->set_flashdata('msg','El usuario se registro Exitosamente.');
				redirect(base_url().'loginusuario');				
			}else{
				 if(!$this->recaptcha->getIsValid()) {
                         $this->session->set_flashdata('error','captcha incorrecto');
                 } else {
                         $this->session->set_flashdata('error','credentiales incorrectos');
                 }
				$this->load->view("login/usuario/agregarview",$data);			
			}
		}else{
			$this->load->view("login/usuario/agregarview",$data);	
		}
		
	}



	public function login(){
		if ($this->input->post()) {
			$form_data=array('input_username'=>$this->input->post("input_username"),
				'input_pass'=>do_hash($this->input->post("input_pass"), 'md5')			
				);
			$result=$this->loginUsuario_model->login($form_data);
			if ($result) {
				echo 'logeo exitoso.';
			}else{
				echo 'no se pudo logear.';
			}
		}else{
			$this->load->view("login/usuario/loginview");
		}
		
	}

	public function editar(){
		$id=$this->uri->segment(3);
		$result=$this->loginUsuario_model->obtener_usuario($id);
		$array_data=array('data_usuario'=>$result);
		if ($this->input->post()) {
			$form_data=array('username'=>$this->input->post("input_username"),				
				'email'=>$this->input->post("input_email"),
				'sexo'=>$this->input->post("sexo")				
				);
			$array_rules=array(
					array('field'=>'input_username',
						  'label'=>'username',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL USERNAME ES REQUERIDO.',
							'min_length'=>'EL USERNAME TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),					
					array('field'=>'input_email',
						  'label'=>'email',
						  'rules'=>'required|min_length[3]|valid_email',
						  'errors'=>array(
							'required'=>'EL email ES REQUERIDO.',
							'min_length'=>'EL pass TIENE QUE SER MAYOR DE 6 CARACTERES.',
							'valid_email'=>'El email no es valido.')
						),
					array('field'=>'sexo',
						'label'=>'sexo',
						'rules'=>'required',
						'errors'=>array(
							'required'=>"Seleccione un sexo.")
						)
			);
			$this->form_validation->set_rules($array_rules);
			if ($this->form_validation->run()==true) {
				$result2=$this->loginUsuario_model->actualizar($id,$form_data);
				if ($result2) {
					$this->session->set_flashdata('msg','El usuario se actualizo Exitosamente.');
				redirect(base_url().'loginusuario');			
				}else{
					$this->session->set_flashdata('msg','El usuario no se actualizo Exitosamente.');
				redirect(base_url().'loginusuario');		
				}
							
			}else{
				$this->load->view("login/usuario/editarview",$array_data);			
			}
		}else{			
			if ($result) {				
				$this->load->view('login/usuario/editarview',$array_data);
			}else{
				redirect(base_url().'loginusuario');
			}
			
		}
	}

	public function borrar(){
		$id=$this->uri->segment(3);
		$result=$this->loginUsuario_model->eliminar($id);
		if ($result) {
			$this->session->set_flashdata('msg','El usuario se borro exitosamente.');
				redirect(base_url().'loginusuario');		
		}else{
			$this->session->set_flashdata('msg','El usuario no se borro exitosamente.');
				redirect(base_url().'loginusuario');		
		}
	}
}