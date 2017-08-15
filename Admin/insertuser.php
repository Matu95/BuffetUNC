<!--validando sesion-->
<?php
session_start();
include 'serv.php';
if(isset($_SESSION['correo'])) {?>
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
<body style="background:#E5E5E5">

  <!--barra de navegacion-->
    <div class="navbar-wrapper ">
        <nav class="navbar navbar-inverse navbar-fixed-top" ><!--navbar-inverse:coloca a la barra en un color obscuro con class="navbar navbar-default" lo coloca en color blanco o sino se agreva el valor style="background:#6EBDC7" para cambiar el color deseado-->
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><big>Buffet UNC</big><br>
                <small>Universidad Nacional de Cuyo</small><br>
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="">INICIO</a></li>
                <li><a href="">PROVEEDORES</a></li>
                <li><a href="">STOCK</a></li>
                <li><a href="">INGRESAR PRODUCTO</a></li>
                <li><a href="" class="glyphicon glyphicon-off"></a></li>
                
              </ul>
            </div>
          </div>
        </nav>
    </div><br><br>
    <div class="col-md" style="background:#63A4A9">.</div>
    <br><br><br><br>

  <div align="center">
 	 <img src="check.png" style=" height : 150px;" >
 	 <br>
 	 <h1>Un nuevo usuario fue agregado éxitosamente.</h1>
 	 <h3>Será redirigido a la sección inicio.</h3>
  </div>
<?php
$conexion=mysqli_connect("localhost","root","","bdunc");
//asigno un variable para insertar info. a la base de datos


$usuario=$_GET["a"];
$contraseña=$_GET["b"];
//encripta contraseña

$query="INSERT INTO clientes(correo, pass) VALUES ('$usuario','$contraseña')";
mysqli_query($conexion,$query);
mysqli_close($conexion);
?>
<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<META HTTP-EQUIV="REFRESH" CONTENT="3;inicioadmin.php"> 
</body>
</html>
<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>