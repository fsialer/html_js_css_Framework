<?php
echo construir_menu($mi_menu);
?>
<section class="col-md-9">
	<ol class="breadcrumb">
	<li class="active">MANTENIMIENTO</li>
	  <li><a href="<?php echo base_url().'distrito/'.$data_distrito->id?>">DISTRITO</a></li>
	  <li class="active">EDITAR</li>
	</ol>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-success ">
			<div class="panel-heading">
			<?php echo heading('EDITAR DISTRITO', 2, array('class' => 'panel-title'));?>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'distrito/editar')?>
				<?php
				$input_distrito = array(
				'type'			=>'text',
		        'name'          => 'input_distrito',
		        'class'			=>'form-control',
		        'value'         => set_value('input_distrito',$data_distrito->nombre),
		        'maxlength'     => '100',
		        'size'          => '50',
		        'placeholder'	=> 'NOMBRE DEL DISTRITO'
				);
			?>
			<div class="form-group">
				<?php echo form_label('DEPARTAMENTO:');?>
				<?php echo form_dropdown('cboDepartamento',$data_departamento,set_value('cboDepartamento',$data_distrito->id_departamento),array('class'=>'form-control','id'=>'cboDepartamento'));?>	
				<div class="alert-danger" role="alert"><?php echo form_error('cboDepartamento');?></div>
			</div>
			<div class="form-group">
				<?php echo form_label('PROVINCIA:');?>
				<select name="cboProvincia" id="cboProvincia" class="form-control">    
					<option value="0" <?php echo set_value('cboProvincia');?>>---SELECCIONE UNA PROVINCIA---</option>				
    			</select>
				<div class="alert-danger" role="alert"><?php echo form_error('cboProvincia');?></div>
			</div>
			<div class="form-group">				
				<?php echo form_label('DISTRITO:', 'lbl_distrito');
				echo form_input($input_distrito);
				?>
				<div class="alert-danger" role="alert"><?php echo form_error('input_distrito');?></div>	
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
			<a href=<?php echo base_url().'distrito'?> class="btn btn-default">CANCELAR</a>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>