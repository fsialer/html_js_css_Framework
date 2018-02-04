<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distrito_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function listado_distrito($porpagina,$segmento){
		$this->db->select('distritos.id,distritos.id_provincia,departamentos.nombre as departamento,provincias.nombre as provincia,distritos.nombre,distritos.estado');
		$this->db->join('provincias','distritos.id_provincia=provincias.id','inner');
		$this->db->join('departamentos','provincias.id_departamento=departamentos.id','inner');
		$query=$this->db->get('distritos',$porpagina,$segmento);
        $result=$query->result();
        return $result;
	}
	public function total_distritos(){           
        return $this->db->count_all_results('distritos');
   	}

  	 public function agregar_distrito($array_data){
         $query=$this->db->insert('distritos', $array_data);
         return $query;
   	}
   	public function obtener_distrito($id){
       $this->db->select('distritos.id,distritos.nombre,distritos.estado,distritos.id_provincia,provincias.id_departamento');
       $this->db->join('provincias','distritos.id_provincia=provincias.id','inner');
       $this->db->having(array('id'=>$id));
       $query=$this->db->get('distritos');
       $result=$query->row();
       return $result;
   	}
   	public function borrar_distrito($id){
        $this->db->where('id', $id);
        $query=$this->db->delete('distritos');
        return $query;   
   	}
   	public function actualizar_distrito($id,$array_data){
        $this->db->where(array('id'=>$id));
        $query=$this->db->update('distritos', $array_data);
        return $query;
  	}

}