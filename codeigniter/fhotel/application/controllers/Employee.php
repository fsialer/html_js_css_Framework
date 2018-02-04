<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Employees_model');
		$this->load->model('Dropdown_model');
	}

	public function create(){
		if ($this->input->post()) {
			if ($this->form_validation->run()==true) {
				$data=array('position_id'=>$this->input->post('cargo'),'name_emp'=>$this->input->post('nom_emp'),'surname_emp'=>$this->input->post('ape_emp'),'address_emp'=>$this->input->post('dir_emp'),'phone_emp'=>$this->input->post('telf_emp'),'email_emp'=>$this->input->post('email_emp'),'dni_emp'=>$this->input->post('dni_emp'));
				$this->Employees_model->add($data);
				echo 'Se agrego';
			}else{
				$list_position=$this->Dropdown_model->fill_dropdown('positions','id,name_pos');
				$array_data=array(
				'content'=>'admin/employees/create',
				'list_position'=>$list_position);
				$this->load->view('admin/templates/main',$array_data);
			}
		}else{
			$list_position=$this->Dropdown_model->fill_dropdown('positions','id,name_pos');
			$array_data=array(
				'content'=>'admin/employees/create',
				'list_position'=>$list_position);
			$this->load->view('admin/templates/main',$array_data);
		}
	}
}
