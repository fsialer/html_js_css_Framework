<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Authors_model');
		$this->load->model('Dropdown_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$page=4;
			$config=array('base_url'=>base_url().'admin/authors/',
				'total_rows'=>$this->Authors_model->total_authors(), 'per_page'=>$page,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$authors=$this->Authors_model->list_authors($config['per_page'],$this->uri->segment(3));
			$data_template=array('title'=>'Listado de Autores',
			'content'=>'admin/authors/index',
			'Authors'=>$authors);			
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'no tienes permisos';
		}
		
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
				if ($this->form_validation->run()==true) {
					$data=array('name'=>$this->input->post('name'),
						'country_id'=>$this->input->post("country"));
					$this->Authors_model->insert($data);
					$this->session->set_flashdata(array('msg'=>'El Autor <strong>'.$this->input->post('name').'</strong> se registro con exito!.',
						'alert'=>'alert alert-success',
						'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url().'admin/authors');
				}else{
					$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
					$data_template=array('title'=>'Crear Autor',
					'content'=>'admin/authors/create',
					'list_country'=>$list_country);			
					$this->load->view('admin/template/main',$data_template);
				}
			}else{
				$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
				$data_template=array('title'=>'Crear Autor',
				'content'=>'admin/authors/create',
				'list_country'=>$list_country);			
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
					$data=array('name'=>$this->input->post('name'),
						'country_id'=>$this->input->post("country"));
					$this->Authors_model->update_author($id,$data);
					$this->session->set_flashdata(array('msg'=>'El Autor <strong>'.$this->input->post('name').'</strong> se edito con exito!.',
						'alert'=>'alert alert-warning',
						'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
					redirect(base_url().'admin/authors');
				}else{			
					$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');	
					$author=$this->Authors_model->show_author($id);
					$data_template=array('title'=>'Editar Autor',
					'content'=>'admin/authors/edit',
					'Author'=>$author,
					'list_country'=>$list_country);			
					$this->load->view('admin/template/main',$data_template);
				}
			}else{
				$list_country=$this->Dropdown_model->fill_dropdown('countries','id,name');
				$author=$this->Authors_model->show_author($id);
				$data_template=array('title'=>'Editar Autor',
				'content'=>'admin/authors/edit',
				'Author'=>$author,
				'list_country'=>$list_country);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			echo 'no Tieenes permisos';
		}
		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Authors_model->delete_author($id);
			$this->session->set_flashdata(array('msg'=>'El Autor se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
			redirect(base_url().'admin/authors');
		}else{
			echo 'No tienes permisos';
		}
		
	}

}