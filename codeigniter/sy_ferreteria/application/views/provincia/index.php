<?php
echo construir_menu($mi_menu);
?>
<section class="col-md-9">
	<ol class="breadcrumb">
	<li class="active">MANTENIMIENTO</li>
	  <li class="active">PROVINCIA</li>
	</ol>
	<div>
		<a  class="btn btn-success" href="<?php echo base_url().'provincia/agregar'?>">AGREGAR</a>
	</div></br>
	<div class="panel panel-primary">
	  <div class="panel-heading">LISTADO DE PROVINCIA</div>
	  <div class="panel-body">
	    <table class="table table-striped">
	    	<thead>
	      		<tr>
	      			<th>#</th>
	      			<th>Departamento</th>	
	      			<th>Nombre de la provincia</th>	      			      			
	      			<th>Estado</th>
	      			<th>Acciones</th>
	      		</tr>
	      	</thead>
	      	<tbody>
	      	 <?php
	      		if ($data_provincia) {
	      			foreach ($data_provincia as $provincia) {?>
	      			<tr>
	      			<td><?php echo $provincia->id;?></td>
	      			<td><?php echo $provincia->departamento;?></td>
	      			<td><?php echo $provincia->nombre;?></td>
	      			<td><?php echo $provincia->estado;?></td>
	      			<td>
	      				<a href=<?php echo base_url().'provincia/editar/'.$provincia->id;?> class="btn btn-warning">EDITAR</a>
	      				<a href=<?php echo base_url().'provincia/borrar/'.$provincia->id;?> class="btn btn-danger">BORRAR</a>
	      			</td>
	      			</tr>
	      			<?php }?>
	      		<?php }else{?>
	      		<span>No hay datos.</span>
	      	<?php }?>
	      	</tbody>

	    </table>
	    
	  </div>
	</div>
	<ul class="pagination">
            <?php                  
              echo $this->pagination->create_links();
            ?>
            </ul>
</section>