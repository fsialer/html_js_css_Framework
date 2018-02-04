<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$query=$this->db->get('usuarios',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_usuarios(){           
      return $this->db->count_all_results('usuarios');
   }

   public function insertar($data){
   	$query=$this->db->insert('usuarios',$data);
	  return $query;
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

   public function login($data){
      $this->db->where(array('username'=>$data['username'],'pwd'=>$data['pwd']));
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }

   public function login_lector($data){
      $this->db->select('usuarios.username,usuarios.pwd,usuarios.id as id_us,lectores.id as id_lector,lectores.nombres,lectores.apellido_paterno,lectores.apellido_materno');
      $this->db->join('lectores','usuarios.id=lectores.id_usuario','inner');
      $this->db->where(array('usuarios.username'=>$data['username'],'usuarios.pwd'=>$data['pwd']));
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }
   public function listar_mayor_id(){
      $this->db->select_max('id');
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }

   public function obtener_username($data){      
      $this->db->where(array('username'=>$data['username']));
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }

}