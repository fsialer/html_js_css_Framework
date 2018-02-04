<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Helper_directories extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper('download');
		/*$data = 'Here is some text!';
$name = 'mytext.txt';
force_download($name, $data);*/
force_download('/'.base_url().'uploads/lena_comp.jpg', NULL);
	}
}