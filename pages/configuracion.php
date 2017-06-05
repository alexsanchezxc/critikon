<?php
session_start();
include('../lib/tmdb-api.php');
@$tmdb = new TMDB($conf);
/*define("conn", 1);
include("conexion.php");*/
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
  </head>

  <body>
    <div id="wrapper">
      <!-- NOTE: Navigation -->
      <?php
    define("nav", 1);
    define("movies", 1);
    include('nav.php');
    ?>
        <?php
      $img = 'https://image.tmdb.org/t/p/original';
      if (isset($_REQUEST['boton'])) {
        $title = $_REQUEST['movieSearch'];
        $movies = $tmdb->searchMovie($title);
        // NOTE: Devuleve el array de Movie Object
        echo '<div id="page-wrapper">';
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h1 class="page-header">Películas</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        foreach($movies as $movie){
          define("movies", 1);
          include('movies.php');
        }
      } else {
        echo '<div id="page-wrapper" style="background-color: var(--color4);">';
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h1 class="page-header">Perfil</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';

        /*$usuario = array();
        $username = $_SESSION["usuario"];
        $sql = "SELECT * FROM usuarios WHERE Usuario = '$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);*/
        ?>
          <div class="panel-body">
            <form>
              <fieldset>
                <div class="form-group">
                  <input class="form-control" id="nombre" name="nombre" type="text" />
                  <p class="p-margin"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" type="text" />
                  <p class="p-margin"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Usuario" id="usuario" name="usuario" type="text" />
                  <p class="p-margin"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Email" id="email" name="email" type="email" />
                  <p class="p-margin"></p>
                </div>
                <input class="btn btn-lg btn-danger btn-block" type="submit" id="submit" name="Submit" value="Registrarse" />
                <br>
                <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-danger btn-block" type="button" name="Volver" value="Volver atrás" /></a>
              </fieldset>
            </form>
          </div>
          <?php
          /*} else {
            echo 'No hay ningun dato.';
          }*/
      }
      ?>
    </div>
    </div>
    <!-- NOTE: #wrapper -->
  </body>

  </html>