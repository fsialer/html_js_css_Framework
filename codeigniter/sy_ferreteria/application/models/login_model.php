<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{


	public function __construct(){
		parent::__construct();
	}

	public function login($array_login){
		$this->db->where(array('nick'=>$array_login['input_usuario']));
		$query=$this->db->get('usuarios');
		$result=$query->row();
		return $result;
	}

}