<?php
echo construir_menu($mi_menu);
?>
<section class="col-md-9">
	<ol class="breadcrumb">
	<li class="active">MANTENIMIENTO</li>
	  <li><a href="<?php echo base_url().'provincia'?>">PROVINCIA</a></li>
	  <li class="active">EDITAR</li>
	</ol>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-success ">
		<div class="panel-heading">
			<?php echo heading('EDITAR PROVINCIA', 2, array('class' => 'panel-title'));?>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url().'provincia/editar/'.$data_provincia->id)?>
			<?php
			$input_provincia = array(
				'type'			=>'text',
		        'name'          => 'input_provincia',
		        'class'			=>'form-control',
		        'value'         => set_value('input_provincia',$data_provincia->nombre),
		        'maxlength'     => '100',
		        'size'          => '50',
		        'placeholder'	=> 'NOMBRE DE LA PROVINCIA'
				);
			?>
			<div class="form-group">
				<?php echo form_label('DEPARTAMENTO:');?>
				<?php echo form_dropdown('cboDepartamento',$data_departamento,set_value('cboDepartamento',$data_provincia->id_departamento),array('class'=>'form-control'));?>	
				<div class="alert-danger" role="alert"><?php echo form_error('cboDepartamento');?></div>
			</div>
			<div class="form-group">				
			<?php echo form_label('PROVINCIA:', 'lbl_provincia');
			echo form_input($input_provincia);
			?>
			<div class="alert-danger" role="alert"><?php echo form_error('input_provincia');?></div>	
			</div>
			<div class="form-group">	
				<p><?php echo form_label('ESTADO:', 'lbl_estado');?></p>	
				<?php 
				$data_radio=array(
					'name'=>'radio_estado',
					'id'=>'radio_estado',
					'value'=>1,
					'checked'   => (set_value('radio_estado') === '0' ? TRUE : FALSE)
					);
				echo form_radio($data_radio);
				echo form_label('ACTIVO','lbl_activo');
				$data_radio2=array(
					'name'=>'radio_estado',
					'id'=>'radio_estado',
					'value'=>0,
					'checked'   => (set_value('radio_estado') === '0' ? TRUE : FALSE)
					);
				echo form_radio($data_radio2);
				echo form_label('INACTIVO','lbl_inactivo');
				?>	
			</div>
			<?php echo form_submit('btn_guardar','EDITAR',array('class'=>'btn btn-success'));?>
			<a href=<?php echo base_url().'provincia'?> class="btn btn-default">CANCELAR</a>
			<?php echo form_close()?>
		</div>
		</div>
	</div>			
	
</section>