<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRITIKON - Inicio</title>
  <!-- NOTE: Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- NOTE: MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- NOTE: Custom CSS -->
  <link id="pageColor" href="../css/white.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <!-- NOTE: Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <?php 
  define("scripts", 1);
  include('scripts.php'); 
  ?>
  <script src="../js/validacion.js" charset="utf-8"></script>
</head>

<body>
  <div class="container">
    <div class="row vertical-align">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-panel panel panel-default">
          <?php
          define("conn", 1);
          if (!isset($_SESSION["usuario"])) {
            if (isset($_REQUEST['Submit'])) {
              include("conexion.php");
              $nombre = $_POST['nombre'];
              $apellidos = $_POST['apellidos'];
              $usuario = $_POST['usuario'];
              $password1 = $_POST['password1'];
              $password2 = $_POST['password2'];
              $email = $_POST['email'];
              $date = date('Y-m-d');
              // NOTE: Comprobamos si el usuario existe
              $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' OR Email = '$email'";
              $result = $conn->query($sql);
              if ($result->num_rows == 0) {
                $sql = "INSERT INTO usuarios (Nombre, Apellidos, Usuario, Pass, Email, Fecha_Registro)
                VALUES ('$nombre', '$apellidos', '$usuario', sha1('$password1'), '$email', '$date')";
                if (mysqli_query($conn, $sql)) {
                  header("Location: index.php");
                  exit();
                } else {
                  echo '<div class="alert alert-danger alert-dismissable">';
                  echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                  echo '<strong>Ups! Ha ocurrido un error en el registro.</strong>';
                  echo '</div>';
                }
                mysqli_close($conn);
              } else {
                echo '<div class="alert alert-danger alert-dismissable">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo '<strong>El usuario/email ya existe.</strong>';
                echo '</div>';
              }
            }
            ?>
          <div class="panel-heading">
            <h3 class="panel-title">Registrar Usuario</h3>
          </div>
          <div id="error"></div>
          <div class="panel-body">
            <form id="registro" action="registro.php" method="post">
              <fieldset>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Nombre" id="nombre" name="nombre" type="text" />
                </div>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" type="text" />
                </div>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Usuario" id="usuario" name="usuario" type="text" />
                </div>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Contraseña" id="password1" name="password1" type="password" />
                </div>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Repita la Contraseña" id="password2" name="password2" type="password" />
                </div>
                <div class="form-group">
                  <p></p>
                  <input class="form-control" placeholder="Email" id="email" name="email" type="email" />
                </div>
                <input class="btn btn-lg btn-danger btn-block" type="submit" id="submit" name="Submit" value="Registrarse" />
                <br>
                <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-danger btn-block" type="button" name="Volver" value="Volver atrás" /></a>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>
