<?php
class persona{
	//atributos
	public $nombre=array();
	public $apellido=array();
	//metodos
	public function guardar($nombre,$apellido){
		$this->nombre[]=$nombre;
		$this->apellido[]=$apellido;
	}
	public function mostrar(){
		for ($i=0; $i <count($this->nombre) ; $i++) { 
		self::formato($this->nombre[$i],$this->apellido[$i]);

		}
	}
	public 	function formato($nombre,$apellido){
		echo "nombre: ".$nombre." Apellido: ".$apellido;
	}
}
$persona=new persona();
$persona->guardar("Fernando", "sialer");
$persona->guardar("Julio", "Sanchez");
$persona->mostrar();
