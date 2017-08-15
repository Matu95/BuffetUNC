<!--validando sesion-->
<?php
session_start();
include '../includes/serv.php';
if(isset($_SESSION['correo'])) {?>

<?php
$conexion=mysqli_connect("localhost","root","","bdunc");
//asigno un variable para insertar info. a la base de datos


$nombre=$_GET["a"];
$tipo=$_GET["b"];
$contacto=$_GET["c"];
$direccion=$_GET["d"];

$verificar=mysqli_query($conexion,"SELECT * FROM preveedor WHERE nombre LIKE '%".$nombre."%' OR contacto LIKE '$contacto' ");

if (mysqli_num_rows($verificar)>0) {
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=../views/errorprov.php'> ";

    }
else{
$query="INSERT INTO preveedor( nombre, tipo, contacto, direccion) VALUES ('$nombre','$tipo','$contacto','$direccion')";

		mysqli_query($conexion,$query);
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; url=../views/annadidoprov.php'> ";
}

mysqli_close($conexion);
?>


<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>
