<?php
session_start();
@$idMovie = $_GET['id'];
include('../lib/tmdb-api.php');
@$tmdb = new TMDB($conf);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Peliculas</title>
  <!-- NOTE: Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- NOTE: MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- NOTE: Custom CSS -->
  <link id="pageColor" href="../css/white.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/comentarios.css">
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
    define("modal",1);
    include('nav.php');
    ?>
    <div id="page-wrapper">
      <?php
      $img = 'https://image.tmdb.org/t/p/original';
      if (isset($_REQUEST['boton'])) {
        $title = $_REQUEST['movieSearch'];
        $movies = $tmdb->searchMovie($title);
        // NOTE: Devuleve el array de Movie Object
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h1 class="page-header">Películas</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        foreach($movies as $movie){
          include('movies.php');
        }
      } else {
        if ($idMovie == "") {
          exit();
        }
        include('modal.php');
      }
      ?>
    </div>
  </div>
  <!-- NOTE: #wrapper -->
</body>

</html>
