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
			'name_cli'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'surname_cli'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'dni_cli'=>array(
				'type'=>'varchar',
				'constraint'=>20),
			'phone_cli'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('clients',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('clients');
	}
}