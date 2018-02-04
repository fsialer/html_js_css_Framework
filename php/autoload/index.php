<?php
function autoload($clase){
	include "clases/".$clase.".php";
}

spl_autoload_register('autoload');

persona::mostrar("hola mundo");
auto::mostrar("hola mundo");