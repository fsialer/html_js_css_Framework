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
		<a href="<?php echo base_url().'tematica/agregar'?>" class="btn btn-primary">AGREGAR <i class="glyphicon glyphicon-plus"></i></a>
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<br>
	<div class="panel panel-info">
		<div  class="panel-heading">
			<span>LISTADO DE TEMATICAS</span>
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-striped">
				<tr>
					<th>NOMBRES</th>											
					<th>ABREVIATURA</th>					
					<th>ACCIONES</th>
				</tr>
				<?php
			foreach ($data_tematicas as $tematicas) {?>
			<tr>
				<td><?php echo $tematicas->nombre;?></td>
				<td><?php echo $tematicas->abreviatura;?></td>	
												
				<td><a href="<?php echo base_url().'tematica/editar/'.$tematicas->id;?>"><i class="glyphicon glyphicon-pencil alert-warning"></i></a>
				<a href="<?php echo base_url().'tematica/borrar/'.$tematicas->id;?>"><i class="glyphicon glyphicon-remove alert-danger"></i></a></td>
				
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