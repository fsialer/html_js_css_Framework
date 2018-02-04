<?php
echo construir_menu($mi_menu);
?>
<section class="col-md-9">
	<ol class="breadcrumb">
	<li class="active">MANTENIMIENTO</li>
	  <li class="active">DEPARTAMENTO</li>
	</ol>
	<div>
		<a  class="btn btn-success" href="<?php echo base_url().'departamento/agregar'?>">AGREGAR</a>
	</div></br>
	<div class="panel panel-primary">
	  <div class="panel-heading">LISTADO DE DEPARTAMENTOS</div>
	  <div class="panel-body">
	    <table class="table table-striped">
	    	<thead>
	      		<tr>
	      			<th>#</th>
	      			<th>Nombre del departamento</th>	      			      			
	      			<th>Estado</th>
	      			<th>Acciones</th>
	      		</tr>
	      	</thead>
	      	<tbody>
	      	 <?php
	      		if ($data_departamento) {
	      			foreach ($data_departamento as $departamento) {?>
	      			<tr>
	      			<td><?php echo $departamento->id;?></td>
	      			<td><?php echo $departamento->nombre;?></td>
	      			<td><?php echo $departamento->estado;?></td>
	      			<td>
	      				<a href=<?php echo base_url().'departamento/editar/'.$departamento->id;?> class="btn btn-warning">EDITAR</a>
	      				<a href=<?php echo base_url().'departamento/borrar/'.$departamento->id;?> class="btn btn-danger">BORRAR</a>
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