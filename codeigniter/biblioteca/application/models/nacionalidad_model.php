<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nacionalidad_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){		
		$query=$this->db->get('nacionalidades',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function total_nacionalidades(){           
      return $this->db->count_all_results('nacionalidades');
   	}

   	public function insertar($data){
   		$query=$this->db->insert('nacionalidades',$data);
		return $query;
   }

    public function obtener_nacionalidad($id){
   	$this->db->where(array('id'=>$id));
		$query=$this->db->get('nacionalidades');
		$result=$query->row();
		return $result;
   } 

   public function actualizar($id,$data){
		$this->db->where(array('id'=>$id));
	   	$query=$this->db->update('nacionalidades',$data);
	   	if ($query) {
	         return true;
	     }else{
	         return false;
	      }
	}

	public function eliminar($id){
		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('nacionalidades');
   		if ($query) {
	        return true;
	    }else{
	        return false;
	     }
	}

	public function lista_nacion(){
		$query=$this->db->get('nacionalidades');
		$result=$query->result();
		return $result;
	}
}
