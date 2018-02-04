<?php

class Migration_Add_users extends CI_Migration {

	public function up(){
		$this->dbforge->add_field(array(
			'id'=>array('type'=>'int',
					'constraint'=>11,
					'unsigned'=>TRUE,
					'auto_increment'=>TRUE),
			'name'=>array(
					'type'=>'varchar',
					'constraint'=>80),
			'surname'=>array(
					'type'=>'varchar',
					'constraint'=>80),
			'address'=>array(
					'type'=>'varchar',
					'constraint'=>80),
			'email'=>array(
					'type'=>'varchar',
					'constraint'=>80,
					'unique'=>TRUE),
			'password'=>array(
					'type'=>'varchar',
					'constraint'=>80),
			'type'=>array(
					'type'=>'ENUM',
					'constraint'=>array('admin','member'),
					'default'=>'member'),
			'created_at  timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update NOW()' 
			));
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('users',FALSE,$attributes);
	} 

	public function down(){
		$this->dbforge->drop_table('users');
	}
}