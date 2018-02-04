<nav class="col-md-2" id="navegador">
	<ul class="nav nav-pills nav-stacked">
		<li><a href="<?php echo base_url()?>">HOME</a></li>		
		<li><a href="<?php echo base_url().'autor'?>">AUTORES</a></li>
		<li><a href="<?php echo base_url().'tematica'?>">TEMATICA</a></li>
		<li><a href="<?php echo base_url().'nacionalidad'?>">NACIONALIDAD</a></li>
		<li><a href="<?php echo base_url().'lector'?>">LECTORES</a></li>
		<li><a href="<?php echo base_url().'prestamo'?>">PRESTAMO</a></li>
		<li><a href="<?php echo base_url().'suscripcion'?>">SUSCRIPCIÓN</a></li>
		<li><a href="<?php echo base_url().'editorial'?>">EDITORIAL</a></li>
		<li><a href="<?php echo base_url().'libro'?>">LIBROS</a></li>
		<li><a href="<?php echo base_url().'usuario'?>">USUARIOS</a></li>
	</ul>
</nav>
<section class="col-md-10">	
	<div>
		<a href="<?php echo base_url().'autor/agregar'?>" class="btn btn-primary">AGREGAR <i class="glyphicon glyphicon-plus"></i></a>
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<br>
	<div class="panel panel-info">
		<div  class="panel-heading">
			<span>LISTADO DE AUTORES</span>
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-striped">
				<tr>
					<th>NOMBRES</th>					
					<th>APELLIDOS</th>					
					<th>PAIS DE ORIGEN</th>
					<th>NACIONALIDAD</th>					
					<th>ACCIONES</th>
				</tr>
				<?php
			foreach ($data_autores as $autores) {?>
			<tr>
				<td><?php echo $autores->nombres;?></td>
				<td><?php echo $autores->apellido_paterno.' '.$autores->apellido_materno;?></td>	
				<td><?php echo $autores->pais;?></td>	
				<td><?php echo $autores->nombre;?></td>								
				<td><a href="<?php echo base_url().'autor/editar/'.$autores->id_autor;?>"><i class="glyphicon glyphicon-pencil alert-warning"></i></a>
				<a href="<?php echo base_url().'autor/borrar/'.$autores->id_autor;?>"><i class="glyphicon glyphicon-remove alert-danger"></i></a></td>
				
			</tr>		
		<?php }
		?>
			</table>
		</div>	
		<nav>
			<ul class="pagination">
				<?php
	    		 echo $this->pagination->create_Links();
	    		?>
			</ul>
		</nav>
	</div>
</section>
<div class="clear"></div>