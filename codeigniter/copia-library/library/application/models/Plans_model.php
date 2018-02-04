<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Plans_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function list_plans($pag,$seg){
		$query=$this->db->get('plans',$pag,$seg);
		$plans=$query->result();
		return $plans;

	}
	
	public function insert($data){
		$this->db->insert('plans',$data);
	}
	public function total_plans(){
		return $this->db->count_all_results('plans');
	}
	public function show_plan($id){
		$this->db->where('id',$id);
		$query=$this->db->get('plans');
		$country=$query->row();
		return $country;
	}

	public function update_plan($id,$data){
		$this->db->where('id',$id);
		$this->db->update('plans',$data);
	}

	public function delete_plan($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('plans');
   		
   }
}