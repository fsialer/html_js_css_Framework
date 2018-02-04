<?php namespace Controllers;
use Models\Seccion as Seccion;

class seccionesController{
	private $seccion;

	public function __construct(){
		$this->seccion=new Seccion();

	}
	public function index(){
		$datos=$this->seccion->listar();
		return $datos;
	}
	public function agregar(){
		if ($_POST) {
			$this->seccion->set("nombre",$_POST['nombre']);
			$this->seccion->add();
			header("location:".URL."secciones");
		}
	}
	public function editar($id){
		if (!$_POST) {
			$this->seccion->set('id',$id);
			$datos=$this->seccion->listarID();
			return $datos;
		}else{
			$this->seccion->set("id",$id);
			$this->seccion->set("nombre",$_POST['nombre']);
			$this->seccion->update();
			header("location:".URL."secciones");

		}
		

	}
	public function eliminar($id){

		$this->seccion->set('id',$id);
		$datos=$this->seccion->delete();
		header("location:".URL."secciones");
		
	}

}