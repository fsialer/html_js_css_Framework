<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Codigofacilito extends CI_Controller{
	function __construct(){
		parent::__construct();

	}
	function index(){
		$this->load->library('menu',array('Inicio','Contacto','Curso'));
		$data['mi_menu']=$this->menu->construirMenu();
		$this->load->view('codigofacilito/header');
		$this->load->view('codigofacilito/bienvenido',$data);
	}
	function holaMundo(){
		$this->load->view('codigofacilito/header');
		$this->load->view('codigofacilito/bienvenido');
	}

	function sendMail(){
		$this->load->library('menu',array('Inicio','Contacto','Curso'));
		$configuraciones['mailtype']='html';
		
		$this->email->initialize($configuraciones);
		$this->load->library('email');
		$this->email->from('ejemplo@codigofacilito.com','Fernando');
		$this->email->to('projectdxv@gmail.com');
		$this->email->cc('otrocoreo@gmail.com');
		$this->email->subject('	Probando CodeIgniter');
		$this->email->message('<p>Probando <Strong>Probando</Strong></p>');
		if ($this->email->send()) {
		
			$this->load->view('codigofacilito/header');
		}else{
			echo $this->email->print_debugger();
			
		}
	}
}