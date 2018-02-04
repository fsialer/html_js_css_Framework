<?php 
echo construir_nav($mi_menu);
?>

<div>
	<h1>BOLETA DE VENTA</h1>
</div>
<div>
	<?php echo form_open(base_url().'vpventa/agregar')?>
	<div>
		<?php 
		echo form_label('CLIENTE:');
		echo form_input(array('name'=>'fecha_venta','id'=>'fecha_venta','placeholder'=>'CLIENTE'));
	?>
	</div>
	<div>
		<?php 
		echo form_label('RUC/DNI:');
		echo form_input(array('name'=>'input_rucdni','id'=>'input_rucdni','placeholder'=>'RUC/DNI'));
	?>
	</div>
	<div>
		<?php 
		echo form_label('FECHA VENTA');
		echo form_input(array('name'=>'fecha_venta','id'=>'fecha_venta','type'=>'date'));
	?>
	</div>
	<div>
		<table>
			<tr>
				<th>CODIGO</th>
				<th>ARTICULO</th>
				<th>PRECIO</th>
				<th>CANTIDAD</th>
				<th>IMPORTES</th>
			</tr>
			<tbody id="detalle">
				<td></td>
			</tbody>
			
		</table>
	</div>
	<div>
		<?php 
		echo form_label('SUBTOTAL:');
		echo form_input(array('name'=>'input_subtotal','id'=>'input_subtotal','placeholder'=>'SUBTOTAL'));
	?>
	</div>
	<div>
		<?php 
		echo form_label('IGV:');
		echo form_input(array('name'=>'input_igv','id'=>'input_igv','placeholder'=>'IGV'));
	?>
	</div>
	
	<div>
		<?php 
		echo form_label('TOTAL:');
		echo form_input(array('name'=>'input_total','id'=>'input_total','placeholder'=>'TOTAL'));
	?>
	</div>
	<?php echo form_submit("btnGuardar","Guardar");?>
	<?php echo form_close()?>

	<div>
		<div>
			<h1>productos</h1>
		</div>
		<div>
			<?php
			echo form_label('BUSCAR:');
			echo form_input(array('name'=>'input_buscar','id'=>'input_buscar','placeholder'=>'PRODUCTO','type'=>'search'));
			?>
		</div>
		<div id="content-producto">
			<ul>				
					<?php foreach ($lista_producto as $producto) {?>
						<input type="hidden" class="precio<?php echo $producto->id;?>" value="<?php echo $producto->precio?>">					
						<li class="articulo<?php echo $producto->id; ?>">
							<?php echo $producto->articulo;?>							
						</li>
						<button id="btn_agregar"onclick="agregar(<?php echo $producto->id?>)"> AGREGAR </button>
					<?php }?>				
			</ul>
		</div>
	</div>
</div>