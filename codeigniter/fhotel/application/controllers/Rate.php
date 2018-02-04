
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rates_model');
		$this->load->model('Dropdown_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('typeroom_id'=>$this->input->post('tip_hab'),'name_rate'=>$this->input->post('nom_ta'),'price_rate'=>$this->input->post('prec_ta'));
				$this->Rates_model->add($data);
				echo 'Se agrego';
			}else{
				$list_tr=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr');
				$array_data=array(
				'content'=>'admin/rates/create',
				'list_tr'=>$list_tr);
				$this->load->view('admin/templates/main',$array_data);
			}
		}else{
			$list_tr=$this->Dropdown_model->fill_dropdown('types_rooms','id,name_tr');
			$array_data=array(
				'content'=>'admin/rates/create',
				'list_tr'=>$list_tr);
			$this->load->view('admin/templates/main',$array_data);
		}
	}
}
