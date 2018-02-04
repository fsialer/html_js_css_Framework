<?php
trait persona2{
	public $nombre;
	public function mostrarNombre(){
		echo $this->nombre;
	}

	abstract function asignarNombre($nombre);


}

trait trabajador{
	protected function mensaje(){
		echo "y soy un trabajador";
	}
}

class persona{
	use persona2,trabajador;
	public function asignarNombre($nombre){
		$this->nombre=self::mensaje().$nombre;
	}
}

$persona=new persona();
$persona->asignarNombre("fernando");
$persona->mostrarNombre();
