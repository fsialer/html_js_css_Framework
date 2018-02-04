<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_reservations extends CI_Migration
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE),
			'typeroom_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'date_arrival_re'=>array(
				'type'=>'date'),
			'date_out_res'=>array(
				'type'=>'date'),
			'num_room_res'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'state_res'=>array(
				'type'=>'enum',
				'constraint'=>array('reserved','separate',
					'canceled'),
				'default'=>'separate'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (typeroom_id) REFERENCES types_rooms(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('reservations',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('reservations');
	}
}