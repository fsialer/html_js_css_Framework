	<?php
	if (!empty($types_rooms)) {
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Habitaciones disponibles</h4>
		</div>
		<div class="panel-body">
		<?php
				$i=0;
				foreach ($types_rooms as $type_room) {
					if ($type_room->available_r>0) {	
					$i++;				
				?>
			<div class="col-md-6">			
			
				<div class="panel panel-default color-white">
					<h1><?php echo $type_room->name_tr;?></h1>
					<?php echo form_input(array('class'=>'form-control nom_th'.$i,'type'=>'hidden','name'=>'nom_th'.$i, 'value'=>$type_room->name_tr))?>
					<?php echo form_input(array('class'=>'form-control id_tr'.$i,'type'=>'hidden','name'=>'id_tr'.$i, 'value'=>$type_room->id))?>
					<h3>Descripción</h3>
					<p><?php echo $type_room->description_tr?></p>
					<h3>Capacidad: <?php echo $type_room->maxcap_tr?></h3>
					<h4>Habitaciones Disponibles:<?php echo $type_room->available_r?></h4>
					<h2>Costo: S/. <?php echo $type_room->price_rate?></h2>
					<?php echo form_input(array('class'=>'form-control precio_th'.$i,'type'=>'hidden','name'=>'precio_th'.$i, 'value'=>$type_room->price_rate))?>
					<?php echo form_input(array('class'=>'form-control cantidad'.$i,'type'=>'number','min'=>'1','max'=>$type_room->available_r,'name'=>'cantidad'.$i))?>
					<?php echo form_button(array('content'=>'Agregar','class'=>'btn btn-info','name'=>'btnAgregar'.$i,'onClick'=>'agregar('.$i.')'));?>
				</div>
					
			</div>
			<?php
					}
				}	
				?>
		
		</div>
	</div>

		<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Detalle de la reserva</h4>
					</div>
					<div class="panel-body">
						<table class="table tabla_detalle">
							
						</table>
					</div>
				</div>
			</div>
	
		
	<?php
		}
	?>