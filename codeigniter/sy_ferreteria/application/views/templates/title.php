<header class="container-fluid">
	<div class="col-md-9">
		<?php echo heading('Ferreteria',2);
	?>
	</div>	
	<div class="col-md-3">
		<p><strong>Usuario:</strong><?php echo $usuario;?></p>	
		<a href="<?php echo base_url().'logout';?>">Cerrar Sesión</a>
	</div>
</header>