<h3 align="center" style="color:red"><u><strong>Productos que requieren atención..</strong></u></h3>
<h5 align="center"><strong>(Productos con cantidad menores o iguales a 20....)</strong></h5><br><br>
    <!--listado de datos-->
 <div style=" height : 400px; overflow : auto;">
              <!--tabla-->
              <?php
              $conexion=mysqli_connect("localhost","root","","bdunc");
              //asigno un variable para insertar info. a la base de datos
              $query="SELECT * FROM productos WHERE cantidad = 20 OR cantidad < 20 ORDER BY cantidad ASC";
              $resultado=mysqli_query($conexion,$query);
              $fila=mysqli_fetch_row($resultado); $resultado;//codigo lee los datos fila por fila
              //creo una tabla para mostrar la tabla
              ?>
               <table class="table table-hover">
                <thead>
                 <tr>
                    <th>Nombre de Productos</th>
                    <th>Cantidad disponible</th>
                    <th>Marca</th>
                    <th>Provee</th>
                    <th></th>
                    <th>Incremente o decremente la cantidad</th>
                  </tr>
              </thead>



              <?php
              //sive para mostrar todas los datos de la tabla
              echo "<tr>";
              while ($fila) {
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
              ?>