<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Loans_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_loans($pag,$seg){
		$this->db->select("loans.id,books.name,CONCAT(users.name,' ',users.surname) as user_name,loans.place,loans.state,loans.create_at,DATE_ADD(loans.create_at, INTERVAL 2 WEEK) as due_date");
		$this->db->having('loans.state','due');		
		$this->db->join('books','loans.book_id=books.id','inner');
		$this->db->join('users','loans.user_id=users.id','inner');
		$this->db->order_by('loans.id','DESC');
		$query=$this->db->get('loans',$pag,$seg);
		$authors=$query->result();
		return $authors;
	}

	public function insert($data){
		$i=0;
		foreach ($data['book_id'] as $book_id) {
			$data2=array('book_id'=>$book_id,'user_id'=>$data['user_id'],'place'=>$data['place'][$i],'state'=>$data['state']);
			$this->db->insert('loans',$data2);
			$i++;
		}
		
	}
	public function total_loans(){
		return $this->db->count_all_results('loans');
	}
	public function total_loans_active(){
		$this->db->where(array('state'=>'due'));
		return $this->db->count_all_results('loans');
	}

	public function verify_loans($id,$data){
		$data_loans=[];
		foreach ($data as $book_id) {
			$this->db->select('loans.id,books.name,thematics.name as thematic_name,DATE_ADD(loans.create_at, INTERVAL 2 WEEK) as due_date');
			$this->db->where(array('loans.user_id'=>$id,'loans.book_id'=>$book_id,'loans.state'=>'due'));
			$this->db->or_where(array('now() >='=>'due_date'));
			$this->db->join('books','loans.book_id=books.id','inner');
			$this->db->join('thematics','books.thematic_id=thematics.id','inner');
			$query=$this->db->get('loans');
			$loan2=$query->row();
			if (count($loan2)>0) {
				array_push($data_loans, $loan2);
			}			
		}
		return $data_loans;
	}

	public function update_loan($data){
		$this->db->where(array('book_id'=>$data['book_id'],'user_id'=>$data['user_id']));
		$data2=array('state'=>$data['state']);
		$this->db->update('loans',$data2);
	}

	public function show_loan($id){
		$this->db->where('loans.id',$id);
		$this->db->join('books','loans.book_id=books.id','inner');
		$query=$this->db->get('loans');
		$loan=$query->row();
		return $loan;
	}
}