<?php namespace Models;
class conexion{
	

	private $conn;
	private $datos=array(
		"drive"=>"mysql",
		"host"=>"localhost",
		"port"=>"3306",
		"db"=>"proyecto",
		"user"=>"root"
		);

	
	public function __construct(){
		$cadena=$this->datos["drive"].":host=".$this->datos["host"].";port=".$this->datos["port"].";dbname=".$this->datos["db"];	
		 $this->conn = new \PDO($cadena, $this->datos["user"]);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public function insert_update_delete($sql,$array){
		$stmt=$this->conn->prepare($sql);
		$result = $stmt->execute($array);
		return $result;
	}

	public function select($sql){
		$stmt=$this->conn->prepare($sql);
		$stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
		return $result;
	}

	public function select2($sql,$array){
		$stmt=$this->conn->prepare($sql);
		$stmt->execute($array);
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
		return $result;
	}



}