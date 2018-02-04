<div class="panel panel-success">
	<div class="panel-heading">
		<h4>Crear Autor</h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/authors/create');?>
		<div class="form-group">
			<?php echo form_label('Autor')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre del autor completo ..','value'=>set_value('name')))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_label('País')?>
			<?php echo form_dropdown('country',$list_country,set_value('country'),array('class'=>'form-control country-select','placeholder'=>'Seleccione un Nivel'))?>	
			<?php echo form_error('type', '<div class="">', '</div>'); ?>	
		</div>
		
		<div class="form-group">
			<?php echo form_submit('btnAgregar','Agregar',array('class'=>'btn btn-success'))?>
			<?php echo "<a href='".base_url()."admin/authors' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
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