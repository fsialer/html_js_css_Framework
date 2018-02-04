<?php
class Migration_Add_authors extends CI_Migration{
	
	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE,
				'auto_increment'=>TRUE),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>80,
				'unique'=>TRUE),			
			'country_id'=>array(
				'type'=>'int',
				'unsigned'=>TRUE,
				'constraint'=>5
				),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (country_id) REFERENCES countries(id) on delete cascade',
			
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);		
		$this->dbforge->create_table('authors',FALSE,$attributes);

	}

	public function down(){
		$this->dbforge->drop_table('authors');
	}

}