<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function listado($pagina,$segmento){
		$this->db->select("libros.id,tematicas.nombre as nom_tem,libros.nombre,CONCAT(autores.nombres,' ',autores.apellido_paterno,' ',autores.apellido_materno) as dato_autor,editoriales.nombre as nom_edito,libros.num_pag,libros.stock,libros.fecha_pub,libros.ubicacion,libros.estado");
		$this->db->join('tematicas','libros.id_tematica=tematicas.id','inner');
		$this->db->join('editoriales','libros.id_editorial=editoriales.id','inner');
		$this->db->join('detalle_libros_autores','libros.id=detalle_libros_autores.id_libro','inner');
		$this->db->join('autores','detalle_libros_autores.id_autor=autores.id','inner');		
		$query=$this->db->get('libros',$pagina,$segmento);
		$result=$query->result();
		return $result;
	}

	public function total_libros(){           
        return $this->db->count_all_results('libros');
   }

   public function insertar($data){
   		$query=$this->db->insert('libros',$data);
		return $query;
   }

   public function insertar_libro_autor($data){
   		$query=$this->db->insert('detalle_libros_autores',$data);
		return $query;
   }

   public function listar_mayor_id(){
   		$this->db->select_max('id');
		$query=$this->db->get('libros');
		$result=$query->row();
		return $result;
	}

	public function obtener_libro($id){
		$this->db->where(array('id'=>$id,'detalle_libros_autores.id_libro'=>$id));
		$this->db->join('detalle_libros_autores','libros.id=detalle_libros_autores.id_libro','inner');
		$query=$this->db->get('libros');
		$result=$query->row();
		return $result;
	}

	public function actualizar($id,$data){
		$this->db->where(array('id'=>$id));
   		$result=$this->db->update('libros',$data);
   		return $result;
	}

	public function actualizar_libro_autor($id,$data){
		$this->db->where(array('id_libro'=>$id));
   		$result=$this->db->update('detalle_libros_autores',$data);
   		return $result;
	}

	public function eliminar($id){
		$this->db->where(array('id'=>$id));
   		$query=$this->db->delete('libros');
   		return $query;
	}

	public function eliminar_libro_autor($id){
		$this->db->where(array('id_libro'=>$id));
   		$query=$this->db->delete('detalle_libros_autores');
   		return $query;
	}

	public function buscar_libro($data){
		$this->db->select("libros.id as id_libro,tematicas.nombre as nom_temat,libros.id_tematica,libros.nombre as nom_libro, CONCAT(autores.nombres,' ',autores.apellido_paterno,' ',autores.apellido_materno) as datos_autor,libros.stock");
		if ($data['id_tematica']==0) {
			$this->db->having(array('nom_libro like'=>"%".$data['nom_libro']."%",'datos_autor like'=>'%'.$data['datos_autor'].'%'));
		}else{
			$this->db->having(array('libros.id_tematica'=>$data['id_tematica'],'nom_libro like'=>"%".$data['nom_libro']."%",'datos_autor like'=>'%'.$data['datos_autor'].'%'));
		}	
		$this->db->join('tematicas','libros.id_tematica=tematicas.id','inner');
		$this->db->join('detalle_libros_autores','libros.id=detalle_libros_autores.id_libro','inner');
		$this->db->join('autores','detalle_libros_autores.id_autor=autores.id','inner');	
		$query=$this->db->get('libros');
		$result=$query->result();
		return $result;
	}

	public function disminuir_libro($id){         
         $this->db->set('stock', 'stock-1',false);
         $this->db->where(array('id'=>$id));
         $query=$this->db->update('libros');
         return $query;
     }

     public function aumentar_libro($id){         
         $this->db->set('stock', 'stock+1',false);
         $this->db->where(array('id'=>$id));
         $query=$this->db->update('libros');
         return $query;
     }

     public function actualizar_stock($id,$data){
     	$this->db->set('stock', 'stock+'.$data['ingreso'],false);
         $this->db->where(array('id'=>$id));
         $query=$this->db->update('libros');
         return $query;
     }

      public function insertar_abastecer_libro($data){
   		$query=$this->db->insert('detalle_abastecer_libro',$data);
		return $query;
   }
}