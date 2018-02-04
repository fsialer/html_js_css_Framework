<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tematica_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){		
		$query=$this->db->get('tematicas',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function total_tematicas(){           
      return $this->db->count_all_results('tematicas');
   	}

   	public function insertar($data){
   		$query=$this->db->insert('tematicas',$data);
		return $query;
   }

    public function obtener_tematica($id){
   	$this->db->where(array('id'=>$id));
		$query=$this->db->get('tematicas');
		$result=$query->row();
		return $result;
   } 

   public function actualizar($id,$data){
		$this->db->where(array('id'=>$id));
	   	$query=$this->db->update('tematicas',$data);
	   	if ($query) {
	         return true;
	     }else{
	         return false;
	      }
	}

	public function eliminar($id){
		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('tematicas');
   		if ($query) {
	        return true;
	    }else{
	        return false;
	     }
	}

	public function lista_tematicas(){
      $query=$this->db->get('tematicas');
      $result=$query->result();
      return $result;
   }
}