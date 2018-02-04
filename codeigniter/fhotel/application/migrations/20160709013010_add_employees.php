<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_employees extends CI_Migration
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
			'position_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'name_emp'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'surname_emp'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'address_emp'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'phone_emp'=>array(
				'type'=>'varchar',
				'constraint'=>20),
			'email_emp'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'dni_emp'=>array(
				'type'=>'varchar',
				'constraint'=>20,
				'unique'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (position_id) REFERENCES positions(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('employees',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('employees');
	}
}