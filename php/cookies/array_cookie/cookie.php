<?php
$persona=array("fernando","sialer","24","chiclayo","abcd");
setcookie("micookie[nombre]",$persona[0],time()+3600);
setcookie("micookie[apellido]",$persona[1],time()+3600);
setcookie("micookie[edad]",$persona[2],time()+3600);
setcookie("micookie[ciudad]",$persona[3],time()+3600);
setcookie("micookie[clave]",$persona[4],time()+3600);
echo "<br/>El nombre es: ".$_COOKIE['micookie']['nombre'];
echo "<br/>El apellido es: ".$_COOKIE['micookie']['apellido'];
echo "<br/>La edad es: ".$_COOKIE['micookie']['edad'];
echo "<br/>La ciudad es: ".$_COOKIE['micookie']['ciudad'];
echo "<br/>La clave es: ".$_COOKIE['micookie']['clave'];