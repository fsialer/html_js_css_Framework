<?php namespace Config;
 class session_expired{

 	private $tiempo;
 	private $hora;

 	public function __construct(){
 		$fecha_antigua=$_SESSION["ultimoingreso"];
		$this->hora=date("Y-n-j H:i:s");

		$this->tiempo=((strtotime($this->hora)+1)-strtotime($fecha_antigua));
		$operacion=60*1;
		echo $this->tiempo;
		
 	}

 	public function set($atributo,$contenido){
 		$this->$atributo=$contenido;
 	}

 	public function get($atributo){
 		return $this->$atributo;
 	}


 	public function comprobar(){
 		if ($this->tiempo>=60) {
			
			session_destroy();
			header("location:".URL);
		}else{
			echo 'fallo';
			$_SESSION['ultimoingreso']=$this->hora;
		}
 	}
 }