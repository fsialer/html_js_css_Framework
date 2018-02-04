<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
</div>	

	<h1>Panel de Administración</h1>
	<div class="row">
		<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-user"></span>Usuarios</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de usuarios:</td>
						<td>
						<span class="badge"><?php echo $total_users;?></span>
						</td>
					</tr>
					<tr>
						<td>Total de usuarios tipo Administrador:</td>
						<td><span class="badge"><?php echo $total_users_admin;?></span></td>
					</tr>
					<tr>
						<td>Total de usuarios tipo Miembro:</td>
						<td><span class="badge"><?php echo $total_users_member;?></span></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-flag"></span>Paises</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Paises:</td>
						<td>
						<span class="badge"><?php echo $total_countries;?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-user"></span>Autores</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Autores:</td>
						<td>
						<span class="badge"><?php echo $total_authors;?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-bookmark"></span>Editoriales</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Editoriales:</td>
						<td>
						<span class="badge"><?php echo $total_publishers;?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-education"></span>Temáticas</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Temáticas:</td>
						<td>
						<span class="badge"><?php echo $total_thematics;?></span>
						</td>
					</tr>
				</table>
			
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-book"></span>Libros</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Libros:</td>
						<td>
						<span class="badge"><?php echo $total_books;?></span>
						</td>
					</tr>
					<tr>
						<td>Total de Libros Activos:</td>
						<td>
						<span class="badge"><?php echo $total_books_active;?></span>
						</td>
					</tr>
					<tr>
						<td>Total de Libros Inactivos:</td>
						<td>
						<span class="badge"><?php echo $total_books_inactive;?></span>
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-book"></span>Suscripciones</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Suscripciones:</td>
						<td>
						<span class="badge"><?php echo $total_subscriptions;?></span>
						</td>
					</tr>
					<tr>
						<td>Total de Suscripciones Vigentes:</td>
						<td>
						<span class="badge"><?php echo 0;?></span>
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><span class="glyphicon glyphicon-book"></span>Prestamos</h4>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>Total de Prestamos:</td>
						<td>
						<span class="badge"><?php echo $total_loans;?></span>
						</td>
					</tr>
					<tr>
						<td>Total de Prestamos Vigentes:</td>
						<td>
						<span class="badge"><?php echo $total_loans_active;?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</div>
	
	
