<?php
	session_start();
	include 'Resources/Includes/serv.php';
	if(isset($_SESSION['correo'])){
	echo '<script> window.location="Resources/inicio.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!--conectando a bootstrap3-->
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/buffet.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Buffet UNC</title>
</head>
<body>
		<div class="col-sm-4" align="center" style="background:#63A4A9"><br><br><br><br><br><br>
		<img src="Img/logo.png" >
		<h1><strong>Universidad Nacional de Cuyo</strong></h1><br><br>
		</div>
		<div class="col-sm-7" style="background: #C9C9C9"><br><br><br><br><br><br><br><br>
		<form class="form-signin" role="form" method="GET" action="Login/login.php" autocomplete="off">
		    <h1 class="form-signin-heading"><strong> INICIE SESIÓN</strong></h1>
			<input type="usuario" class="form-control" placeholder="Introduzca nombre de usuario" name="a"required/><!--el codigo required/ sirve para obligar a llenar el campo-->
			<input type="password" class="form-control" placeholder="Contraseña" name="b"required/>
			<button class="boton btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		</form>
	</div>
</body>
</html>
