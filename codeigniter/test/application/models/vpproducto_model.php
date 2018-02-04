<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class vpProducto_model extends CI_Model{

 	public function __construct(){
 		parent::__construct();

 	}
	public function listar($pagina,$segmento){
		
		$query=$this->db->get('productos',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}
	public function total_productos(){           
        return $this->db->count_all_results('productos');
   	}

   	public function agregar($data){
   		$query=$this->db->insert('productos',$data);
   		return $query;
   	}

   	public function obtener_producto($id){
   		$this->db->where(array('id'=>$id));
   		$query=$this->db->get('productos');
		$result=$query->row();
		return $result;
   	}

   	public function actualizar($id,$data){
   		$this->db->where(array('id'=>$id));
   		$query=$this->db->update('productos',$data);
   		return $query;
   	}

   	public function eliminar($id){
   		$this->db->where(array('id'=>$id));
   		$result=$this->db->delete('productos');
   		return $result;
   	}

      public function aumentar_stock($id,$data){         
         $this->db->set('stock', 'stock+'.$data['stock'],false);
         $this->db->where(array('id'=>$id));
         $query=$this->db->update('productos');
         return $query;
      }

      public function buscar_producto($nom){
       
         $this->db->like('articulo', $nom);
         $query=$this->db->get('productos');
         $result=$query->result();
          return $result;
      }



 }