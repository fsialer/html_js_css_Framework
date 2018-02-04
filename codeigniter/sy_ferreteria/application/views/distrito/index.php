<?php
echo construir_menu($mi_menu);
?>
<section class="col-md-9">
	<ol class="breadcrumb">
	<li class="active">MANTENIMIENTO</li>
	  <li class="active">DISTRITO</li>
	</ol>
	<div>
		<a  class="btn btn-success" href="<?php echo base_url().'distrito/agregar'?>">AGREGAR</a>
	</div></br>
	<div class="panel panel-primary">
	  <div class="panel-heading">LISTADO DE DISTRITO</div>
	  <div class="panel-body">
	    <table class="table table-striped">
	    	<thead>
	      		<tr>
	      			<th>#</th>
	      			<th>Departamento</th>	
	      			<th>Provincia</th>	      			
	      			<th>Nombre Distrito</th>	        			
	      			<th>Estado</th>
	      			<th>Acciones</th>
	      		</tr>
	      	</thead>
	      	<tbody>
	      	 <?php
	      		if ($data_distrito) {
	      			foreach ($data_distrito as $distrito) {?>
	      			<tr>
	      			<td><?php echo $distrito->id;?></td>
	      			<td><?php echo $distrito->departamento;?></td>
	      			<td><?php echo $distrito->provincia;?></td>
	      			<td><?php echo $distrito->nombre;?></td>
	      			<td><?php echo $distrito->estado;?></td>
	      			<td>
	      				<a href=<?php echo base_url().'distrito/editar/'.$distrito->id;?> class="btn btn-warning">EDITAR</a>
	      				<a href=<?php echo base_url().'distrito/borrar/'.$distrito->id;?> class="btn btn-danger">BORRAR</a>
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