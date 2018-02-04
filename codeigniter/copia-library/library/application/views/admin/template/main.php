<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin/template/partials/heading');
echo "<div class='row'></div>";
echo "<div class='wapper'>";
$this->load->view('admin/template/partials/nav');
echo "<section class='col-md-10'>";
$this->load->view($content);
echo "</section>";
echo '</div>';
echo "<div class='row'></div>";
$this->load->view('admin/template/partials/footer');