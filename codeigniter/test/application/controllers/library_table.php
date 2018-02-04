<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_table extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('loginUsuario_model');
	}

	public function index(){
		$this->load->library('table');

$data = array(
        array('Name', 'Color', 'Size'),
        array('Fred', 'Blue', 'Small'),
        array('Mary', 'Red', 'Large'),
        array('John', 'Green', 'Medium')
);

echo $this->table->generate($data);

/*======================================================*/

$this->table->set_heading(array('Name', 'Color', 'Size'));

$this->table->add_row(array('Fred', 'Blue', 'Small'));
$this->table->add_row(array('Mary', 'Red', 'Large'));
$this->table->add_row(array('John', 'Green', 'Medium'));
echo $this->table->generate();

/*======================================================*/
$list = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve');

$new_list = $this->table->make_columns($list, 3);

echo $this->table->generate($new_list);

/*======================================================*/


	}

}
