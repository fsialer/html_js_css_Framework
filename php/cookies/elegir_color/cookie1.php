<?php
	if (isset($_POST['color'])) {
		$color=$_POST['color'];
		setcookie("color",$color,time()+80000000);
	}else{
		if (isset($_COOKIE['color'])) {
			$color=$_COOKIE['color'];
		}else{
			$color="white";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Elegi color de la pagina</title>
	<meta charset="utf-8" />
</head>
<body <?php echo "style='background-color:$color'";?>>
	<form method="post" action="cookie1.php">
		<div>
			<label for="color">Escoge tu color de fondo</label>
			<select name="color">
				<option value="red">Rojo</option>
				<option value="yellow">Amarillo</option>
				<option value="orange">naranja</option>
				<option value="purple">morado</option>
				<option value="blue">Azul</option>
				<option value="green">Verde</option>
				<option value="gray">Gris</option>
			</select>
		</div>
		<input type="submit" value="Cambiar color"></input>
	</form>
</body>
</html>