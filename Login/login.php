<?php
	session_start();
?>
<?php
$conexion=mysqli_connect("localhost","root","","bdunc");


				$usuario = $_GET['a'];
				$pw = $_GET['b'];
				$log = mysqli_query($conexion,"SELECT * FROM clientes WHERE correo = '$usuario' and pass = '$pw'");

				                                                                             //prioridad administrador ;)

				if ($usuario=="matichox") {
					if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["correo"] = $row['correo'];
				  	?>
				  	    <!DOCTYPE html>
						<html>
						<head>
						<!--conectando a bootstrap3-->
						  <meta charset="utf-8">
						  <meta name="viewport" content="width=device-width, initial-scale=1.0">
						  <link href="css/bootstrap.min.css" rel="stylesheet">
						  <script src="js/jquery.min.js"></script>
						  <script src="js/bootstrap.min.js"></script>
						</head>
						<body style="background:#E5E5E5"><br><br><br><br><br><br><br>
						 <div align="center">
						   <img src="../Img/cargando.gif" style=" height : 150px;" >
						   <br>

				<?php
				echo "<h1>";
				echo 'Iniciando sesión para <strong>'.$_SESSION['correo'].' administrador</strong> <p>';
				echo "</h1>";
				 ?>

						   <h3>Espere por favor.</h3><br><br>
						  </div>
							<META HTTP-EQUIV="REFRESH" CONTENT="1.5;../../Admin/inicioadmin.php">
						</body>
						</html>

					<?php
				}
				else{
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.1;../Resources/Error/fallo.php'> ";
				}

                                                                                            //aqui termina la prioridad ;)
				} else {

					if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["correo"] = $row['correo'];
				  	?>
				  	    <!DOCTYPE html>
						<html>
						<head>
						<!--conectando a bootstrap3-->
						  <meta charset="utf-8">
						  <meta name="viewport" content="width=device-width, initial-scale=1.0">
						  <link href="css/bootstrap.min.css" rel="stylesheet">
						  <script src="js/jquery.min.js"></script>
						  <script src="js/bootstrap.min.js"></script>
						</head>
						<body style="background:#E5E5E5"><br><br><br><br><br><br><br>
						 <div align="center">
						   <img src="../Img/cargando.gif" style=" height : 150px;" >
						   <br>

				<?php
				echo "<h1>";
				echo 'Iniciando sesión para <strong>'.$_SESSION['correo'].'</strong> <p>';
				echo "</h1>";
				 ?>

						   <h3>Espere por favor.</h3><br><br>
						  </div>
							<META HTTP-EQUIV="REFRESH" CONTENT="1.5;../Resources/inicio.php">
						</body>
						</html>

					<?php
				}
				else{
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0.1;../Resources/Error/fallo.php'> ";
				}

				}



    mysqli_close($conexion);

?>
