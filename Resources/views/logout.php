<?php
session_start();
include '../Includes/serv.php';
if(isset($_SESSION['correo'])) {
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<!--conectando a bootstrap3-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

</head>
<body style="background:#E5E5E5"><br><br><br><br><br><br><br>
 <div align="center">
   <img src="../../Img/cargando.gif" style=" height : 150px;" >
   <br>
   <h1>Cerrando la sesión.</h1>
   <h3>Espere por favor.</h3><br><br>
  </div>
	<META HTTP-EQUIV="REFRESH" CONTENT="1.5;../../index.php">
</body>
</html>
<?php
}else{
  echo '<script> window.location="../includes/sesionoff.php"; </script>';
}
?>
