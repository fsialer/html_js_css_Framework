<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Typesrooms_model extends CI_Model{
	
	public function __construct()	{
		parent::__construct();
	}
	public function add($data){
		$_data=array('name_tr'=>$data['name_tr'],'description_tr'=>$data['description_tr'],'maxcap_tr'=>$data['maxcap_tr']);
		$this->db->insert('types_rooms',$_data);
		$id=$this->db->insert_id();
		$__data;
		$___data;
		$id_rooms;
		foreach ($data['amenities'] as $amenity) {
			$__data[]=array('amenities_id'=>$amenity,'typeroom_id'=>$id);
		}
		$this->db->insert_batch('detail_amtr', $__data);
		foreach ($data['rooms'] as $room) {
			$___data[]=array('room_id'=>$room,'typeroom_id'=>$id);
			$this->db->where(array('id'=>$room));
			$estado=array('assignment_r'=>'Activo');
			$this->db->update('rooms',$estado);
		}
		$this->db->insert_batch('detail_rtr', $___data);		
	}

	public function available_typeroom($data){
		$this->db->select("types_rooms.id,types_rooms.name_tr,types_rooms.description_tr,types_rooms.maxcap_tr,rates.name_rate,rates.price_rate,
		IF((select sum(reservations.num_room_res)
		from reservations where reservations.typeroom_id=types_rooms.id and
		reservations.date_arrival_re='".$data['f_llegada']."' and reservations.date_out_res='".$data['f_salida']."') ,
		count(*)-(select sum(reservations.num_room_res) 
		from reservations where reservations.typeroom_id=types_rooms.id and
		reservations.date_arrival_re='".$data['f_llegada']."' and reservations.date_out_res='".$data['f_salida']."') ,
		count(*)) as available_r");
		$this->db->join('detail_rtr','types_rooms.id=detail_rtr.typeroom_id','inner');
		$this->db->join('rates','types_rooms.id=rates.typeroom_id','inner');
		$this->db->where(array('state_rate'=>'Activo'));
		$this->db->group_by('types_rooms.id');
		$this->db->group_by('types_rooms.name_tr');
		$query=$this->db->get('types_rooms');
		$result=$query->result();
		return $result;
	}

	
}