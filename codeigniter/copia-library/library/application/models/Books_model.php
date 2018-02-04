<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function list_books($pag,$seg){
		$this->db->select('books.id,books.name,books.thematic_id,thematics.name as thematic_name,books.publisher_id,publishers.name as publisher_name,books.stock,books.location,books.state');
		$this->db->join('publishers','books.publisher_id=publishers.id','inner join');
		$this->db->join('thematics','books.thematic_id=thematics.id','inner join');
		$this->db->order_by('books.id','DESC');
		$query=$this->db->get('books',$pag,$seg);
		$books=$query->result();
		return $books;
	}

	public function list_books_authors($data){
		/*=======================*/
		$authors=[];
		foreach ($data as $book) {
			$this->db->select('books_authors.id,books_authors.author_id,books_authors.book_id,authors.name');
			$this->db->where('book_id',$book->id);
			$this->db->join('authors','books_authors.author_id=authors.id','inner join');
			$query=$this->db->get('books_authors');
			$result2=$query->result();
			array_push($authors,$result2);			
		}
		
		return $authors;
	}

	public function insert($data){
		$this->db->insert('books',$data);
	}

	public function update_book($id,$data){
		$this->db->where('id',$id);
		$this->db->update('books',$data);		
	}

	public function update_book_author($id,$data){
		$this->db->where('book_id',$id);
		$query=$this->db->get('books_authors');
		$result=$query->result();		
		$i=0;
		foreach ($result as $book_author) {
			$this->db->where('id',$book_author->id);
			$this->db->set('author_id',$data[$i]);
			$this->db->update('books_authors');			
			$i++;			
		}
	}

	public function insert_book_author($data){
		$this->db->order_by('id','DESC');
		$query=$this->db->get('books');
		$book=$query->row();
		foreach ($data as $author) {
			$array_data=array('book_id'=>$book->id,'author_id'=>$author);
			$this->db->insert('books_authors',$array_data);
		}		
	}

	public function insert_repository($data){
		$this->db->order_by('id','DESC');
		$query=$this->db->get('books');
		$book=$query->row();
		$data['book_id']=$book->id;
		$this->db->insert('repositories',$data);
	}
	
	public function total_books(){
		return $this->db->count_all_results('books');
	}
	public function total_books_active(){
		$this->db->where(array('state'=>'active'));
		return $this->db->count_all_results('books');
	}
	public function total_books_inactive(){
		$this->db->where(array('state'=>'inactive'));
		return $this->db->count_all_results('books');
	}

	public function show_book($id){
		$this->db->having('id',$id);
		$this->db->select('books.id,books.name,books.thematic_id,books.publisher_id,books.stock,books.num_page,books.publication,books.location,books.state');
		$this->db->join('publishers','books.publisher_id=publishers.id','inner join');
		$this->db->join('thematics','books.thematic_id=thematics.id','inner join');
		$query=$this->db->get('books');
		$result=$query->row();
		return $result;		
	}

	public function show_book_authors($id){
		$this->db->where('book_id',$id);
		$query=$this->db->get('books_authors');
		$result=$query->result();
		$authors=[];
		foreach ($result as $book_author) {
			array_push($authors,$book_author->author_id);
		}
		return $authors;
	}

	public function delete_book($id){
		$this->db->where(array('id'=>$id));
   		return $this->db->delete('books');
	}

	public function show_books($data=null){
		$this->db->select('books.id,books.name,books.thematic_id,thematics.name as thematic_name,books.publisher_id,publishers.name as publisher_name,books.stock,books.location,books.state');
		$this->db->having($data);
		$this->db->join('publishers','books.publisher_id=publishers.id','inner join');
		$this->db->join('thematics','books.thematic_id=thematics.id','inner join');
		$this->db->order_by('books.id','DESC');
		$query=$this->db->get('books');
		$books=$query->result();
		return $books;
	}

	public function show_books_authors($data){
		$authors=[];
		foreach ($data as $book) {
			$this->db->select('books_authors.id,books_authors.author_id,books_authors.book_id,authors.name');
			$this->db->where('book_id',$book->id);
			$this->db->join('authors','books_authors.author_id=authors.id','inner join');
			$query=$this->db->get('books_authors');
			$result2=$query->result();
			array_push($authors,$result2);			
		}
		
		return $authors;
	}

	public function summary_books($data){
		$books=[];
		foreach ($data as $book_id) {
		$this->db->having('id',$book_id);
		$this->db->select('books.id,books.name,books.thematic_id,books.publisher_id,books.stock,books.num_page,books.publication,books.location,books.state,thematics.name as thematic_name');
		$this->db->join('publishers','books.publisher_id=publishers.id','inner join');
		$this->db->join('thematics','books.thematic_id=thematics.id','inner join');
		$query=$this->db->get('books');
		$book=$query->row();
		array_push($books,$book);
		}
		return $books;
	}

	public function summary_books_authors($data){
		$authors=[];		
		foreach ($data as $book) {
			$this->db->select('books_authors.id,books_authors.author_id,books_authors.book_id,authors.name');
			$this->db->where('book_id',$book->id);
			$this->db->join('authors','books_authors.author_id=authors.id','inner join');
			$query=$this->db->get('books_authors');
			$book_author=$query->result();			
			array_push($authors,$book_author);
			
		}
		return $authors;
	}

	public function update_book_decrease($data){
		foreach ($data as $book_id) {		
			$this->db->set('stock','stock-1',false);
			$this->db->where(array('id'=>$book_id));
			$this->db->update('books');
		}
	}

	public function update_book_add($id){
		$this->db->where(array('id'=>$id));
		$this->db->set('stock','stock+1',false);
		$this->db->update('books');
	}



	
}