<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar Suscripción</h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/subscriptions/edit/'.$Subscription->id);?>
		<div class="form-group">
			<?php echo form_label('Usuario')?>
			<?php echo form_dropdown('user',$list_Users,set_value('user',$Subscription->user_id),array('class'=>'form-control user-select'))?>		
			<?php echo form_error('user', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Plan')?>
			<?php echo form_dropdown('plan',$list_Plans,set_value('plan',$Subscription->plan_id),array('class'=>'form-control plan-select'))?>		
			<?php echo form_error('plan', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-success'))?>
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