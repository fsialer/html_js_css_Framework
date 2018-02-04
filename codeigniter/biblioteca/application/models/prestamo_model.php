<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){

		$this->db->select('prestamos.id as id_prestamo,libros.id as id_lib,libros.nombre,lectores.nombres,lectores.apellido_paterno,lectores.apellido_materno,prestamos.fecha_prestamo,prestamos.estado as pre_estado');
		$this->db->having(array('prestamos.estado'=>'DEUDA'));
		$this->db->join('lectores','prestamos.id_lector=lectores.id','inner');
     	$this->db->join('libros','prestamos.id_libro=libros.id','inner');
		$query=$this->db->get('prestamos',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function insertar($data){
		$query=$this->db->insert('prestamos',$data);
		return $query;
	}

	public function total_prestamos(){           
      return $this->db->count_all_results('prestamos');
   }

   public function verificar_prestamo($data){
   	$this->db->where(array('id_libro'=>$data['id_libro'],'id_lector'=>$data['id_lector']));
   	$query=$this->db->get('prestamos',$pagina,$segmento);
	$result=$query->result();
	return $result;
   }

   public function actualizar_estado($id,$data){
   		$this->db->where(array('id'=>$id));
	   	$query=$this->db->update('prestamos',$data);
   }

   public function obtener_prestamo($id){   	
		$this->db->where(array('id'=>$id));		
		$query=$this->db->get('prestamos');
		$result=$query->row();
		return $result;	
   }

   public function detalle_prestamo($id_libro){
   		$this->db->join('libros','prestamos.id_libro=libros.id','inner');
   		$this->db->join('lectores','prestamos.id_lector=lectores.id','inner');
   		$this->db->where(array('id_libro'=>$id_libro,'prestamos.estado'=>'DEUDA'));
   		$query=$this->db->get('prestamos');
		$result=$query->result();
		return $result;
   }

}