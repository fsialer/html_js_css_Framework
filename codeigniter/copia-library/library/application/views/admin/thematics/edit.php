<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar Temática: <strong><?php echo $Thematic->name;?></strong></h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/thematics/edit/'.$Thematic->id);?>
		<div class="form-group">
			<?php echo form_label('Temática')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre de la Temática ..','value'=>set_value('name',$Thematic->name)))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'))?>
			<?php echo "<a href='".base_url()."admin/thematics' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	