<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lector_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$query=$this->db->get('lectores',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_personas(){           
      return $this->db->count_all_results('lectores');
   }
   public function insertar($data){
   	$query=$this->db->insert('lectores',$data);
		return $query;
   }
   public function obtener_persona($id){
      $this->db->select('lectores.id ,lectores.nombres,lectores.apellido_paterno,lectores.apellido_materno,lectores.fecha_reg,lectores.email,lectores.direccion,lectores.tel_cel,lectores.dni,lectores.id_usuario,usuarios.username,lectores.estado');
   	$this->db->having(array('lectores.id'=>$id));
      $this->db->join('usuarios','lectores.id_usuario=usuarios.id','inner');
		$query=$this->db->get('lectores');
		$result=$query->row();
		return $result;
   } 
   public function actualizar($id,$data){
   	$this->db->where(array('id'=>$id));
   	$query=$this->db->update('lectores',$data);
   	if ($query) {
         return true;
      }else{
         return false;
      }
   }

   public function actualizar_username($id,$data){
      $this->db->where(array('id'=>$id));
      $query=$this->db->update('usuarios',$data);
      if ($query) {
         return true;
      }else{
         return false;
      }
   }


   public function eliminar($id){
   	$this->db->where(array('id'=>$id));
   	$query=$this->db->delete('lectores');
   	return $query;
   }
   public function eliminar_lector_usuario($id){
      $this->db->where(array('id'=>$id));
      $query=$this->db->delete('usuarios');
      return $query;
   }

   public function buscar_persona($datos){
      $this->db->select("id ,concat(nombres,' ',apellido_paterno,' ',apellido_materno) as datos, estado");
      $this->db->having(array("datos like"=>"%".$datos."%",'estado'=>'INACTIVO'));                  
      $query=$this->db->get('lectores');
      $result=$query->result();
      return $result;      
   }

   public function actualizar_estado($id,$data){
      $this->db->where(array('id'=>$id));
      $query=$this->db->update('lectores',$data);
      if ($query) {
         return true;
      }else{
      return false;
      }
   }

   public function listar_personas(){
      $this->db->where(array('estado'=>'INACTIVO'));
      $query=$this->db->get('lectores');
      $result=$query->result();
      return $result;
   }
   public function verificar_usuario($data){
      $this->db->where(array('username'=>$data['username']));
      $query=$this->db->get('usuarios');
      $result=$query->row();
      return $result;
   }

}