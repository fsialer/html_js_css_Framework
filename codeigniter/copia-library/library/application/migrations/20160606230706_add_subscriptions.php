<?php


class Migration_Add_subscriptions extends CI_Migration
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
			'user_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE
				),
			'plan_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned'=>TRUE
				),
			'create_at timestamp default current_timestamp',
			'update_at timestamp default current_timestamp on update NOW()',
			'CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id) on delete cascade',
			'CONSTRAINT FOREIGN KEY (plan_id) REFERENCES plans(id) on delete cascade'
			));
		$attribute=array('ENGINE'=>'InnoDB');
		$this->dbforge->add_key('id',TRUE);

		$this->dbforge->create_table('subscriptions',FALSE,$attribute);
	}

	public function down(){
		$this->dbforge->drop_table('subscriptions');
	}
}