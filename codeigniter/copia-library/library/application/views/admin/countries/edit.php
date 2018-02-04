	<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar País: <strong><?php echo $Country->name;?></strong></h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/countries/edit/'.$Country->id);?>
		<div class="form-group">
			<?php echo form_label('País')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre del país ..','value'=>set_value('name',$Country->name)))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'))?>
			<?php echo "<a href='".base_url()."admin/countries' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	