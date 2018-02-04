<?php namespace Models;

class Estudiante{
	private $id;
	private $nombre;
	private $edad;
	private $promedio;
	private $imagen;
	private $id_seccion;
	private $fecha;
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

	public function add(){
		$sql="INSERT INTO estudiantes (nombre,edad,promedio,imagen,id_seccion,fecha) VALUES (:nombre,:edad,:promedio,:imagen,:id_seccion,:fecha)";
		$arrayInsert=array(
			"nombre"=>$this->nombre,
			"edad"=>$this->edad,
			"promedio"=>$this->promedio,
			"imagen"=>$this->imagen,
			"id_seccion"=>$this->id_seccion,
			"fecha"=>$this->fecha
			);
		$this->con->insert_update_delete($sql,$arrayInsert);

	}
	public function update(){
		$sql="UPDATE estudiantes SET nombre=:nombre,edad=:edad,promedio=:promedio WHERE id=:id";
		$arrayUpdate=array(
			"nombre"=>$this->nombre,
			"edad"=>$this->edad,
			"promedio"=>$this->promedio,			
			"id"=>$this->id
			);
		$this->con->insert_update_delete($sql,$arrayUpdate);
	}

	public function delete(){
		$sql="DELETE FROM estudiantes WHERE id=:id";
		$arrayDelete=array("id"=>$this->id);
		$this->con->insert_update_delete($sql,$arrayDelete);
	}

	public function listar(){
		$sql="SELECT t1.*,t2.nombre as seccion_nombre from estudiantes t1 inner join secciones t2 on t1.id_seccion=t2.id";
		$result=$this->con->select($sql);
		return $result;
	}

	public function listarID(){
		$sql="SELECT t1.*,t2.nombre as seccion_nombre,t2.id as seccion_id from estudiantes t1 inner join secciones t2 on t1.id_seccion=t2.id WHERE t1.id=:id";
		$arraySelect=array("id"=>$this->id);
		$result=$this->con->select2($sql,$arraySelect);
		return $result;
	}

}