<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Plans_model');
		
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
			$config=array('base_url'=>base_url().'admin/plans/',
				'total_rows'=>$this->Plans_model->total_plans(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$plans=$this->Plans_model->list_plans($config['per_page'],$this->uri->segment(3));
			$data_template=array('title'=>'Listado de Planes',
			'content'=>'admin/plans/index',
			'Plans'=>$plans);			
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('type'=>$this->input->post('plan'),
						'price'=>$this->input->post('price'));
					$this->Plans_model->insert($data);
					$this->session->set_flashdata(array('msg'=>'El Plan se registro con exito!.',
						'alert'=>'alert alert-success',
						'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url().'admin/plans');
				}else{
					$data_template=array('title'=>'Crear Plan',
					'content'=>'admin/plans/create');			
					$this->load->view('admin/template/main',$data_template);	
				}
			}else{
				$data_template=array('title'=>'Crear Plan',
				'content'=>'admin/plans/create');			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			echo 'no tienes permisos';
		}
	}

	public function edit($id){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('type'=>$this->input->post('plan'),
						'price'=>$this->input->post('price'));
					$this->Plans_model->update_plan($id,$data);
					$this->session->set_flashdata(array('msg'=>'El Plan se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/plans');
				}else{
					$plan=$this->Plans_model->show_plan($id);
					$data_template=array('title'=>'Editar Plan',
					'content'=>'admin/plans/edit',
					'Plan'=>$plan);			
					$this->load->view('admin/template/main',$data_template);
				}
			}else{
				$plan=$this->Plans_model->show_plan($id);
				$data_template=array('title'=>'Editar Plan',
				'content'=>'admin/plans/edit',
				'Plan'=>$plan);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			echo 'no tienes permisos';
		}
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Plans_model->delete_plan($id);
		$this->session->set_flashdata(array('msg'=>'El Plan se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/plans');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}