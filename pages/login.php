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
</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <?php
          if (!isset($_SESSION["usuario"])) {
              if (isset($_REQUEST['Submit'])) {

                  include("conexion.php");

                  $username = $_POST['usuario'];
                  $password = $_POST['password'];

                  $sql = "SELECT * FROM usuarios WHERE Usuario = '$username'";

                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      $row = $result->fetch_array(MYSQLI_ASSOC);
                      if ($row["Pass"] === sha1($password)) {
                           // Contraseña correcta
                           $year = time() + 31536000;
                           setcookie('remember_me', $username, $year);

                           $_SESSION['usuario'] = $row["Usuario"];

                           header("Location: index.php");
                           exit();
                      } else {
                            echo '<div class="alert alert-danger alert-dismissable">';
                            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo '<strong>Nombre o Contraseña incorrectos.</strong> Comprueba que la informacion este correcta.';
                            echo '</div>';
                      }
                  } else {
                    echo '<div class="alert alert-danger alert-dismissable">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo '<strong>Nombre o Contraseña incorrectos.</strong> Comprueba que la informacion este correcta.';
                    echo '</div>';
                  }
                  mysqli_close($conn);
              }
          ?>
            <div class="panel-heading">
              <h3 class="panel-title">Iniciar sesión</h3>
            </div>
            <div class="panel-body">
              <form action="login.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus required />
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Contraseña" name="password" type="password" required />
                  </div>
                  <div class="checkbox">
                    <label>
                      <input name="remember" type="checkbox" value="Remember_Me"/>Recordarme
                  </label>
                  </div>
                  <!-- Change this to a button or input when using this as a form -->
                  <!--<a href="index.php" class="btn btn-lg btn-success btn-block">Login</a>-->
                  <input class="btn btn-lg btn-danger btn-block" type="submit" name="Submit" value="Login" />
                </fieldset>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- NOTE: jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <!-- NOTE: Bootstrap Core JavaScript -->
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- NOTE: Metis Menu Plugin JavaScript -->
  <script src="../vendor/metisMenu/metisMenu.min.js"></script>
  <!-- NOTE: Custom Theme JavaScript -->
  <script src="../js/master.js"></script>
  <script src="../js/jquery.js"></script>
</body>

</html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>
