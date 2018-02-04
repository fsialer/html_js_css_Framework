<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}

	public function list_subscriptions($pag,$seg){
		$this->db->select('subscriptions.id,subscriptions.user_id,users.email,subscriptions.plan_id,plans.type,plans.price');
		$this->db->join('plans','subscriptions.plan_id=plans.id','inner');
		$this->db->join('users','subscriptions.user_id=users.id','inner');
		$this->db->order_by('id','DESC');
		$query=$this->db->get('subscriptions',$pag,$seg);
		$subscriptions=$query->result();
		return $subscriptions;
	}

	public function insert($data){
		$this->db->insert('subscriptions',$data);
	}
	public function total_subscriptions(){
		return $this->db->count_all_results('subscriptions');
	}
	public function show_subscription($id){
		$this->db->where('id',$id);
		$query=$this->db->get('subscriptions');
		$subscription=$query->row();
		return $subscription;
	}

	public function update_subscription($id,$data){
		$this->db->where('id',$id);
		$this->db->update('subscriptions',$data);
	}

	public function delete_subscription($id){
   		$this->db->where(array('id'=>$id));
   		$this->db->delete('subscriptions');   		
   }

   public function verify_subcription($user){
   		if ($user->plan_type=='monthly') {
   			$array_2=array('subscriptions.user_id'=>$user->id,'plans.type'=>$user->plan_type,
   				'subscriptions.create_at <'=>'DATE_ADD(subscriptions.create_at, INTERVAL 1 YEAR)');
   			$this->db->where($array_2);
   			$this->db->join('plans','subscriptions.plan_id=plans.id','inner');
   		}else{
   			$array_2=array('subscriptions.user_id'=>$user->id,'plans.type'=>$user->plan_type,
   				'subscriptions.create_at <'=>'DATE_ADD(subscriptions.create_at, INTERVAL 1 MONTH)');
   			$this->db->where($array_2);
   			$this->db->join('plans','subscriptions.plan_id=plans.id','inner');	
   		}   		
		$query=$this->db->get('subscriptions');
		$subscription=$query->row();
		return $subscription;
   }

	
}