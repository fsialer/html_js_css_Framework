<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Helper_dates extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper('date');
		echo '<strong>zona horaria: TimeStamp</strong>';
		echo now('Australia/Victoria');
		echo '<br>';
		$datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
		$time = time();
		echo mdate($datestring, $time);
		echo '<br>';
		$format = 'DATE_RFC822';
		$time = time();
		echo standard_date($format, $time);
		echo '<br>';
		$gmt = local_to_gmt(time());
		echo $gmt;
		echo '<br>';
		$timestamp = 1140153693;
		$timezone  = 'UM8';
		$daylight_saving = TRUE;
		echo gmt_to_local($timestamp, $timezone, $daylight_saving);
		echo '<br>';
		$unix = mysql_to_unix('20061124092345');
		echo $unix;
		echo '<br>';
		$now = time();
		echo unix_to_human($now); // U.S. time, no seconds
		echo '<br>';
		echo unix_to_human($now, TRUE, 'us'); // U.S. time with seconds
		echo '<br>';
		echo unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
		echo '<br>';
		$now = time();
		$human = unix_to_human($now);
		$unix = human_to_unix($human);
		echo '<br>';
		$bad_date = '199605';
		// Should Produce: 1996-05-01
		$better_date = nice_date($bad_date, 'Y-m-d');
		echo $better_date;
		echo '<br>';
		$bad_date = '9-11-2001';
		// Should Produce: 2001-09-11
		$better_date = nice_date($bad_date, 'Y-m-d');
		echo $better_date;
		echo '<br>';
		$post_date = '1079621429';
		$now = time();
		$units = 2;
		echo timespan($post_date, $now, $units);
		echo '<br>d';
		echo days_in_month(06, 2005);
		echo '<br>';
		$range = date_range('2012-01-01', '2012-01-15');
		echo "First 15 days of 2012:";
		foreach ($range as $date)
		{
        	echo $date."\n"."<br>";
		}
		echo '<br>';
		echo timezones('UM5');
		echo '<br>';
		echo timezone_menu('UM8');
	}
}