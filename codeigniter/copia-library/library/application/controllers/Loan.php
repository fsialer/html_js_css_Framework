<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Loans_model');
		$this->load->model('Books_model');
	}

	public function index(){
		if ($this->session->userdata('auth')) {
			$pagina=4;
			$config=array('base_url'=>base_url().'admin/countries/',
				'total_rows'=>$this->Loans_model->total_loans(), 'per_page'=>$pagina,'uri_segment'=>3,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$loans=$this->Loans_model->list_loans($config['per_page'],$this->uri->segment(3));
			$data_template=array('title'=>'Listado de Prestamos',
			'content'=>'admin/loans/index',
			'Loans'=>$loans);			
			$this->load->view('admin/template/main',$data_template);
		}else{
			echo 'No tienes permisos';
		}
	}

	//Falta aumentar el stock para poder devolverlo
	public function give($id){
		if ($this->session->userdata('auth')) {
			$loan=$this->Loans_model->show_loan($id);
			$data=array('book_id'=>$loan->book_id,'user_id'=>$loan->user_id,'state'=>'delivered');
			$this->Loans_model->update_loan($data);
			$this->Books_model->update_book_add($loan->book_id);
			$this->session->set_flashdata(array('msg'=>'El libro <strong>'.$loan->name.'</strong> se entrego con exito!.',
						'alert'=>'alert alert-warning',
						'btn_close'=>"<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"));
			redirect(base_url().'admin/loans');
		}else{
			echo 'No tienes permisos';
		}
	}
}