<?php 
echo construir_nav($mi_menu);
?>
<div><?php echo $this->session->flashdata('msg');?></div>
<div>
	<a href="<?php echo base_url().'vpproducto/agregar'?>">Agregar producto</a>
	
</div>
<div>
	<table>
		<tr>
			<th>ARTICULO</th>
			<th>STOCK</th>
			<th>ESTADO</th>
			<th>PRECIO</th>
			<th>ACCIONES</th>
		</tr>
		<?php
		foreach ($data_productos as $productos) {?>
			<tr>
				<td><?php echo $productos->articulo?></td>
				<td><?php echo $productos->stock?></td>
				<td><?php echo $productos->estado?></td>
				<td><STRONG>S/. </STRONG><?php echo $productos->precio?></td>
				<td>
					<a href="<?php echo base_url().'vpproducto/editar/'.$productos->id;?>">Editar</a>
					<a href="<?php echo base_url().'vpproducto/borrar/'.$productos->id;?>">Borrar</a>
					<a href="<?php echo base_url().'vpproducto/abastecer/'.$productos->id;?>">Abastecer</a>
				</td>
			</tr>
		<?php }?>
	</table>
	<ul>
		<?php echo $this->pagination->create_links();?>
	</ul>
</div>