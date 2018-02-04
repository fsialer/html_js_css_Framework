<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Helper_arrays extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper('array');
		$array = array(
        'color' => 'red',
        'shape' => 'round',
        'size'  => ''
		);
	echo element('color', $array); // returns "red"
	echo element('size', $array, 'foobar'); // returns "foobar"

	/*==========*/
	$quotes = array(
        "I find that the harder I work, the more luck I seem to have. - Thomas Jefferson",
        "Don't stay in bed, unless you can make money in bed. - George Burns",
        "We didn't lose the game; we just ran out of time. - Vince Lombardi",
        "If everything seems under control, you're not going fast enough. - Mario Andretti",
        "Reality is merely an illusion, albeit a very persistent one. - Albert Einstein",
        "Chance favors the prepared mind - Louis Pasteur"
);
echo "<br>";
echo random_element($quotes);

	}
}