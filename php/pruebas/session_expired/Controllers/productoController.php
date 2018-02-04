<?php namespace Controllers;
use Models\Producto as Producto;
use Config\session_expired as session_expired;
 class productoController{
 	private $producto;
 	private $session_expired;
 	public function __construct(){
 		$this->producto=new Producto();
 		$this->session_expired=new session_expired();
 		
 	}

 	public function index(){
 		$result=$this->producto->listar();
		return $result;
 	}

 	public function agregar(){
 		if ($_POST) {
 			
 			if ($this->session_expired->get('tiempo')>=60) {
 				$this->session_expired->comprobar();
 			}else{
 			$this->producto->set("categoria",$_POST['categoria']);
 			$this->producto->set("nombre",$_POST['nombre']);
 			$this->producto->set("stock",$_POST['stock']);
 			$this->producto->set("fecha_ingreso",$_POST['fecha_ingreso']);
 			$this->producto->insertar();
 			header("location:".URL."producto");
 			}
 			
 		}
 		
 	}

 	public function editar($id){
 		if (!$_POST) {
			$this->producto->set('id',$id);
			$result=$this->producto->listarID();
			return $result;
		}else{
			
			if ($this->session_expired->get('tiempo')>=60) {
				$this->session_expired->comprobar();
			}else{
				$this->producto->set("id",$id);
 			$this->producto->set("categoria",$_POST['categoria']);
 			$this->producto->set("nombre",$_POST['nombre']);
 			$this->producto->set("stock",$_POST['stock']);
 			$this->producto->set("fecha_ingreso",$_POST['fecha_ingreso']);
 			$this->producto->actualizar();
 			header("location:".URL."producto");

			}
			
		}
 		

 	}
 	public function eliminar($id){
 		
 		if ($this->session_expired->get('tiempo')>=60) {
 			$this->session_expired->comprobar();
 		}else{
 			$this->producto->set('id',$id);
			$this->producto->borrar();
			header("location:".URL."producto");
 		}
 		
 	}
 }