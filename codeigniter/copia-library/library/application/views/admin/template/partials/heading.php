
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title?> | Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/bootstrap/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/chosen/chosen.css'?>">
	<script type="text/javascript" src="<?php echo base_url().'plugins/jquery/jquery-2.2.4.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'plugins/bootstrap/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'plugins/chosen/chosen.jquery.js'?>"></script>

</head>
<body class="container">
	<head >
		<div class="col-md-2 title">
			<h4>Biblioteca</h4>
		</div>
		<div class="col-md-10 option">
		<div class="dropdown option">
			<ul class="nav navbar-nav">
        
        	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('auth')['name'];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'admin/users/change/'.$this->session->userdata('auth')['id'];?>"><span class="glyphicon glyphicon-cog"></span> Cambiar Clave</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url().'admin/auth/logout';?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>         
          </ul>
        </li>
      		</ul>	
		</div>
			
		</div>		
	</head>
	
	