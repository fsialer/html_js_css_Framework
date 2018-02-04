<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function listado_provincia($porpagina,$segmento){
		$this->db->select('provincias.id,provincias.id_departamento,departamentos.nombre as departamento,provincias.nombre,provincias.estado');
        $this->db->join('departamentos','provincias.id_departamento=departamentos.id','inner');
		$query=$this->db->get('provincias',$porpagina,$segmento);
        $result=$query->result();
        return $result;
	}
	public function total_provincias(){           
        return $this->db->count_all_results('provincias');
   }

   public function agregar_provincia($array_data){
         $query=$this->db->insert('provincias', $array_data);
         return $query;
   }
   public function obtener_provincia($id){
       $this->db->where(array('id'=>$id));
       $query=$this->db->get('provincias');
       $result=$query->row();
       return $result;
   }
   public function borrar_provincia($id){
        $this->db->where('id', $id);
        $query=$this->db->delete('provincias');
        return $query;   
   }
   public function actualizar_provincia($id,$array_data){
        $this->db->where(array('id'=>$id));
        $query=$this->db->update('provincias', $array_data);
        return $query;
   }
   public function listar_provincias($id){
          $this->db->order_by('nombre','ASC');
          $this->db->where(array('estado'=>1,'id_departamento'=>$id));
         $query=$this->db->get('provincias');
         $result=$query->result();
         return $result;
        }
}