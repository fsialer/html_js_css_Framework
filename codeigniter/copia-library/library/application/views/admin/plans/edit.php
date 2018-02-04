<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar Plan</h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/plans/edit/'.$Plan->id);?>
		<div class="form-group">
			<?php echo form_label('Tipo')?>
			<?php echo form_dropdown('plan',array('monthly'=>'Mensual','annual'=>'Anual'),set_value('plan',$Plan->type),array('class'=>'form-control plan-select'))?>		
			<?php echo form_error('plan', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Precio')?>
			<?php echo form_input(array('name'=>'price','id'=>'price','class'=>'form-control',
			'placeholder'=>'Precio','value'=>set_value('price',$Plan->price)))?>	
			<?php echo form_error('price', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-success'))?>
			<?php echo "<a href='".base_url()."admin/plans' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
<script type="text/javascript">
	$(".plan-select").chosen({
		placeholder_text_single:'Seleccione una Editorial...',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
	
</script>