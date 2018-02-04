<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class vpVenta extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('vpProducto_model');
	}

	public function index(){
		$this->load->helper('navegador');
		$this->load->view("venta_producto/template/header");
		$result=$this->vpProducto_model->buscar_producto("");
		$array_data=array("mi_menu"=>array(array('opcion'=>'Ventas','url'=>base_url().'vpventa')),
			"lista_producto"=>$result);
		
		if ($this->input->post()) {
			# code...
		}else{
			$this->load->view("venta_producto/venta/index",$array_data);
		}

		$this->load->view("venta_producto/template/footer");
	}


	public function agregar_articulos(){

	}

}