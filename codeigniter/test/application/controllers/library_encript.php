<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_encript extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		echo 'Se debe activar el $config[encryption_key], en el archivo de config.php, con el valor de YOUR KEY <br> Ejemplo: <br>';
		/*inicializando la libreria de la clase encrypt*/
		$this->load->library('encrypt');
		$this->encrypt->set_mode(MCRYPT_MODE_CFB);
		$msg = 'Este es un mensaje secreto de la libreria encryption_key <br>';
		echo 'Mensaje: '.$msg."<br>";
		$key = 'super-secret-key';//clave de cifrado
		$encrypted_string = $this->encrypt->encode($msg);
		echo '<br>Mensaje encriptado: '.$encrypted_string;
		echo '<br>Mensaje desencriptado: '.$this->encrypt->decode($encrypted_string);

		echo '<br>Mensaje desencriptado: '.$this->encrypt->decode($encrypted_string,$key);

	}
}