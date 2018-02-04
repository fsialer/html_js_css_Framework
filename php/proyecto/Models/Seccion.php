<?php namespace Models;

class Seccion{
	private $id;
	private $nombre;

	public function __construct(){
		$this->con=new conexion();

	}

	public function set($atributo,$contenido){
		$this->$atributo=$contenido;
	}
	public function get($atributo){
		return $this->$atributo;
	}

	public function add(){
		$sql="INSERT INTO secciones (nombre) VALUES (:nombre)";
		$arrayInsert=array(
			"nombre"=>$this->nombre			
			);
		$this->con->insert_update_delete($sql,$arrayInsert);
	}

	public function update(){
		$sql="UPDATE secciones SET nombre=:nombre WHERE id=:id";
		$arrayUpdate=array(
			"nombre"=>$this->nombre,
			"id"=>$this->id
			);
		$this->con->insert_update_delete($sql,$arrayUpdate);
	}
	public function delete(){
		$sql="DELETE FROM secciones WHERE id=:id";
		$arrayDelete=array("id"=>$this->id);
		$this->con->insert_update_delete($sql,$arrayDelete);
	}

	public function listar(){
		$sql="SELECT * from secciones";
		$result=$this->con->select($sql);
		return $result;
	}

	public function listarID(){
		$sql="SELECT * from secciones  WHERE id=:id";
		$arraySelect=array("id"=>$this->id);
		$result=$this->con->select2($sql,$arraySelect);
		return $result;
	}
}