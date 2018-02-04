<?php namespace Models;

class Producto{
	private $id;
	private $categoria;
	private $nombre;
	private $stock;
	private $fecha_ingreso;
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


	public function insertar(){
		$sql="INSERT INTO producto (categoria,nombre,stock,fecha_ingreso) VALUES (:categoria,:nombre,:stock,:fecha_ingreso)";
		$arrayInsert=array(
			"categoria"=>$this->categoria,
			"nombre"=>$this->nombre,
			"stock"=>$this->stock,
			"fecha_ingreso"=>$this->fecha_ingreso
			);
		$this->con->insert_update_delete($sql,$arrayInsert);
	}

	public function actualizar(){
		$sql="UPDATE producto SET categoria=:categoria,nombre=:nombre,stock=:stock,fecha_ingreso=:fecha_ingreso WHERE id=:id";
		$arrayUpdate=array(
			"categoria"=>$this->categoria,
			"nombre"=>$this->nombre,
			"stock"=>$this->stock,
			"fecha_ingreso"=>$this->fecha_ingreso,
			"id"=>$this->id
			);
		$this->con->insert_update_delete($sql,$arrayUpdate);
	}

	public function borrar(){
		$sql="DELETE FROM producto WHERE id=:id";
		$arrayDelete=array("id"=>$this->id);
		$this->con->insert_update_delete($sql,$arrayDelete);
	}



	public function listar(){
		$sql="SELECT * FROM producto";		
		$result=$this->con->select($sql);
		return $result;
	}
	public function listarID(){
		$sql="SELECT * from producto WHERE id=:id";
		$arraySelect=array("id"=>$this->id);
		$result=$this->con->select2($sql,$arraySelect);
		return $result;
	}
}