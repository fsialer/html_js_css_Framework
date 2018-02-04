<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('encrypt');
		$this->load->helper('menu');
	}

	public function index(){
		if ($this->session->userdata('sesion')) {
			$data_menu=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					)
			);

			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$this->load->view('templates/index',$data_menu);
			$this->load->view('templates/footer');
		}else{
			if ($this->input->post()) {
				$data_login=array('input_usuario'=>$this->input->post('input_usuario'),
					'input_clave'=>$this->input->post('input_clave'));
				$result=$this->Login_model->login($data_login);
				if ($result){
					if (strcmp($this->input->post('input_clave'),$this->encrypt->decode($result->clave))== 0) {
						$data_session=array('usuario'=>$result->nick);
						$this->session->set_userdata('sesion',$data_session);
						redirect(base_url());
					}else{
						echo 'clave invalida';
					}					
				}else{
					echo 'usuario inesxistente';
				}
			}else{
				$this->load->view('templates/header');
				$this->load->view('login/index');
			}
		}
		
	}

	public function logout(){
		$this->session->unset_userdata('sesion');
		redirect(base_url());
	}
}