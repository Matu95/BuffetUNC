<?php
session_start();
include '../Resources/includes/serv.php';
if(isset($_SESSION['correo'])) {?>
<html>
<head>
<!--conectando a bootstrap3-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</SCRIPT>
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
                <li class="active"><a href="">INICIO</a></li>
                <li><a href="">PROVEEDORES</a></li>
                <li><a href="">STOCK</a></li>
                <li><a href="">INGRESAR PRODUCTO</a></li>
                <li><a href="logout.php" class="glyphicon glyphicon-off"></a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div><br><br>
    <div class="col-md" style="background:#63A4A9">.</div>
    <br><br>
<h3 ALIGN="Center"><b>BIENVENIDO ADMINISTRADOR</b></h3><br>
<div class="container">
  <div>
   <div class="col-md-5">
       <!--formulario-->
<FORM role="form" align=center action="insertuser.php" method="GET" style="margin-top:15px" autocomplete="off">
       <h2 align="center">Registre un usuario</h2><br>
       <h3 align="center">Nombre de usuario</h3>
       <input type="text" class="form-control" placeholder="Campo de texto" name="a" required/>
       <h3 align="center">contraseña</h3>
       <input type="password" class="form-control" placeholder="ingrese solo valores numericos" name="b" required/><br>
       <input type="checkbox" required/><strong>Acepto el registro de un nuevo usuario</strong><br><br>
       <button type="submit" class="btn btn-default" >Registrar producto</button>
</FORM>

   </div>
   <div class="col-md-7" style=" height : 400px; overflow : auto;"><br><br>
     <!--tabla-->
     <h3 align="center"><b>Cuentas activas<b></h3>
              <?php
              $conexion=mysqli_connect("localhost","root","","bdunc");
              //asigno un variable para insertar info. a la base de datos
              $query="SELECT `ID`,`correo`, `pass`   FROM `clientes` WHERE 1";
              $resultado=mysqli_query($conexion,$query);
              $fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
              //creo una tabla para mostrar la tabla
              ?>
               <table class="table table-hover" >
                <thead>
                 <tr>
                    <th>Numero #  </th>
                    <th>Nombre de usuario</th>
                  </tr>
              </thead>

              <?php
              //sive para mostrar todas los datos de la tabla
              echo "<tr>";
              while ($fila) {
              echo "<td>".$fila[0]."</td>";
              echo "<td>".$fila[1]."</td>";
              echo "<td>";
              echo "<form action='deluser.php?id=".$fila[0]."' method='post' >";
              echo "<input type='checkbox'required/> ";
              echo "<input type='submit' value='Eliminar'>";
              echo "</form>";
              echo "</td>";
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
  echo '<script> window.location="../Resources/includes/sesionoff.php"; </script>';
}
?>
