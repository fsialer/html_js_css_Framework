<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Subscriptions_model');
		$this->load->model('Dropdown_model');
		
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
			$config=array('base_url'=>base_url().'admin/subscriptions/',
				'total_rows'=>$this->Subscriptions_model->total_subscriptions(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$subscriptions=$this->Subscriptions_model->list_subscriptions($config['per_page'],$this->uri->segment(3));
			$data_template=array('title'=>'Listado de Suscripciones',
			'content'=>'admin/subscriptions/index',
			'Subscriptions'=>$subscriptions);			
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('user_id'=>$this->input->post('user'),'plan_id'=>$this->input->post('plan'));
					$this->Subscriptions_model->insert($data);
					$this->session->set_flashdata(array('msg'=>'La Suscripción se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/subscriptions');
				}else{
					$list_users=$this->Dropdown_model->fill_dropdown('users','id,email',array('type'=>'member'));
					$list_plans=$this->Dropdown_model->fill_dropdown('plans','id,type');
					$data_template=array('title'=>'Crear Suscripción',
					'content'=>'admin/subscriptions/create',
					'list_Users'=>$list_users,
					'list_Plans'=>$list_plans);			
					$this->load->view('admin/template/main',$data_template);
				}
			}else{
				$list_users=$this->Dropdown_model->fill_dropdown('users','id,email',array('type'=>'member'));
				$list_plans=$this->Dropdown_model->fill_dropdown('plans','id,type');
				$data_template=array('title'=>'Crear Suscripción',
				'content'=>'admin/subscriptions/create',
				'list_Users'=>$list_users,
				'list_Plans'=>$list_plans);			
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
					$data=array('user_id'=>$this->input->post('user'),'plan_id'=>$this->input->post('plan'));
					$this->Subscriptions_model->update_subscription($id,$data);
					$this->session->set_flashdata(array('msg'=>'La Suscripción se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url().'admin/subscriptions');
				}else{
					$subscription=$this->Subscriptions_model->show_subscription($id);
					$list_users=$this->Dropdown_model->fill_dropdown('users','id,email',array('type'=>'member'));
					$list_plans=$this->Dropdown_model->fill_dropdown('plans','id,type');
					$data_template=array('title'=>'Crear Suscripción',
					'content'=>'admin/subscriptions/edit',
					'list_Users'=>$list_users,
					'list_Plans'=>$list_plans,
					'Subscription'=>$subscription);			
					$this->load->view('admin/template/main',$data_template);
				}
			}else{
				$subscription=$this->Subscriptions_model->show_subscription($id);
				$list_users=$this->Dropdown_model->fill_dropdown('users','id,email',array('type'=>'member'));
				$list_plans=$this->Dropdown_model->fill_dropdown('plans','id,type');
				$data_template=array('title'=>'Crear Suscripción',
				'content'=>'admin/subscriptions/edit',
				'list_Users'=>$list_users,
				'list_Plans'=>$list_plans,
				'Subscription'=>$subscription);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			echo 'No tienes permisos :P';
		}
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
		$this->Subscriptions_model->delete_subscription($id);
		$this->session->set_flashdata(array('msg'=>'La Suscripción se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/subscriptions');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}