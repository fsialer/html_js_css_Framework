<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title>DropDown anidados(Region-Povincia-Distrito)</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_dropdown.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

</head>
<body>
	<header id="content-header">
		<h1>DROPDOWN ANIDADOS.</h1>
	</header>
	<div id="accion">
		<a href="<?php echo base_url().'dropdownestados/agregar'?>">Agregar</a>		
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<div id="content-table">
		<table>
			<tr>
				<th>Regiones</th>
				<th>Provincias</th>
				<th>Estados</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>	
			<?php foreach ($data_estados as $estados) {?>
			<tr>
				<td><?php echo $estados->nombre;?></td>
				<td><?php echo $estados->provincia;?></td>
				<td><?php echo $estados->distrito;?></td>
				<td><?php echo $estados->estado;?></td>
				<td>
					<a href="<?php echo base_url().'dropdownestados/editar/'.$estados->id?>">Editar</a>
					<a href="<?php echo base_url().'dropdownestados/borrar/'.$estados->id?>">Borrar</a>
				</td>
			</tr>
			<?php }?>		
		</table>
	</div>
	<div id="content-paginacion">
		<ul id="paginacion">
			<?php
			echo $this->pagination->create_links();
			?>
	    </ul>	
    </div>	
</body>
</html>