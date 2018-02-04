<?php
$this->load->view('front/templates/partials/header');
if ($opcion!=1) {
	$this->load->view('front/templates/partials/carousel');
}
$this->load->view($content);
$this->load->view('front/templates/partials/footer');