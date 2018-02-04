<?php

/**
* 
*/
class Migration_Add_books extends CI_Migration
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
				'auto_increment'=>TRUE
				),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),
			'publisher_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'num_page'=>array(
				'type'=>'int',
				'constraint'=>8,
				'unsigned'=>TRUE),
			'thematic_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE),
			'stock'=>array(
				'type'=>'int',
				'constraint'=>8,
				'unsigned'=>TRUE),
			'publication'=>array(
				'type'=>'date'),
			'location'=>array(
				'type'=>'varchar',
				'constraint'=>80),
			'state'=>array(
				'type'=>'enum',
				'constraint'=>array('active','inactive'),
				'default'=>'Active'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (publisher_id) REFERENCES publishers(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (thematic_id) REFERENCES thematics(id) on delete cascade'		
			));
		$attribute=array('ENGINE'=>'InnoDB');
		$this->dbforge->add_key('id',TRUE);			
		$this->dbforge->create_table('books',FALSE,$attribute);
	}

	public function down(){
		$this->dbforge->drop_table('books');
	}
}