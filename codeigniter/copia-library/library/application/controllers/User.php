<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {	
			
			if ($this->input->post()) {
				$this->session->set_userdata('search',$this->input->post('search'));
			}
			
			
			$pagina=4;
			$config=array('base_url'=>base_url().'admin/users/',
				'total_rows'=>$this->Users_model->total_users($this->session->userdata('search')), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$users=$this->Users_model->list_users($config['per_page'],$this->uri->segment(3),$this->session->userdata('search'));
			$data_template=array('title'=>'Listado de Usuarios',
			'content'=>'admin/users/index',
			'Users'=>$users);			
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name'=>$this->input->post('name'),
					'surname'=>$this->input->post('surname'),
					'address'=>$this->input->post('address'),
					'email'=>$this->input->post('email'),
					'password'=>do_hash($this->input->post('password')),
					'type'=>$this->input->post('type'));
				$this->Users_model->insert($data);
				$this->session->set_flashdata(array('msg'=>'El usuario <strong>'.$this->input->post('name').' '.$this->input->post('surname').'</strong> se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/users');
			}else{
				$data_template=array('title'=>'Crear Usuario',
				'content'=>'admin/users/create');			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$data_template=array('title'=>'Crear Usuario',
			'content'=>'admin/users/create');			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}
		
		
		
		
	}

	public function edit($id){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name'=>$this->input->post('name'),
					'surname'=>$this->input->post('surname'),
					'address'=>$this->input->post('address'),
					'email'=>$this->input->post('email'),
					'password'=>do_hash($this->input->post('password')),
					'type'=>$this->input->post('type'));
				$this->Users_model->update_user($id,$data);
				$this->session->set_flashdata(array('msg'=>'El usuario <strong>'.$this->input->post('name').' '.$this->input->post('surname').'</strong> se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/users');
			}else{				
				$user=$this->Users_model->show_user($id);
				$data_template=array('title'=>'Editar Usuario',
				'content'=>'admin/users/edit',
				'User'=>$user);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$user=$this->Users_model->show_user($id);
			$data_template=array('title'=>'Editar Usuario',
			'content'=>'admin/users/edit',
			'User'=>$user);			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Users_model->delete_user($id);
		$this->session->set_flashdata(array('msg'=>'El usuario se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/users');
		}else{
			echo 'No tienes permisos';
		}
		
	}


	public function login(){
		if (!$this->session->userdata('auth')) {
			if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('email'=>$this->input->post('email'),'password'=>do_hash($this->input->post('password')),'type'=>'admin');
				$user=$this->Users_model->auth($data);				
				if ($user) {
					$this->session->set_userdata('auth',array('name'=>$user->name.' '.$user->surname,'type'=>$user->type,'id'=>$user->id));					
					redirect(base_url().'admin');
				}else{
					$this->session->set_flashdata(array('msg'=>'El email <strong>'.$this->input->post('email').'</strong> no se logro autenticar.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					$data_template=array('title'=>'Iniciar Sesión',
					'content'=>'admin/users/login',
					'link_auth'=>'');		
					$this->load->view('front/template/main',$data_template);
				}
			}else{
				$data_template=array('title'=>'Iniciar Sesión',
				'content'=>'admin/users/login',
				'link_auth'=>'');		
				$this->load->view('front/template/main',$data_template);
			}
			

		}else{
			$data_template=array('title'=>'Iniciar Sesión',
				'content'=>'admin/users/login',
				'link_auth'=>'');		
			$this->load->view('front/template/main',$data_template);
		}
	
		}else{
			echo 'Si kieres acceder cierra sesion';
		}
			
	}

	public function logout(){
		if ($this->session->userdata('auth')) {
			$this->session->sess_destroy();
			redirect(base_url().'admin/auth/login');
		}else{
			echo 'no tienes permiso';
		}
	}

	public function change(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('password'=>do_hash($this->input->post('new_pass')));
					$this->Users_model->update_pass($this->uri->segment(4),$data);
					$this->session->set_flashdata(array('msg'=>'Se cambio la contraseña de forma exitosa',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url().'admin');
				}else{
				$data_template=array('title'=>'Cambiar Contraseña',
				'content'=>'admin/users/change');		
				$this->load->view('admin/template/main',$data_template);
				}
				
			}else{
				$data_template=array('title'=>'Cambiar Contraseña',
				'content'=>'admin/users/change');		
			$this->load->view('admin/template/main',$data_template);
			}
			
		}else{
			echo 'no tienes permiso';
		}
		
	}

	public function check_pass(){
		$data=array('id'=>$this->uri->segment(4),'password'=>do_hash($this->input->post('old_pass')));
		$user=$this->Users_model->user_pass($data);
		if ($user) {
			return true;
		}else{
			return false;
		}		
	}

	

}