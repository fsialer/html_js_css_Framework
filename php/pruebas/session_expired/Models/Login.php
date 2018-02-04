<?php namespace Models;

class Login{
	private $id;
	private $nombre;
	private $clave;
	private $con;

	public function __construct(){
		$this->con=new conexion();
	}

	public function set($atributo,$contenido){
		$this->$atributo=$contenido;
	}

	public function get($atributo){
		return $this->$atributo;
	}	

	public function logear(){
		$sql="SELECT nombre,clave FROM login WHERE nombre=:nombre and clave=:clave";
		$arraySelect=array(
			'nombre'=>$this->nombre,
			'clave'=>$this->clave);
		$result=$this->con->select2($sql,$arraySelect);
		return $result;
	}



	public function listar(){
		$sql="SELECT * FROM login";
		
		$result=$this->con->select($sql);
		return $result;
	}
}