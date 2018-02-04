<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Authors_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_authors($pag,$seg){
		$this->db->select('authors.id,authors.name,authors.country_id,countries.name as country_name');
		
		$this->db->join('countries','authors.country_id=countries.id','inner');
		$this->db->order_by('authors.id','DESC');
		$query=$this->db->get('authors',$pag,$seg);
		$authors=$query->result();
		return $authors;
		
	}

	public function insert($data){
		$this->db->insert('authors',$data);
	}

	public function show_author($id){
		$this->db->where('id',$id);
		$query=$this->db->get('authors');
		$author=$query->row();
		return $author;
	}

	public function total_authors(){
		
		return $this->db->count_all_results('authors');
	}

	public function update_author($id,$data){
		$this->db->where('id',$id);
		$this->db->update('authors',$data);
	}
	public function delete_author($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('authors');
   		
   }
}