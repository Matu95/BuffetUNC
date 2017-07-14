<!--validando sesion-->
<?php
session_start();
include 'serv.php';
if(isset($_SESSION['correo'])) {?>

      <?php
      $conexion=mysqli_connect("localhost","root","","bdunc");
      //asigno un variable para insertar info. a la base de datos
       $id=$_GET["id"];
       
          $nombre=$_POST["nombre"];
          $cantidad=$_POST["cantidad"];
          $marca=$_POST["marca"];
          $proveedor=$_POST["proveedor"];

          $verificar=mysqli_query($conexion,"SELECT * FROM productos WHERE nombre LIKE '%".$nombre."%' AND marca LIKE '%".$marca."%' ");
    
            if (mysqli_num_rows($verificar)>0) {
              echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=error.php'> ";
            }
            
            else {

                      $query0="SELECT * FROM productos WHERE ID_productos=$id";
                      $resultado=mysqli_query($conexion,$query0);
                      $fila=mysqli_fetch_row($resultado);
                     if ($nombre) {
                      $nom=$fila[1]=$nombre;
                     } else {
                      $nom=$fila[1];
                     }
                     if ($cantidad) {
                      $cant=$fila[2]=$cantidad;
                     } else {
                      $cant=$fila[2];
                     }
                     if ($marca) {
                      $marc=$fila[3]=$marca;
                     } else {
                      $marc=$fila[3];
                     }
                     if ($proveedor) {
                      $prov=$fila[4]=$proveedor;
                     } else {
                      $prov=$fila[4];
                     }
                
                      $query="UPDATE productos SET nombre='$nom', cantidad='$cant', marca='$marc', proveedor ='$prov' WHERE ID_productos=$id";
                mysqli_query($conexion,$query);
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; url=annadido.php'> ";
              }


          
         
      mysqli_close($conexion);

      ?>

<?php
}else{
  echo '<script> window.location="sesionoff.php"; </script>';
}
?>

