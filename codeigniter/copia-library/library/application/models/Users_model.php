<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function list_users($pag,$seg,$search=null){
		$this->db->order_by('id','DESC');
		if (!empty($search)) {
			$this->db->like('users.name',$search);
		}
		$query=$this->db->get('users',$pag,$seg);
		$users=$query->result();
		return $users;
	}

	public function insert($data){
		$this->db->insert('users',$data);
	}

	public function show_user($id){
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		$user=$query->row();
		return $user;
	}

	public function total_users($search=null){
		if (!empty($search)) {
			$this->db->like('users.name',$search);
		}
		return $this->db->count_all_results('users');
	}
	public function total_users_admin($search=null){
		$this->db->where(array('type'=>'admin'));
		return $this->db->count_all_results('users');
	}
	public function total_users_member($search=null){
		$this->db->where(array('type'=>'member'));
		return $this->db->count_all_results('users');
	}

	public function update_user($id,$data){
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	public function delete_user($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('users');   		
   }

   public function auth($data){
   		if ($data['type']=='member') {
   			$this->db->select('users.id,users.name,users.surname,users.type ,subscriptions.plan_id,plans.type as plan_type,users.email,users.password');
   			$this->db->having($data);
   			$this->db->join('subscriptions','users.id=subscriptions.user_id','inner');
   			$this->db->join('plans','subscriptions.plan_id=plans.id','inner');
   		}else{
   			$this->db->where($data);
   		}   		
   		$query=$this->db->get('users');
   		$user=$query->row();
   		return $user;
   }

   public function user_pass($data){
   		$this->db->where($data);
		$query=$this->db->get('users');
		$user=$query->row();
		return $user;
   }

   public function update_pass($id,$data){
   		$this->db->where('id',$id);
		$this->db->update('users',$data);
   }
}