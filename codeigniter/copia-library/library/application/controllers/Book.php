<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Books_model');
		$this->load->model('Dropdown_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
		$config=array('base_url'=>base_url().'admin/books/',
				'total_rows'=>$this->Books_model->total_books(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
		);
		$this->pagination->initialize($config);
		$books=$this->Books_model->list_books($config['per_page'],$this->uri->segment(3));
		$authors=$this->Books_model->list_books_authors($books);
		$data_template=array('title'=>'Listado de Libros',
			'content'=>'admin/books/index',
			'Books'=>$books,
			'Authors'=>$authors);			
		$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function create(){
		if ($this->session->userdata('auth')) {
			if ($this->input->post()) {
			if($this->form_validation->run()==true){
				$data=array('name'=>$this->input->post('name'),'thematic_id'=>$this->input->post('thematic'),'publisher_id'=>$this->input->post('publisher'),'num_page'=>$this->input->post('num_page'),'stock'=>$this->input->post('stock'),'publication'=>$this->input->post('publication'),'location'=>$this->input->post('location'),'state'=>'active');
				$this->Books_model->insert($data);
				$data_repostory=array('quantity'=>$this->input->post('stock'),'user_id'=>$this->session->userdata('auth')['id']);
				$this->Books_model->insert_book_author($this->input->post('author'));
				$this->Books_model->insert_repository($data_repostory);
				$this->session->set_flashdata(array('msg'=>'El Libro <strong>'.$this->input->post('name').'</strong> se registro con exito!.',
					'alert'=>'alert alert-success',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/books');
			}else{
				$list_publisher=$this->Dropdown_model->fill_dropdown('publishers','id,name');
				$list_thematic=$this->Dropdown_model->fill_dropdown('thematics','id,name');
				$list_author=$this->Dropdown_model->fill_dropdown('authors','id,name');
				$data_template=array('title'=>'Crear Libro',
				'content'=>'admin/books/create',
				'list_publisher'=>$list_publisher,
				'list_thematic'=>$list_thematic,
				'list_author'=>$list_author);			
				$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$list_publisher=$this->Dropdown_model->fill_dropdown('publishers','id,name');
			$list_thematic=$this->Dropdown_model->fill_dropdown('thematics','id,name');
			$list_author=$this->Dropdown_model->fill_dropdown('authors','id,name');
			$data_template=array('title'=>'Crear Libro',
				'content'=>'admin/books/create',
				'list_publisher'=>$list_publisher,
				'list_thematic'=>$list_thematic,
				'list_author'=>$list_author);			
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
				//var_dump($this->input->post('author'));
				$data=array('name'=>$this->input->post('name'),'thematic_id'=>$this->input->post('thematic'),'publisher_id'=>$this->input->post('publisher'),'num_page'=>$this->input->post('num_page'),'publication'=>$this->input->post('publication'),'location'=>$this->input->post('location'),'state'=>$this->input->post('state'));
				$this->Books_model->update_book($id,$data);
				$this->Books_model->update_book_author($id,$this->input->post('author'));
				$this->session->set_flashdata(array('msg'=>'El Libro <strong>'.$this->input->post('name').'</strong> se editado con exito!.',
					'alert'=>'alert alert-warning',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
				redirect(base_url().'admin/books');
			}else{

			$result=$this->Books_model->show_book($id);
			$result2=$this->Books_model->show_book_authors($id);
			$list_publisher=$this->Dropdown_model->fill_dropdown('publishers','id,name');
			$list_thematic=$this->Dropdown_model->fill_dropdown('thematics','id,name');
			$list_author=$this->Dropdown_model->fill_dropdown('authors','id,name');
			
			$data_template=array('title'=>'Editar Libro',
				'content'=>'admin/books/edit',
				'list_publisher'=>$list_publisher,
				'list_thematic'=>$list_thematic,
				'list_author'=>$list_author,
				'Book'=>$result,
				'Authors'=>$result2);			
			$this->load->view('admin/template/main',$data_template);
			}
		}else{
			$result=$this->Books_model->show_book($id);
			$result2=$this->Books_model->show_book_authors($id);
			$list_publisher=$this->Dropdown_model->fill_dropdown('publishers','id,name');
			$list_thematic=$this->Dropdown_model->fill_dropdown('thematics','id,name');
			$list_author=$this->Dropdown_model->fill_dropdown('authors','id,name');
			$data_template=array('title'=>'Editar Libro',
				'content'=>'admin/books/edit',
				'list_publisher'=>$list_publisher,
				'list_thematic'=>$list_thematic,
				'list_author'=>$list_author,
				'Book'=>$result,
				'Authors'=>$result2);			
			$this->load->view('admin/template/main',$data_template);
		}
		}else{
			echo 'No tienes permisos';
		}
		
	}

	public function delete($id){
		if ($this->session->userdata('auth')) {
			$this->Books_model->delete_book($id);
		$this->session->set_flashdata(array('msg'=>'El Libro se elimino con exito!.',
					'alert'=>'alert alert-danger',
					'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
		redirect(base_url().'admin/books');
		}else{
			echo 'No tienes permisos';
		}
		
	}
}