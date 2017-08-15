<?php
$conexion=mysqli_connect("localhost","root","","bdunc");
//asigno un variable para insertar info. a la base de datos


$producto=$_GET["a"];
$cantidad=$_GET["b"];
$marca=$_GET["c"];
$proveedor=$_GET["d"];
//encripta contraseña
$verificar=mysqli_query($conexion,"SELECT * FROM productos WHERE nombre LIKE '%".$producto."%' AND marca LIKE '%".$marca."%' ");
if (mysqli_num_rows($verificar)>0) {
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=../views/error.php'> ";
} else {
  $query="INSERT INTO productos(nombre, cantidad, marca, proveedor) VALUES ('$producto','$cantidad','$marca','$proveedor')";
  mysqli_query($conexion,$query);
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; url=../views/annadido.php'> ";
}
mysqli_close($conexion);

?>
