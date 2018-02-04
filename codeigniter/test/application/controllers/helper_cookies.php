<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Helper_cookies extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper('cookie');
		/*set_cookie('nombre','fernando',5000,'',base_url(),'',true,true);*/
		echo get_cookie('nombre',true) ;
		//delete_cookie('nombre', 'localhost', base_url(), '');
	}
}