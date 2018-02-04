<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Authors_model');
		$this->load->model('Books_model');
		$this->load->model('Countries_model');
		$this->load->model('Publishers_model');
		$this->load->model('Thematics_model');
		$this->load->model('Users_model');	
		$this->load->model('Subscriptions_model');	
		$this->load->model('Dropdown_model');	
		$this->load->model('Loans_model');
	}

	public function index(){
		if ($this->input->post('book_id')) {
			$this->session->set_userdata('books',$this->input->post('book_id'));
			//delete_cookie('books');
			redirect(base_url().'member/auth/login');
		}else{
			$list_thematics=$this->Dropdown_model->fill_dropdown('thematics','id,name');
			$data=array('books.name like'=>'%'.$this->input->post('book').'%',
			'thematic_id'=>$this->input->post('thematic'));
			$books=$this->Books_model->show_books($data);
			$authors=$this->Books_model->show_books_authors($books);
			$data_template=array('title'=>'Principal',
				'content'=>'front/index',
				'list_thematics'=>$list_thematics,
				'Books'=>$books,
				'Authors'=>$authors,
				'link_auth'=>"<h4><a href='".base_url()."admin/auth/login'>Iniciar Sesión</a></h4>"
				);
			$this->load->view('front/template/main',$data_template);
		}
		
	}

	public function admin(){
		if ($this->session->userdata('auth')) {
			$data_template=array('title'=>'DashBoard',
				'content'=>'admin/index',
				'total_authors'=>$this->Authors_model->total_authors(),
				'total_books'=>$this->Books_model->total_books(),
				'total_books_active'=>$this->Books_model->total_books_active(),
				'total_books_inactive'=>$this->Books_model->total_books_inactive(),
				'total_countries'=>$this->Countries_model->total_countries(),
				'total_publishers'=>$this->Publishers_model->total_publisher(),
				'total_thematics'=>$this->Thematics_model->total_thematics(),
				'total_users'=>$this->Users_model->total_users(),
				'total_users_admin'=>$this->Users_model->total_users_admin(),
				'total_users_member'=>$this->Users_model->total_users_member(),
				'total_subscriptions'=>$this->Subscriptions_model->total_subscriptions(),
				'total_loans'=>$this->Loans_model->total_loans(),
				'total_loans_active'=>$this->Loans_model->total_loans_active()

				);
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
	}

	public function login(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('email'=>$this->input->post('email'),'password'=>do_hash($this->input->post('password')),'type'=>'member');
				$user=$this->Users_model->auth($data);
				if ($user) {
					$subcription=$this->Subscriptions_model->verify_subcription($user);
					if ($subcription) {
						$data=$this->session->userdata('books');
						$loans=$this->Loans_model->verify_loans($user->id,$data);		
						if (!$loans){
						$this->session->set_userdata('auth_member',$user->id);
						redirect(base_url().'summary');
						}else{							
							$data_template=array('title'=>'Autenticación',
							'content'=>'front/loans/due',
							'link_auth'=>"",
							'Books'=>$loans);
							$this->load->view('front/template/main',$data_template);
						}
					}else{
						$this->session->set_flashdata(array('msg'=>'El email <strong>'.$this->input->post('email').'</strong> ya expiro su suscripción.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					$data_template=array('title'=>'Autenticación',
					'content'=>'front/member/login',
					'link_auth'=>""
					);
					$this->load->view('front/template/main',$data_template);
					}					
				}else{
					$this->session->set_flashdata(array('msg'=>'El email <strong>'.$this->input->post('email').'</strong> no se logro autenticar.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					$data_template=array('title'=>'Autenticación',
					'content'=>'front/member/login',
					'link_auth'=>""
					);
					$this->load->view('front/template/main',$data_template);

				}
			}else{
				$data_template=array('title'=>'Autenticación',
				'content'=>'front/member/login',
				'link_auth'=>""
				);
				$this->load->view('front/template/main',$data_template);
			}
		}else{
			$data_template=array('title'=>'Autenticación',
				'content'=>'front/member/login',
				'link_auth'=>""
				);
			$this->load->view('front/template/main',$data_template);
		}
	}

	//Falta disminuir su stock al elegr el libro
	public function summary(){
		if ($this->session->userdata('auth_member')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('place'=>$this->input->post('place'),'user_id'=>$this->session->userdata('auth_member'),'state'=>'due','book_id'=>$this->session->userdata('books'));
					$this->Loans_model->insert($data);
					$this->Books_model->update_book_decrease($this->session->userdata('books'));
					$this->session->set_flashdata(array('msg'=>'Recoja su prestamo en la ventanilla.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url());
				}else{
					
					$books=$this->Books_model->summary_books($this->session->userdata('books'));
					$authors=$this->Books_model->summary_books_authors($books);
					$data_template=array('title'=>'Resumen',
					'content'=>'front/loans/summary',
					'link_auth'=>"",
					'Books'=>$books,
					'Authors'=>$authors);
					$this->load->view('front/template/main',$data_template);
				}
			}else{
				$books=$this->Books_model->summary_books($this->session->userdata('books'));
				$authors=$this->Books_model->summary_books_authors($books);
				$data_template=array('title'=>'Resumen',
				'content'=>'front/loans/summary',
				'link_auth'=>"",
				'Books'=>$books,
				'Authors'=>$authors
				);
				$this->load->view('front/template/main',$data_template);
			}
			
		}else{
			echo 'no tiene permitido el acceso';
		}
	}

							


}