<?php


exec("copia.bat", $output);
foreach ($output as $value) {
    print_r($value);
}
header("location:../index.php?alert=5&mensaje5=1");
