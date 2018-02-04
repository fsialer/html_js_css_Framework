<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('front/template/partials/heading');
echo "<div class='row'></div>";
echo "<section class='col-md-12'>";
$this->load->view($content);
echo '</section>';
echo "<div class='row'></div>";
$this->load->view('front/template/partials/footer');