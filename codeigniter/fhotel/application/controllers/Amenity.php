<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenity extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Amenities_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name_am'=>$this->input->post('nom_am'));
				$this->Amenities_model->add($data);
				echo 'Se agrego';
			}else{
				$array_data=array(
				'content'=>'admin/amenities/create');
				$this->load->view('admin/templates/main',$array_data);
			}
		}else{
			$array_data=array(
				'content'=>'admin/amenities/create');
			$this->load->view('admin/templates/main',$array_data);
		}
	}
}
