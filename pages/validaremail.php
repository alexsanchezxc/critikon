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
  <title>Recuperar Contraseña</title>
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
</head>

<body>
  <div class="container">
    <div class="row vertical-align">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-panel panel panel-default">
          <?php
          if (!isset($_SESSION["usuario"])) {
            if (isset($_REQUEST['Submit'])){
              define("conn", 1);
              include("conexion.php");
              $username = $_POST['usuario'];
              $email = $_POST['email'];
              $sql = "SELECT * FROM usuarios WHERE Usuario = '$username' AND Email = '$email'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  $row = $result->fetch_array(MYSQLI_ASSOC);
                  $_SESSION['idUsu'] = $row["Id_Usuario"];
                  $_SESSION['recup'] = true;
                  header("Location: restablecer.php");
                  exit();
              } else {
                $respuesta = '<div class="alert alert-warning">No existe una cuenta asociada a ese correo y usuario.</div>';
                echo $respuesta;
              }
              mysqli_close($conn);
            }
            ?>
            <div class="panel-heading">
              <h3 class="panel-title">Recuperar Contraseña</h3>
            </div>
            <div class="panel-body">
              <form action="validaremail.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <label for="email">Escribe el email asociado a tu cuenta para recuperar tu contraseña:</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Escribe el usuario asociado a tu cuenta para recuperar  tu contraseña:</label>
                    <input type="text" id="usuario" class="form-control" name="usuario" required>
                  </div>
                  <input class="btn btn-lg btn-sample btn-block" type="submit" name="Submit" value="Recuperar contraseña" />
                  <br>
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
  <?php
} else {
  header("Location: index.php");
  exit();
}
?>
