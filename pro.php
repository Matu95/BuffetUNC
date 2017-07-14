<!--validando sesion-->
<?php
session_start();
include 'serv.php';
if(isset($_SESSION['correo'])) {?>
<html>
<head>
<!--conectando a bootstrap3-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
                <li><a href="inicio.php">INICIO</a></li>
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
 
    
  <h2 align="center">Productos ya registrados!!</h2> <br><br><br><br>

              <!--tabla-->
              <?php
              $conexion=mysqli_connect("localhost","root","","bdunc");
              //asigno un variable para insertar info. a la base de datos
              $query="SELECT `ID_productos`,`nombre`, `cantidad` FROM `productos` WHERE 1";
              $resultado=mysqli_query($conexion,$query);
              $fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
              //creo una tabla para mostrar la tabla
              ?>
               <input type="text" id="in" onkeyup="fun()" placeholder="Buscar.">
               <table class="table table-hover"  id="tabla">
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
 


</body>
</html>

<script type="text/javascript">
  <script>
function fun() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("in");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>
