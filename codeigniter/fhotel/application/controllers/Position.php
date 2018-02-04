<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Positions_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name_pos'=>$this->input->post('nom_carg'));
				$this->Positions_model->add($data);
				echo 'Se agrego';
			}else{
				$array_data=array(
				'content'=>'admin/positions/create');
				$this->load->view('admin/templates/main',$array_data);
			}
		}else{
			$array_data=array(
				'content'=>'admin/positions/create');
			$this->load->view('admin/templates/main',$array_data);
		}
	}
}
