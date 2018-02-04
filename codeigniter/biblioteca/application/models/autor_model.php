<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public function listado($pagina,$segmento){
      $this->db->select('autores.id as id_autor,autores.nombres,autores.apellido_paterno,autores.apellido_materno,autores.id_nacion,nacionalidades.pais,nacionalidades.nombre');
      $this->db->join('nacionalidades','autores.id_nacion=nacionalidades.id','inner');
		$query=$this->db->get('autores',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_autores(){           
      return $this->db->count_all_results('autores');
   }
   public function insertar($data){
   		$query=$this->db->insert('autores',$data);
		return $query;
   }

   public function obtener_autor($id){
   	$this->db->where(array('id'=>$id));
		$query=$this->db->get('autores');
		$result=$query->row();
		return $result;
   } 

   public function actualizar($id,$data){
   	$this->db->where(array('id'=>$id));
   	$result=$this->db->update('autores',$data);
   	return $result;
   }

    public function eliminar($id){
   		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('autores');
   		return $result;
   }

   public function lista_autores(){
      $query=$this->db->get('autores');
      $result=$query->result();
      return $result;
   }
}