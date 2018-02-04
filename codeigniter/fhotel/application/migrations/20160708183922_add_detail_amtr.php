<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_detail_amtr extends CI_Migration
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
			'amenities_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'typeroom_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (amenities_id) REFERENCES amenities(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (typeroom_id) REFERENCES types_rooms(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('detail_amtr',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('detail_amtr');
	}
}