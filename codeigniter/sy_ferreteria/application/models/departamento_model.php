<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function listado_departamento($porpagina,$segmento){
		$query=$this->db->get('departamentos',$porpagina,$segmento);
        $result=$query->result();
        return $result;
	}
	public function total_departamentos(){           
        return $this->db->count_all_results('departamentos');
   }

   public function agregar_departamento($array_data){
         $query=$this->db->insert('departamentos', $array_data);
         return $query;
   }
   public function obtener_departamento($id){
       $this->db->where(array('id'=>$id));
       $query=$this->db->get('departamentos');
       $result=$query->row();
       return $result;
   }
   public function borrar_departamento($id){
        $this->db->where('id', $id);
        $query=$this->db->delete('departamentos');
        return $query;   
   }
   public function actualizar_departamento($id,$array_data){
        $this->db->where(array('id'=>$id));
        $query=$this->db->update('departamentos', $array_data);
        return $query;
   }
   public function listar_departamentos(){
          $this->db->order_by('nombre','ASC');
          $this->db->where('estado',1);
         $query=$this->db->get('departamentos');
         $result=$query->result();
         return $result;
        }
}