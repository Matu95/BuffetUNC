<html>
<head>
</head>
<?php
$conexion=mysqli_connect("localhost","root","","bdunc");
//asigno un variable para insertar info. a la base de datos


$id=$_GET["id"];
$cantidad=$_POST["cantidad"];
$query0="SELECT * FROM productos WHERE ID_productos=$id";
$resultado=mysqli_query($conexion,$query0);
$fila=mysqli_fetch_row($resultado);
while ($fila) {
	$suma=$fila[2]+$cantidad;
	$fila=mysqli_fetch_row($resultado);
}
$query="UPDATE productos SET cantidad=$suma WHERE ID_productos=$id";
mysqli_query($conexion,$query);

mysqli_close($conexion);

?>
<body>
<META HTTP-EQUIV="REFRESH" CONTENT="0.1;stock.php"> 
</body>
</html>
