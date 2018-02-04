<?php

$nombre=$_POST['nombre'];
echo $nombre;
setcookie('nombre',$nombre,time()+4800);