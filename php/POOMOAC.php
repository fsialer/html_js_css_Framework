<?php
class facebook{
	public $nombre;
	public $edad;
	private $pass;

	public function __construct($nombre,$edad,$pass){
		$this->nombre=$nombre;
		$this->edad=$edad;
		$this->pass=$pass;

	}

	public function verInformacion(){
		echo "Nombre: ".$this->nombre."<br>";
		echo "Edad: ".$this->edad."<br>";
		echo "pass:".$this->pass."";
	}
	private function cambiarPass($pass){
		$this->pass=$pass;
	}
}

$fb=new facebook("Fernando sialer", 20,"1234");
$fb->verInformacion();