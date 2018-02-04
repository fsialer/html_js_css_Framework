<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dropdownEstados_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function agregar($data){
		$query=$this->db->insert('estados',$data);
		return $query;
	}
	public function actualizar($id,$data){
		$this->db->where(array('id'=>$id));
		$query=$this->db->update('estados',$data);
		return $query;
	}
	public function eliminar($id){
		$this->db->where(array('id'=>$id));
		$query=$this->db->delete('estados');
		return $query;
	}

	public function listar($pagina,$segmento){
		$this->db->join("provincias"," estados.id_provincia=provincias.id","inner");
		$this->db->join("regiones","provincias.id_region=regiones.id","inner");
		$this->db->select("regiones.nombre,provincias.provincia,estados.id,estados.distrito,estados.estado");
		$query=$this->db->get('estados',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function total_estados(){
		return $this->db->count_all_results('estados');;
	}

	public function listar_regiones(){
		$query=$this->db->get('regiones');
		$result=$query->result();
		return $result;
	}
	public function listar_provincias($id){

		$this->db->where(array('id_region'=>$id));
		$query=$this->db->get('provincias');
		$result=$query->result();
		return $result;
	}

	public function obtener_estado($id){
       $this->db->where(array('estados.id'=>$id));
       $this->db->join("provincias"," estados.id_provincia=provincias.id","inner");
       $this->db->join("regiones","provincias.id_region=regiones.id","inner");
       $this->db->select("estados.id as estados_id,estados.distrito,estados.estado,estados.id_provincia,provincias.id_region");
       $query=$this->db->get('estados');
       $result=$query->row();
       return $result;
   }

}