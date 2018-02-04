<?php

/**
* 
*/
class Migration_Add_books_authors extends CI_Migration
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
			'book_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'on delete'=>'cascade'),
			'author_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'on delete'=>'cascade'),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (book_id) REFERENCES books(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (author_id) REFERENCES authors(id) on delete cascade'
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('books_authors',FALSE,$attributes);
	}
	public function down(){
		$this->dbforge->drop_table('books_authors');
	}
}