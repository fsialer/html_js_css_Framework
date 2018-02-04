<section>

	<div class="cootainer">
		<div class="panel panel-info">
			<div  class="panel-heading">
			<span>RESUMEN DE LOS LECTORES QUE TIENEN EL LIBRO</span>
			</div>
			
			<div class="panel-body table-responsive" id="result-book">
				<table  class="table table-striped">
					<tr>
						
						<th>LECTORES</th>
						<th>SITIO</th>
						
					</tr>	
					<?php
					foreach ($data_prestamo as $detalle_prestamo) {?>
						<tr>							
							<td><?php echo $detalle_prestamo->nombres.' '.$detalle_prestamo->apellido_paterno.' '.$detalle_prestamo->apellido_materno;?></td>
							<td><?php echo $detalle_prestamo->sitio;?></td>							
						</tr>
					<?php }
					?>				
					
				</table>
				<div><span><?php echo $this->session->flashdata('msg'); ?></span></div>
				<a href="<?php echo base_url();?>" class='form-control btn btn-default'>REGRESAR</a>
			</div>

		</div>
	</div>
	

</section>
<div class="clear"></div>