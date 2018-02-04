<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Countries_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
		$config=array('base_url'=>base_url().'admin/countries/',
				'total_rows'=>$this->Countries_model->total_countries(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
		);
		$this->pagination->initialize($config);
		$countries=$this->Countries_model->list_countries($config['per_page'],$this->uri->segment(3));
		$data_template=array('title'=>'Listado de Paises',
			'content'=>'admin/countries/index',
			'Countries'=>$countries);			
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
				$this->Countries_model->insert($data);
				$this->session->set_flashdata(array('msg'=>'El País <strong>'.$this->input->post('name').'</strong> se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/countries');
			}else{
				$data_template=array('title'=>'Crear País',
				'content'=>'admin/countries/create');			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$data_template=array('title'=>'Crear País',
				'content'=>'admin/countries/create');			
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
				$this->Countries_model->update_country($id,$data);
				$this->session->set_flashdata(array('msg'=>'El País <strong>'.$this->input->post('name').'</strong> se edito con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/countries');
			}else{				
				$country=$this->Countries_model->show_country($id);
				$data_template=array('title'=>'Editar Usuario',
				'content'=>'admin/countries/edit',
				'Country'=>$country);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$country=$this->Countries_model->show_country($id);
			$data_template=array('title'=>'Editar País',
			'content'=>'admin/countries/edit',
			'Country'=>$country);			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Countries_model->delete_country($id);
		$this->session->set_flashdata(array('msg'=>'El País se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/countries');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}