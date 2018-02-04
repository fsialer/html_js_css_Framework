<?php

function hacer_resguardo($path,$etapa){
  $host=$_COOKIE[host];
  $usuario=$_COOKIE[postgres];
  $password=$_COOKIE[postgres];
  $nombre_bd=$_COOKIE[bdaula];
  $archivo ="bdaula.bak";
  $comando =  "pg_dump -U ".$usuario." -d ".$nombre_bd." > ".$archivo;
  print "$comando";
  $salida=shell_exec($comando);
  echo $salida;
  if ($salida){
    $jr_error=error_get_last();
    cartel("Error tipo: ".$jr_error['type']. " Mensaje: ".$jr_error['message']." Archivo: ".$jr_error['file']. " Linea: ".$jr_error['line']);
  }
  }
?>
