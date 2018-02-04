<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('construir_nav'))
{
	function construir_nav($array_menu)
	{
		$ret_menu="<nav><ul>";
		foreach ($array_menu as $options) {		
			if (isset($options['subopcion'])) {
				$ret_menu.="<li>";
				$ret_menu.=$options['opcion'];
				$ret_menu.="<ul class='nav'>";
					foreach ($options['subopcion'] as $subopcion) {
						$ret_menu.="<li><a href=".$subopcion['url'].">".$subopcion['opcion']."</a></li>";
					}
				$ret_menu.="</ul>";
				$ret_menu.="</li>";
			}else{
				$ret_menu.="<li><a href='".$options['url']."'>".$options['opcion']."</a></li>";
			}	
			
		}
		$ret_menu.="</ul></nav>";
		return $ret_menu;
	}
}