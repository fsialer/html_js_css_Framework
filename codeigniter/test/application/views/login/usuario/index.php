<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Usuario</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_usuario.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
</head>
<body>
	<header id="content-header">
		<h1>Listado de usuarios</h1>
	</header>
	<div id="accion">
		<a href="<?php echo base_url().'loginusuario/agregar'?>">Agregar</a>
		<a href="<?php echo base_url().'loginusuario/login'?>">SignUp</a>
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<div id="content-table">
		<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Sexo</th>
			<th>Acciones</th>
		</tr>		
		<?php
		foreach ($data_usuarios as $usuarios) {?>
			<tr>
				<td><?php echo $usuarios->username;?></td>
				<td><?php echo $usuarios->email;?></td>
				<td><?php echo $usuarios->sexo;?></td>
				<td><a href="<?php echo base_url().'loginusuario/editar/'.$usuarios->id;?>">Editar</a>
				<a href="<?php echo base_url().'loginusuario/borrar/'.$usuarios->id;?>">Borrar</a></td>
				
			</tr>		
		<?php }
		?>
		</table>
	</div>
	<div id="content-paginacion">
		<ul id="paginacion">
		<?php
	     echo $this->pagination->create_Links();
	    ?>
	    </ul>	
	</div>		
</body>
</html>