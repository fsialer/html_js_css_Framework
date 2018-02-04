<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Publishers_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_publishers($pag,$seg){
		$this->db->select('publishers.id,publishers.name,publishers.country_id,countries.name as country_name');
		$this->db->join('countries','publishers.country_id=countries.id','inner join');
		$this->db->order_by('publishers.id','DESC');
		$query=$this->db->get('publishers',$pag,$seg);
		$publishers=$query->result();
		return $publishers;
		
	}

	public function insert($data){
		$this->db->insert('publishers',$data);
	}

	public function show_publisher($id){
		$this->db->where('id',$id);
		$query=$this->db->get('publishers');
		$publisher=$query->row();
		return $publisher;
	}

	public function total_publisher(){
		return $this->db->count_all_results('publishers');
	}

	public function update_publisher($id,$data){
		$this->db->where('id',$id);
		$this->db->update('publishers',$data);
	}
	public function delete_publisher($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('publishers');
   		
   }
}