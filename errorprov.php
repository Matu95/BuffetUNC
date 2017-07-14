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
                <li class="active"><a href="inicio.php">INICIO</a></li>
                <li><a href="provedor.php">PROVEEDORES</a></li>
                <li><a href="stock.php">STOCK</a></li>
                <li><a href="producto.php">INGRESAR PRODUCTO</a></li>
                <li><a href="logout.php" class="glyphicon glyphicon-off"></a></li>
                
              </ul>

                  <form class="navbar-form navbar-left" action="buscar.php" method="post" autocomplete="off"> <!--BUSCADOR-->
                    <div class="form-group">
                        <input type="text" class="form-control" name="buscar">
                    </div>
                      <button type="submit" class="btn btn-default">Buscar</button>
                      <big><span class="glyphicon glyphicon-zoom-in"></span></big>
                  </form>
            </div>
          </div>
        </nav>
    </div><br><br>
    <div class="col-md" style="background:#63A4A9">.</div>
    <br><br><br><br>

  <div align="center">
 	 <img src="mensaje.png" style=" height : 150px;" >
 	 <br>
 	 <h1>ERROR.</h1>
   <h2>Nombre o contacto existente</h2>
 	 <h3>Será redirigido a la sección Ingresar proveedor.</h3>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <META HTTP-EQUIV='REFRESH' CONTENT='2;inicio.php'>
</body>
</html>
<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>