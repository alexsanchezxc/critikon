
<?php
session_start();
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
  <title>En Cartelera</title>
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
        // NOTE: (En Proceso)
        // NOTE: Cambiar el campo() por $page y asignarlo a un boton
        // NOTE: para hacer una paginacion de Películas
        $movies = $tmdb->getNowPlayingMovies(1);
        if (@$_GET['page'] > 0){
          $movies = $tmdb->getNowPlayingMovies($_GET['page']);
        }
        // NOTE: Devuleve el array de Movie Object
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h1 class="page-header">En Cartelera</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        foreach($movies as $movie){
          include('movies.php');
        }
      }
      ?>
    </div>
    <center>
      <ul class="pagination pagination-lg">
          <li id="page1" class="active"><a href="playingMovies.php?page=1">1</a></li>
          <li id="page2" ><a href="playingMovies.php?page=2">2</a></li>
          <li id="page3" ><a href="playingMovies.php?page=3">3</a></li>
          <li id="page4" ><a href="playingMovies.php?page=4">4</a></li>
          <li id="page5" ><a href="playingMovies.php?page=5">5</a></li>
      </ul>
    </center>
  </div>
  <!-- NOTE: #wrapper -->
  <script type="text/javascript">
  var pag = <?php echo $_GET['page']; ?>;
  if (pag == 1) {
      $("#page1").addClass("active");
      $("#page2").removeClass();
      $("#page3").removeClass();
      $("#page4").removeClass();
      $("#page5").removeClass();
  } else if (pag == 2) {
      $("#page1").removeClass();
      $("#page2").addClass("active");
      $("#page3").removeClass();
      $("#page4").removeClass();
      $("#page5").removeClass();
  } else if (pag == 3) {
      $("#page1").removeClass();
      $("#page2").removeClass();
      $("#page3").addClass("active");
      $("#page4").removeClass();
      $("#page5").removeClass();
  } else if (pag == 4) {
      $("#page1").removeClass();
      $("#page2").removeClass();
      $("#page3").removeClass();
      $("#page4").addClass("active");
      $("#page5").removeClass();
  } else if (pag == 5) {
      $("#page1").removeClass();
      $("#page2").removeClass();
      $("#page3").removeClass();
      $("#page4").removeClass();
      $("#page5").addClass("active");
  }
  </script>
</body>
</html>
