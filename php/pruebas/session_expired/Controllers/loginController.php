<?php namespace Controllers;
use Models\Login as Login;

class loginController{

	private $login;
	private $session_expired;
	public function __construct(){

		$this->login=new Login();
		
	}
	public function index(){
		
		if ($_POST) {			
			$this->login->set("nombre",$_POST['nombre']);
			$this->login->set("clave",$_POST['clave']);

			$result=$this->login->logear();
			if ($result>0) {				
				foreach ($result as $login) {
				$_SESSION['nombre']=$login->nombre;
				$_SESSION['clave']=$login->clave;
				}
				return $result;
			}else{
				header("location:".URL);
			}

			
			
			
		}
		
		
		
	}

	

	public function editar(){

	}

	public function logout(){
		session_start();
		session_destroy();
		header("location:".URL);
	}
}