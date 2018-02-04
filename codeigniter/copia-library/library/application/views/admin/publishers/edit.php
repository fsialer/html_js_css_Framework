<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Crear Editorial: <strong><?php echo $Publisher->name;?></strong></h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/publishers/edit/'.$Publisher->id);?>
		<div class="form-group">
			<?php echo form_label('Editorial')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre de la editorial..','value'=>set_value('name',$Publisher->name)))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_label('País')?>
			<?php echo form_dropdown('country',$list_country,set_value('country',$Publisher->country_id),array('class'=>'form-control country-select'))?>	
			<?php echo form_error('type', '<div class="">', '</div>'); ?>	
		</div>
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'))?>
			<?php echo "<a href='".base_url()."admin/publishers' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
<script type="text/javascript">
	$(".country-select").chosen({
		placeholder_text_single:'Seleccione un Pais',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
</script>