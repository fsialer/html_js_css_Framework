<?php

/**
* 
*/
class Migration_Add_thematics extends CI_Migration
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE
				),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',			
			));
		$attribute=array('ENGINE'=>'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('thematics',FALSE,$attribute);
	}

	public function down(){
		$this->dbforge->drop_table('thematics');
	}
}