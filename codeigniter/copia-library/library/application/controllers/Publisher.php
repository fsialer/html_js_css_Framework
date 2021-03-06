<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Publisher extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Publishers_model');
		$this->load->model('Dropdown_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
			$config=array('base_url'=>base_url().'admin/publishers/',
				'total_rows'=>$this->Publishers_model->total_publisher(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
		);
		$this->pagination->initialize($config);
		$publishers=$this->Publishers_model->list_publishers($config['per_page'],$this->uri->segment(3));
		$data_template=array('title'=>'Listado de Editoriales',
			'content'=>'admin/publishers/index',
			'Publishers'=>$publishers);			
		$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
	
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name'=>$this->input->post('name'),'country_id'=>$this->input->post("country"));
				$this->Publishers_model->insert($data);
				$this->session->set_flashdata(array('msg'=>'El Editorial <strong>'.$this->input->post('name').'</strong> se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/publishers');
			}else{
				$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
				$data_template=array('title'=>'Crear Editorial',
				'content'=>'admin/publishers/create',
				'list_country'=>$list_country);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
			$data_template=array('title'=>'Crear Editorial',
				'content'=>'admin/publishers/create',
				'list_country'=>$list_country);			
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
				$data=array('name'=>$this->input->post('name'),'country_id'=>$this->input->post("country"));
				$this->Publishers_model->update_publisher($id,$data);
				$this->session->set_flashdata(array('msg'=>'El Autor <strong>'.$this->input->post('name').'</strong> se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/publishers');
			}else{			
				$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');	
				$publisher=$this->Publishers_model->show_publisher($id);
				$data_template=array('title'=>'Editar Autor',
				'content'=>'admin/publishers/edit',
				'Publisher'=>$publisher,
				'list_country'=>$list_country);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
			$publisher=$this->Publishers_model->show_publisher($id);
			$data_template=array('title'=>'Editar Editorial',
			'content'=>'admin/publishers/edit',
			'Publisher'=>$publisher,
			'list_country'=>$list_country);			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}

		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
		$this->Publishers_model->delete_publisher($id);
		$this->session->set_flashdata(array('msg'=>'El Editorial se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/publishers');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}