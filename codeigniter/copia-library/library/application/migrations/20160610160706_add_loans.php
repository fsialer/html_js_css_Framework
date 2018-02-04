<?php

/**
* 
*/
class Migration_Add_loans extends CI_Migration
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
			'book_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE
				),
			'user_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE
				),
			'place'=>array(
				'type'=>'enum',
				'constraint'=>array('home','library'),
				'default'=>'library'
				),
			'state'=>array(
				'type'=>'enum',
				'constraint'=>array('delivered','due'),
				'default'=>'due'
				),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (book_id) REFERENCES books(id) on delete cascade'
			));
		$attribute=array('ENGINE'=>'InnoDB');
		$this->dbforge->add_key('id'.TRUE);
		$this->dbforge->create_table('loans',FALSE,$attribute);

	}

	public function down(){
		$this->dbforge->drop_table('loans');

	}

}