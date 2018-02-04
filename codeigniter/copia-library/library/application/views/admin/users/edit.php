
	<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar Usuario: <strong><?php echo $User->name.' '.$User->surname;?></strong></h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/users/edit/'.$User->id);?>
		<div class="form-group">
			<?php echo form_label('Nombres')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre completo ..','value'=>set_value('name',$User->name)))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>
		<div class="form-group">
			<?php echo form_label('Apellidos')?>
			<?php echo form_input(array('name'=>'surname','id'=>'surname','class'=>'form-control',
			'placeholder'=>'Apellidos completo ..','value'=>set_value('surname',$User->surname)))?>	
			<?php echo form_error('surname', '<div class="">', '</div>'); ?>		
		</div>
		<div class="form-group">
			<?php echo form_label('Direccion')?>
			<?php echo form_input(array('name'=>'address','id'=>'address','class'=>'form-control',
			'placeholder'=>'Direccion de la vivienda','value'=>set_value('address',$User->address)))?>	
			<?php echo form_error('address', '<div class="">', '</div>'); ?>		
		</div>
		<div class="form-group">
			<?php echo form_label('Email')?>
			<?php echo form_input(array('name'=>'email','id'=>'email','class'=>'form-control',
			'placeholder'=>'example@mail.com','value'=>set_value('email',$User->email)))?>	
			<?php echo form_error('email', '<div class="">', '</div>'); ?>		
		</div>
		<div class="form-group">
			<?php echo form_label('Tipo de nivel')?>
			<?php echo form_dropdown('type',array('--Seleccione  un nivel--','admin'=>'Administrador','member'=>'Miembro'),set_value('type',$User->type),array('class'=>'form-control type-select','placeholder'=>'Seleccione un Nivel'))?>	
			<?php echo form_error('type', '<div class="">', '</div>'); ?>	
		</div>
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'))?>
			<?php echo "<a href='".base_url()."admin/users' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
<script type="text/javascript">
	$(".type-select").chosen({
		placeholder_text_single:'Seleccione un nivel',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
</script>
