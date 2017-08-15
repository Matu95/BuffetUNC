<!--validando sesion-->
<?php
session_start();
include '../Includes/serv.php';
if(isset($_SESSION['correo'])) {?>
<html>
<head>
<!--conectando a bootstrap3-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <!--script para validar letras-->
  <script>
      function soloLetras(e){
         key = e.keyCode || e.which;
         tecla = String.fromCharCode(key).toLowerCase();
         letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
         especiales = "8-37-39-46";

         tecla_especial = false
         for(var i in especiales){
              if(key == especiales[i]){
                  tecla_especial = true;
                  break;
              }
          }

          if(letras.indexOf(tecla)==-1 && !tecla_especial){
              return false;
          }
      } </script><!--script java para validar solo letras-->
</head>
<body style="background:#E5E5E5">

   <!--barra de navegacion-->
    <div class="navbar-wrapper ">
        <nav class="navbar navbar-inverse navbar-fixed-top"><!--navbar-inverse:coloca a la barra en un color obscuro con class="navbar navbar-default" lo coloca en color blanco o sino se agreva el valor style="background:#6EBDC7" para cambiar el color deseado-->
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><big>Buffet UNC</big><br>
                <small>Universidad Nacional de Cuyo</small>
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../inicio.php">INICIO</a></li>
                <li class="active"><a href="provedor.php">PROVEEDORES</a></li>
                <li><a href="stock.php">STOCK</a></li>
                <li><a href="producto.php">INGRESAR PRODUCTO</a></li>
                <li><a href="logout.php" class="glyphicon glyphicon-off"></a></li>

              </ul>
                  <form class="navbar-form navbar-left" action="buscar.php" method="post" autocomplete="off"> <!--BUSCADOR-->
                    <div class="form-group">
                        <input type="text" class="form-control" name="buscar"required/>
                    </div>
                      <button type="submit" class="btn btn-default">Buscar</button>
                      <big><span class="glyphicon glyphicon-zoom-in"></span></big>
                  </form>
            </div>
          </div>
        </nav>
    </div><br><br>
    <div class="col-md" style="background:#63A4A9">.</div>
    <!--formulario-->
<FORM role="form" align=center action="../process/newproveedor.php" method="GET" style="margin-top:15px" autocomplete="off">
<div class="container">
  <div class="row">
     <div class="col-md-3"></div>
    <div class="col-md-6">
       <h2 align="center">Registre un nuevo proveedor</h2><br><br>
       <h3 align="center">Nombre del proveedor</h3>
       <input type="text" class="form-control" placeholder="Campo de texto" name="a"required/>
       <h3 align="center">Tipos de productos</h3>
       <input type="text" class="form-control" onkeypress="return soloLetras(event)" placeholder="ingrese solo valores numericos" name="b"required/><!--se usa scrip solo letras-->
       <h3 align="center">Contacto</h3>
       <input type="number" class="form-control" placeholder="ingrese solo marcas" name="c"required/>
       <h3 align="center">Dirección</h3><br>
       <input type="center" class="form-control" placeholder="ingrese proveedor" name="d"required/><br>
       <input type="checkbox"required/><strong>Acepto un nuevo registro</strong><br>
       <button type="submit" class="btn btn-default" >Registrar proveedor</button>
    </div>
</FORM>
    <div class="col-md-3"></div>
  </div>
</div>
</body>
</html>
<?php
}else{
  echo '<script> window.location="../includes/sesionoff.php"; </script>';
}
?>
