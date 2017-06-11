<?php
session_start();
if (!isset($_SESSION['recup'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRITIKON - Nueva Contraseña</title>
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
            if (isset($_REQUEST['Submit'])){
                define("conn", 1);
                include("conexion.php");

                $password1 = $_POST['password1'];
                $usu = $_SESSION["idUsu"];
                $sql = "UPDATE usuarios SET Pass = sha1('$password1') WHERE Id_Usuario = '$usu'";

                if (mysqli_query($conn, $sql)) {
                  echo '<div class="alert alert-success alert-dismissable">';
                  echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                  echo '<strong>Su contraseña se cambió con exito.</strong>';
                  echo '</div>';
                } else {
                  echo '<div class="alert alert-danger alert-dismissable">';
                  echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                  echo '<strong>Su contraseña no se cambió con exito.</strong>';
                  echo '</div>';
                }
                mysqli_close($conn);
            }
            ?>
            <div class="panel-heading">
              <h3 class="panel-title">Restaurar contraseña</h3>
            </div>
            <div class="panel-body">
              <form action="restablecer.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <label for="password1">Nueva contraseña:</label>
                    <input type="password" class="form-control" id="password1" name="password1" required>
                    <p class="p-margin"></p>
                  </div>
                  <div class="form-group">
                    <label for="password2">Confirmar contraseña:</label>
                    <input type="password" class="form-control" id="password2" name="password2" required>
                    <p class="p-margin"></p>
                  </div>
                  <input class="btn btn-lg btn-sample btn-block" type="submit" id="submitPass" name="Submit" value="Cambiar contraseña" />
                  <br/>
                  <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-sample btn-block" type="button" name="Volver" value="Volver a Inicio" /></a>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
