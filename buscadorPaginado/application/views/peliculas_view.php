<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador con paginador codeIgniter</title>
<style type="text/css">
    body{
        background-color: #111;
    }
    h2{
        color: #990000;
        text-decoration: underline;
    }
    h4{
        color: #A70000;
        font-weight: bold;
    }
    #cuerpo{
        width: 1000px;
        padding: 20px;
        background-color: #333;
        color: #fff;
        font-size: 12px;
    }
    #paginacion{
        padding: 10px;
        background-color: #A70000;
        width: 1020px;
        text-align: center;
    }
    #paginacion a{
        color: #fff;
        text-decoration: none;
        margin: 1px;
    }
</style>
</head>

<body>
    <?php
    if(!$peliculas)
    {
    ?>
    No hay nada que mostrar
    <?php
    }else{
    foreach($peliculas as $fila)
    {
    ?>
    <h2><?=$fila->titulo?></h2>
    <h4><?=$fila->autor?></h4>
    <div id="cuerpo"><?=$fila->cuerpo?></div>
    <?php
    }
    ?>
    <?=$this->pagination->create_links()?>
    <?php
    }
    ?>
</body>
</html>
