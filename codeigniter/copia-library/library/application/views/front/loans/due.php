
<div class="col-md-12">
	<div class="panel panel-warning">
		<div class="panel-heading">
			Deudas
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Libro</th>
						<th>Temática</th>
						
					</tr>
					<?php 
					$i=0;
					foreach ($Books as $book) {

					?>	
					<tr>
						<td><?php echo $book->name?></td>
						<td><?php echo $book->thematic_name?></td>
					</tr>
					<?php
					}
					?>
		
				</table>
	
			</div>
			<div class="form-group">
				<a class='btn btn-default' href="<?php echo base_url();?>">Regresar</a>
			</div>
		</div>
	</div>	
</div>