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

</head>
<body style="background:#E5E5E5">

  <!--barra de navegacion-->
    <div class="navbar-wrapper ">
        <nav class="navbar navbar-inverse navbar-fixed-top " ><!--navbar-inverse:coloca a la barra en un color obscuro con class="navbar navbar-default" lo coloca en color blanco o sino se agreva el valor style="background:#6EBDC7" para cambiar el color deseado-->
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
                <li><a href="../inicio.php">INICIO</a></li>
                <li><a href="provedor.php">PROVEEDORES</a></li>
                <li><a href="stock.php">STOCK</a></li>
                <li class="active"><a href="producto.php">INGRESAR PRODUCTO</a></li>
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
<FORM role="form" align=center action="productos.php" method="GET" style="margin-top:15px" autocomplete="off">
<div class="container">
  <div class="row">
    <div class="col-md-6">
       <h3 align="center">Nombre del producto</h3>
       <input type="text" onkeypress="return soloLetras(event)" class="form-control" placeholder="Campo de texto" name="a"required/>
       <h3 align="center">Cantidad</h3>
       <input type="number" class="form-control" placeholder="ingrese solo valores numericos" name="b"required/>
       <h3 align="center">Marca</h3>
       <input type="text" class="form-control" placeholder="ingrese solo marcas" name="c"required/>
       <h3 align="center">Proveedor</h3><br>
       <input type="center" class="form-control" placeholder="ingrese proveedor" name="d"required/><br>
       <input type="checkbox" required/><strong>Acepto el registro de un nuevo producto</strong><br><br>
       <button type="submit" class="btn btn-default" >Registrar producto</button>
    </div>
</FORM>

  <h2 align="center">Productos ya registrados!!</h2> <br><br><br><br>

    <div class="col-md-6" style=" height : 400px; overflow : auto;">
              <!--tabla-->
              <?php
              $conexion=mysqli_connect("localhost","root","","bdunc");
              //asigno un variable para insertar info. a la base de datos
              $query="SELECT `ID_productos`,`nombre`, `cantidad` FROM `productos` WHERE 1";
              $resultado=mysqli_query($conexion,$query);
              $fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
              //creo una tabla para mostrar la tabla
              ?>
               <table class="table table-hover" >
                <thead>
                 <tr>
                    <th>Numero #  </th>
                    <th>Nombre de Productos</th>
                    <th>Cantidad disponible</th>
                  </tr>
              </thead>

              <?php
              //sive para mostrar todas los datos de la tabla
              echo "<tr>";
              while ($fila) {
              echo "<td>".$fila[0]."</td>";
              echo "<td>".$fila[1]."</td>";
              echo "<td>".$fila[2]."</td>";
              echo "</tr>";
              $fila=mysqli_fetch_row($resultado);
              }

              echo "</table>";
              echo "</div>";
              mysqli_close($conexion);
              ?>
    </div>
  </div>
</div>
</body>

</html>


<?php
}else{
  echo '<script> window.location="../includes/sesionoff.php"; </script>';
}
?>
