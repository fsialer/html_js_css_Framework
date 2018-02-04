<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Thematic extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Thematics_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
		$config=array('base_url'=>base_url().'admin/thematics/',
				'total_rows'=>$this->Thematics_model->total_thematics(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
		);
		$this->pagination->initialize($config);
		$thematics=$this->Thematics_model->list_thematics($config['per_page'],$this->uri->segment(3));
		$data_template=array('title'=>'Listado de Temáticas',
			'content'=>'admin/thematics/index',
			'Thematics'=>$thematics);			
		$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name'=>$this->input->post('name'));
				$this->Thematics_model->insert($data);
				$this->session->set_flashdata(array('msg'=>'La temática <strong>'.$this->input->post('name').'</strong> se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/thematics');
			}else{
				$data_template=array('title'=>'Crear Temática',
				'content'=>'admin/thematics/create');			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$data_template=array('title'=>'Crear Temática',
				'content'=>'admin/thematics/create');			
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
				$data=array('name'=>$this->input->post('name'));
				$this->Thematics_model->update_thematic($id,$data);
				$this->session->set_flashdata(array('msg'=>'La temática <strong>'.$this->input->post('name').'</strong> se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/thematics');
			}else{				
				$thematic=$this->Thematics_model->show_thematic($id);
				$data_template=array('title'=>'Editar Temática',
				'content'=>'admin/thematics/edit',
				'Thematic'=>$thematic);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$thematic=$this->Thematics_model->show_thematic($id);
			$data_template=array('title'=>'Editar Temática',
			'content'=>'admin/thematics/edit',
			'Thematic'=>$thematic);			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Thematics_model->delete_thematic($id);
		$this->session->set_flashdata(array('msg'=>'La temática se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/thematics');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}