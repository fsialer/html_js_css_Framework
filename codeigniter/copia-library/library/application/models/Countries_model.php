<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Countries_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_countries($pag,$seg){
		$this->db->order_by('id','DESC');
		$query=$this->db->get('countries',$pag,$seg);
		$countries=$query->result();
		return $countries;
	}

	public function insert($data){
		$this->db->insert('countries',$data);
	}

	public function show_country($id){
		$this->db->where('id',$id);
		$query=$this->db->get('countries');
		$country=$query->row();
		return $country;
	}

	public function total_countries(){
		return $this->db->count_all_results('countries');
	}

	public function update_country($id,$data){
		$this->db->where('id',$id);
		$this->db->update('countries',$data);
	}
	public function delete_country($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('countries');
   		
   }
}