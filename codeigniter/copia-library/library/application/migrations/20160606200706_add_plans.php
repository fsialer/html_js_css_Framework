<?php


class Migration_Add_plans extends CI_Migration
{
	
	public function __construct(){
		parent::__construct();
	}

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE),
			'type'=>array(
				'type'=>'enum',
				'constraint'=>array('monthly','annual'),
				'default'=>'annual'
				),
			'price'=>array(
				'type'=>'double',
				'unsigned'=>TRUE),		
			"create_at timestamp default current_timestamp",
			"update_at timestamp default current_timestamp on update NOW()"
			));
		$attribute=array('ENGINE'=>'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('plans',FALSE,$attribute);
	}

	public function down(){
		$this->dbforge->drop_table('plans');
	}
}