<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Typesrooms_model');
	}

	public function index(){
		$array_data=array(
				'content'=>'front/index',
				'opcion'=>0
				);
			$this->load->view('front/templates/main',$array_data);
	}
	public function reservations(){
		if ($this->input->post()) {
			
		}else{
			$types_rooms='';
			$array_data=array(
				'content'=>'front/types_rooms/index',
				'opcion'=>1,
						
				);
			
			$this->load->view('front/templates/main',$array_data);
		}
		
	}

	public function availables(){
		if ($this->form_validation->run()==true) {
			$data=array('f_llegada'=>$this->input->post('f_llegada'),'f_salida'=>$this->input->post('f_salida'));
			var_dump($data);
			$types_rooms=$this->Typesrooms_model->available_typeroom($data);
			$array_data=array(
				'types_rooms'=>$types_rooms			
				);		
			$this->load->view('front/types_rooms/availables',$array_data);
		}
			
		
		
	}
 



	
}
