<?php
session_start();
include('../lib/tmdb-api.php');
@$tmdb = new TMDB($conf);
if ($_SESSION["usuario"]) {

    define("conn", 1);
    include("conexion.php");
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
      <link href="../css/tabs.css" rel="stylesheet">
      <!-- NOTE: Custom Fonts -->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <script src="../js/validacion.js" charset="utf-8"></script>
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
            include('movies.php');
          }
          echo '</div>';
        } else {
          echo '<div id="page-wrapper" style="background-color: var(--page-wrapper);">';
          echo '<div class="row">';
          echo '<div class="col-lg-12">';
          echo '<h1 class="page-header">Perfil</h1>';
          echo '</div>';
          echo '</div>';
          echo '<div class="row">';
          ?>
          <div class="panel-body">
            <div class="col-sm-3">
              <ul class="nav nav-tabs tabs-left">
                <li class="active"><a href="#configuracion" data-toggle="tab">Configuración</a></li>
                <li><a href="#seguridad" data-toggle="tab">Seguridad</a></li>
              </ul>
            </div>
            <div class="col-sm-9">
              <div class="tab-content">
                <div class="tab-pane active" id="configuracion">
                  <?php
                  define("conf", 1);
                  include('configuracion.php');
                  ?>
                </div>
                <div class="tab-pane" id="seguridad">

                </div>
              </div>
            </div>
          </div>
          <?php
          echo '</div>';
        }
        ?>
      </div>
    </div>
    <!-- NOTE: #wrapper -->
    </body>

    </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>
