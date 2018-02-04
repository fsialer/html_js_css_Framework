<div class="panel panel-warning">
	<div class="panel-heading">
		<h4>Editar Libro: <strong><?php echo $Book->name?></strong></h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/books/edit/'.$Book->id);?>
		<div class="form-group">
			<?php echo form_label('Libro')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre del Libro ..','value'=>set_value('name',$Book->name)))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Temática')?>
			<?php echo form_dropdown('thematic',$list_thematic,set_value('thematic',$Book->thematic_id),array('class'=>'form-control thematic-select'))?>	
			<?php echo form_error('thematic', '<div class="">', '</div>'); ?>	
		</div>
		<div class="form-group">
			<?php echo form_label('Autor')?>
			<?php echo form_multiselect('author[]',$list_author,set_value('author',$Authors),array('class'=>'form-control author-select'))?>	
			<?php echo form_error('author[]', '<div class="">', '</div>'); ?>	
		</div>	
		<div class="form-group">
			<?php echo form_label('Editorial')?>
			<?php echo form_dropdown('publisher',$list_publisher,set_value('publisher',$Book->publisher_id),array('class'=>'form-control publisher-select'))?>	
			<?php echo form_error('publisher', '<div class="">', '</div>'); ?>	
		</div>
		<div class="form-group">
			<?php echo form_label('Numero de páginas')?>
			<?php echo form_input(array('name'=>'num_page','id'=>'num_page','class'=>'form-control',
			'placeholder'=>'Cantidad de páginas del Libro ..','value'=>set_value('num_page',$Book->num_page),'type'=>'number'))?>	
			<?php echo form_error('num_page', '<div class="">', '</div>'); ?>		
		</div>			
		<div class="form-group">
			<?php echo form_label('Publicación')?>
			<?php echo form_input(array('name'=>'publication','id'=>'publication','class'=>'form-control','value'=>set_value('publication',$Book->publication),'type'=>'date'))?>	
			<?php echo form_error('publication', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Ubicacion')?>
			<?php echo form_input(array('name'=>'location','id'=>'location','class'=>'form-control',
			'placeholder'=>'Ubicacion del libro','value'=>set_value('location',$Book->location)))?>	
			<?php echo form_error('location', '<div class="">', '</div>'); ?>		
		</div>	
		<div class="form-group">
			<?php echo form_label('Estado')?>
			<?php echo form_dropdown('state',array('--Seleccione  un Estado--','active'=>'Activo','inactive'=>'Inactivo'),set_value('state',$Book->state),array('class'=>'form-control','placeholder'=>'Seleccione un Nivel'))?>	
			<?php echo form_error('state', '<div class="">', '</div>'); ?>	
		</div>
		<div class="form-group">
			<?php echo form_submit('btnEditar','Editar',array('class'=>'btn btn-warning'))?>
			<?php echo "<a href='".base_url()."admin/books' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
<script type="text/javascript">
	$(".publisher-select").chosen({
		placeholder_text_single:'Seleccione una Editorial',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"

	});
	$(".thematic-select").chosen({
		placeholder_text_single:'Seleccione una Temática',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});
	$(".author-select").chosen({
		placeholder_text_multiple:'Seleccione un Autor',
		no_results_text:'No hay resultados relacionados con',
		width: "100%",
		max_selected_options:<?php echo count($Authors);?>
	});
</script>