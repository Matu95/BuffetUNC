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
    <br><br><br>
          <!--tabla-->
<?php
$conexion=mysqli_connect("localhost","root","","bdunc");
$buscar=trim($_POST['buscar']);
//asigno un variable para insertar info. a la base de datos
$query="SELECT * FROM productos WHERE nombre LIKE '%".$buscar."%' OR marca LIKE '%".$buscar."%'";
$resultado=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
//creo una tabla para mostrar la tabla
$existen = mysqli_num_rows($resultado);
    //condicional para saber si existen resultados
    if($existen == 0){
        echo ("<br><br><h2 align='center'>Su busqueda no arrojo resultados para: <strong>$buscar</strong></h2>");
    }
    else{
        echo ("<br><h2 align='center'>Se encontraron la cantidad de <strong>$existen</strong> resultados.</h2><br>");
        echo ("<h5 align='center'>Palabra clave..<strong>$buscar</strong></h5><br><br>");
?>
<div class="container">
<div class="col-sm-12" style=" height : 400px; overflow : auto;">
             <table class="table table-hover" >
                <thead>
                 <tr>
                    <th>Numero #  </th>
                    <th>Nombre de Productos</th>
                    <th>Cantidad disponible</th>
                    <th>Marca</th>
                    <th>Provee</th>
                  </tr>
              </thead>


              <?php
              //sive para mostrar todas los datos de la tabla
              echo "<tr>";
              while ($fila) {
              echo "<td>".$fila[0]."</td>";
              echo "<td>".$fila[1]."</td>";
              echo "<td>".$fila[2]."</td>";
              echo "<td>".$fila[3]."</td>";
              echo "<td>".$fila[4]."</td>";
              echo "<td>";
              echo "<form action='eliminar.php?id=".$fila[0]."' method='post' >";
              echo "<input type='checkbox'required/> ";
              echo "<input type='submit' value='Eliminar'>";
              echo "</form>";
              echo "</td>";
              echo "<td>";
              echo "<form action='modificar.php?id=".$fila[0]."' method='post' >";
              echo "<input type='number' name='cantidad'required/>";
              echo "<input type='submit' value='modificar'>";
              echo "</form>";
              echo "</td>";
              echo "<td>";
              echo "<form action='editar.php?id=".$fila[0]."' method='post' >";
              echo "<input type='submit' value='Editar datos'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
              $fila=mysqli_fetch_row($resultado);
              }

              echo "</table>";
              echo "</div>";
              mysqli_close($conexion);
              }
              ?>
</div>
</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>
