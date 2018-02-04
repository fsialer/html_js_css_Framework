<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_room extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Dropdown_model');
		$this->load->model('Typesrooms_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('name_tr'=>$this->input->post('nom_tiph'),'description_tr'=>$this->input->post('descrip_tiph'),'maxcap_tr'=>$this->input->post('capmax_tiph'),'amenities'=>$this->input->post('amenidades'),'rooms'=>$this->input->post('habitaciones'));
				$this->Typesrooms_model->add($data);
				echo 'Se agrego';
			}else{
				$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am');
				$list_rooms=$this->Dropdown_model->fill_dropdown('rooms','id,num_r',array('assignment_r'=>'Inactivo'));
				$array_data=array(
				'content'=>'admin/types_rooms/create',
				'list_amenities'=>$list_amenities,
				'list_rooms'=>$list_rooms);
				$this->load->view('admin/templates/main',$array_data);
			}
			
		}else{
			$list_amenities=$this->Dropdown_model->fill_dropdown('amenities','id,name_am');
			$list_rooms=$this->Dropdown_model->fill_dropdown('rooms','id,num_r',array('assignment_r'=>'Inactivo'));
			$array_data=array(
				'content'=>'admin/types_rooms/create',
				'list_amenities'=>$list_amenities,
				'list_rooms'=>$list_rooms);
			$this->load->view('admin/templates/main',$array_data);
		}
	}

	
}
