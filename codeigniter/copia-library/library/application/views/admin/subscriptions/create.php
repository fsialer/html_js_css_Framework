<div class="panel panel-success">
	<div class="panel-heading">
		<h4>Crear Suscripción</h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/subscriptions/create');?>
		<div class="form-group">
			<?php echo form_label('Usuario')?>
			<?php echo form_dropdown('user',$list_Users,set_value('user'),array('class'=>'form-control user-select'))?>		
			<?php echo form_error('user', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Plan')?>
			<?php echo form_dropdown('plan',$list_Plans,set_value('plan'),array('class'=>'form-control plan-select'))?>		
			<?php echo form_error('plan', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnAgregar','Agregar',array('class'=>'btn btn-success'))?>
			<?php echo "<a href='".base_url()."admin/subscriptions' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
<script type="text/javascript">
	$(".user-select").chosen({
		placeholder_text_single:'Seleccione un usuario...',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
	$(".plan-select").chosen({
		placeholder_text_single:'Seleccione un plan...',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
	
</script>