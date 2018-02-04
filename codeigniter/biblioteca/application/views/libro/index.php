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
		<a href="<?php echo base_url().'libro/agregar'?>" class="btn btn-primary">AGREGAR <i class="glyphicon glyphicon-plus"></i></a>
	</div>
	<div>
		<span><?php echo $this->session->flashdata('msg'); ?></span>
	</div>
	<br>
	<div class="panel panel-info">
		<div  class="panel-heading">
			<span>LISTADO DE LIBROS</span>
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-striped">
				<tr>
					<th>NOMBRE DEL LIBRO</th>
					<th>TEMATICA</th>	
					<th>AUTOR(ES)</th>		
					<th>EDITORIAL</th>
					<th>NUMERO DE PAGINAS</th>
					<th>STOCK</th>
					<th>FECHA DE PUBLICACION</th>
					<th>UBICACION</th>
					<th>ESTADO</th>
					<th>ACCIONES</th>
				</tr>
				<?php
			foreach ($data_libros as $libros) {?>
			<tr>
				<td><?php echo $libros->nombre;?></td>
				<td><?php echo $libros->nom_tem;?></td>
				<td><?php echo $libros->dato_autor;?></td>	
				<td><?php echo $libros->nom_edito;?></td>
				<td><?php echo $libros->num_pag;?></td>
				<td><?php echo $libros->stock;?></td>		
				<td><?php echo $libros->fecha_pub;?></td>	
				<td><?php echo $libros->ubicacion;?></td>	
				<td><?php echo $libros->estado;?></td>								
				<td>
				<a href="<?php echo base_url().'libro/abastecer/'.$libros->id;?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
				<a href="<?php echo base_url().'libro/editar/'.$libros->id;?>"><i class="glyphicon glyphicon-pencil alert-warning"></i></a>
				<a href="<?php echo base_url().'libro/borrar/'.$libros->id;?>"><i class="glyphicon glyphicon-remove alert-danger"></i></a></td>
				
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