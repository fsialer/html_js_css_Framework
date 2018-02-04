
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rooms_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('num_r'=>$this->input->post('num_hab'));
				$this->Rooms_model->add($data);
				echo 'Se agrego';
			}else{
				$array_data=array(
				'content'=>'admin/rooms/create');
				$this->load->view('admin/templates/main',$array_data);
			}
		}else{
			$array_data=array(
				'content'=>'admin/rooms/create');
			$this->load->view('admin/templates/main',$array_data);
		}
	}
}
