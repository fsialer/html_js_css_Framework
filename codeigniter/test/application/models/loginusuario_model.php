<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginUsuario_model extends CI_Model{

	public function __construct(){

	}

	public function agregar($data){
		$query=$this->db->insert('usuarios',$data);
		return $query;
	}

	public function login($data){
		$this->db->where(array('username'=>$data['input_username'],'pass'=>$data['input_pass']));
		$query=$this->db->get('usuarios');
		$result=$query->row();
		return $result;
	}

	public function listar($pagina,$segmento){
		$query=$this->db->get('usuarios',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_usuarios(){           
        return $this->db->count_all_results('usuarios');
   	}

   	public function obtener_usuario($id){
   		$this->db->where(array('id'=>$id));
		$query=$this->db->get('usuarios');
		$result=$query->row();
		return $result;
   	} 

   	public function actualizar($id,$data){
   		$this->db->where(array('id'=>$id));
   		$result=$this->db->update('usuarios',$data);
   		return $result;
   	}

   	public function eliminar($id){
   		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('usuarios');
   		return $result;
   	}

}