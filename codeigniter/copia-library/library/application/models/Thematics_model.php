<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Thematics_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_thematics($pag,$seg){
		$this->db->order_by('id','DESC');
		$query=$this->db->get('thematics',$pag,$seg);
		$thematics=$query->result();
		return $thematics;
	}

	public function insert($data){
		$this->db->insert('thematics',$data);
	}

	public function show_thematic($id){
		$this->db->where('id',$id);
		$query=$this->db->get('thematics');
		$thematic=$query->row();
		return $thematic;
	}

	public function total_thematics(){
		return $this->db->count_all_results('thematics');
	}

	public function update_thematic($id,$data){
		$this->db->where('id',$id);
		$this->db->update('thematics',$data);
	}
	public function delete_thematic($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('thematics');
   		
   }
}