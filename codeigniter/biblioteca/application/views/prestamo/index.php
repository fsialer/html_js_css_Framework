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
<section class="col-md-10 ">	
	<div>
		<a href="<?php echo base_url().'nacionalidad/agregar'?>" class="btn btn-primary">AGREGAR <i class="glyphicon glyphicon-plus"></i></a>
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<br>
	<div class="panel panel-info">
		<div  class="panel-heading">
			<span>LISTADO DE PRESTAMOS</span>
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-striped">
				<tr>														
					<th>LIBRO</th>
					<th>LECTOR</th>	
					<th>FECHA PRESTAMO</th>		
					<th>ESTADO</th>				
					<th>DEVOLUCION</th>
				</tr>
				<?php
			foreach ($data_prestamos as $prestamos) {?>
			<tr>
				<td><?php echo $prestamos->nombre;?></td>
				<td><?php echo $prestamos->nombres.''.$prestamos->apellido_paterno.' '.$prestamos->apellido_materno;?></td>	
				<td><?php echo $prestamos->fecha_prestamo;?></td>
				<td><?php echo $prestamos->pre_estado;?></td>	
												
				<td><a href="<?php echo base_url().'prestamo/devolver/'.$prestamos->id_prestamo;?>"><i class="glyphicon glyphicon-exclamation-sign"></i></a>
			
				
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