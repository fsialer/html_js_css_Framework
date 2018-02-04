<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$query=$this->db->get('editoriales',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function total_editoriales(){           
      return $this->db->count_all_results('editoriales');
   }
   public function insertar($data){
   		$query=$this->db->insert('editoriales',$data);
		return $query;
   }

   public function obtener_editorial($id){
   	$this->db->where(array('id'=>$id));
		$query=$this->db->get('editoriales');
		$result=$query->row();
		return $result;
   } 

   public function actualizar($id,$data){
   	$this->db->where(array('id'=>$id));
   	$result=$this->db->update('editoriales',$data);
   	return $result;
   }

    public function eliminar($id){
   		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('editoriales');
   		return $result;
   }

   public function lista_editoriales(){
      $query=$this->db->get('editoriales');
      $result=$query->result();
      return $result;
   }
}