<?php namespace Views;


$template=new template();

class template{


	public function __construct(){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>Login</title>
			
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="<?php echo URL;?>Views/template/css/main.css">
			
		</head>
		<body>
		<?php session_start();?>
		
			
		

		

	<?php}

    public function __destruct(){
        ?>
        <footer class="navbar-fixed-bottom">
            Todos los Derechos Reservados &copy 2016<br>
            Fernando Sialer | <b>FConsulting</b>
        </footer>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?php echo URL;?>Views/template/js/bootstrap.js"></script>
        </body>
        </html>
   <?php }


}?>