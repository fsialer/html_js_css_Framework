<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscripcion_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$this->db->select("suscripciones.id as id_suscripciones, CONCAT(lectores.nombres,' ',lectores.apellido_paterno,' ',apellido_materno) as datos,id_persona,suscripciones.fecha_ini,fecha_fin");
		$this->db->join('lectores','suscripciones.id_persona=lectores.id','inner');
		$query=$this->db->get('suscripciones',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_suscripciones(){           
        return $this->db->count_all_results('suscripciones');
   	}
   	public function insertar($data){
	   	$query=$this->db->insert('suscripciones',$data);
	   	if ($query) {
	   		return true;
	   	}else{
			return false;
	   	}
   }

   public function obtener_suscripcion($id){
   		$this->db->select("suscripciones.id as id_suscripciones, CONCAT(lectores.nombres,' ',lectores.apellido_paterno,' ',apellido_materno) as datos, id_persona,fecha_ini,fecha_fin");
   		$this->db->join('lectores','suscripciones.id_persona=lectores.id','inner');
   		$this->db->having(array('id'=>$id));
		$query=$this->db->get('suscripciones');
		$result=$query->row();
		return $result;
	}

	public function actualizar($id,$data){
		$this->db->where(array('id'=>$id));
	   	$query=$this->db->update('suscripciones',$data);
	   	if ($query) {
	         return true;
	     }else{
	         return false;
	      }
	}

	public function eliminar($id){
		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('suscripciones');
   		if ($query) {
	        return true;
	    }else{
	        return false;
	     }
	}

}