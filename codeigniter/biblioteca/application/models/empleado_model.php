<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$query=$this->db->get('empleados',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_empleados(){           
        return $this->db->count_all_results('empleados');
   }

   public function insertar($data){
   	$query=$this->db->insert('empleados',$data);
		return $query;
   }
   
   public function obtener_empleado($id){
   	$this->db->where(array('id'=>$id));
		$query=$this->db->get('empleados');
		$result=$query->row();
		return $result;
   } 

   public function actualizar($id,$data){
   	$this->db->where(array('id'=>$id));
   	$result=$this->db->update('empleados',$data);
   	return $result;
   }

   public function eliminar($id){
   	$this->db->where(array('id'=>$id));
   	$result=$this->db->delete('empleados');
   	return $result;
   }

}