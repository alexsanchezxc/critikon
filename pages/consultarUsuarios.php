<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
        <title>Practica videoclub</title>
    </head>
    <body>
        <?php

            $conexion = mysql_connect("localhost", "root", "")
                    or die ("Imposible conectar con el servidor");

            mysql_set_charset("utf8");

            mysql_select_db("videoclub")
                    or die ("No se puede conectar con la base de datos");

            $consulta_usuario = "SELECT * FROM usuarios";
            $resultado_sesion = mysql_query($consulta_usuario);

            // Devuelve el número de filas de la consulta.
            $nfilas = mysql_num_rows($resultado_sesion);
        ?>
        <ul>
          <h2>Lista de usuarios</h2>
          <table>
              <tr><td>ID</td><td>Login</td><td>Pass</td><td>ID_Empleado</td></tr>
              <?php
                  for($i = 0; $i<$nfilas; $i++){
                      $resultado = mysql_fetch_array ($resultado_sesion);
                      print "<tr><td>".$resultado['id']."</td><td>".$resultado['login']."</td><td>".$resultado['pass']."</td><td>".$resultado['id_empleado']."</td></tr>";
                  }
              ?>
          </table>
          <a href='menu/Usuario.php'><button type='button' name='button'>Volver a menú Usuario</button></a>
        </ul>
        <?php
            mysql_close($conexion);
        ?>
    </body>
</html>
