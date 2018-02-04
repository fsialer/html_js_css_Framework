<?php namespace Config;
class Autoload{
	public static function run(){
		spl_autoload_register(function($clase){
			$ruta=str_replace('\\', "/", $clase).".php";
			if (is_readable($ruta)) {
				require_once $ruta;
			}else{
				echo "Ruta desconocida";
			}

		});
	}
}
