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
  <link href="../css/index.css" rel="stylesheet" type="text/css">
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
        $moviesn = $tmdb->getNowPlayingMovies(1);
        $moviesp = $tmdb->getPopularMovies(1);
        echo '<div class="container">';
        echo '<h3 class="page-header"><a href="playingMovies.php?page=1" style="text-decoration: none;color: inherit">En Cartelera</a></h3>';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div id="Carousel" class="carousel slide">';
        echo '<ol class="carousel-indicators">';
        echo '<li data-target="#Carousel" data-slide-to="0" class="active"></li>';
        echo '<li data-target="#Carousel" data-slide-to="1"></li>';
        echo '<li data-target="#Carousel" data-slide-to="2"></li>';
        echo '<li data-target="#Carousel" data-slide-to="3"></li>';
        echo '<li data-target="#Carousel" data-slide-to="4"></li>';
        echo '</ol>';
        echo '<div class="carousel-inner">';
        echo '<div class="item active">';
        echo '<div class="row">';
        echo '<div class="col-md-4" style="width: 100%;text-align: center;">
        <a id="back" href="movie.php?id='.$moviesn[0]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesn[0]->get('backdrop_path') .');">
        <img src="'.$img.$moviesn[0]->getPoster().'" alt="'.$moviesn[0]->getTitle().'" style="height: 250px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
        <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesn[0]->getVoteAverage().'&nbsp</span>
        </a>
        <a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesn[0]->getTitle().'">'.$moviesn[0]->getTitle().'</a>
        </div>';
        echo '</div>';
        echo '</div>';
        for ($i = 1; $i < 5; $i++){
          echo '<div class="item">';
          echo '<div class="row">';
          echo '<div class="col-md-4" style="width: 100%;text-align: center;">
          <a id="back" href="movie.php?id='.$moviesn[$i]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesn[$i]->get('backdrop_path') .');">
          <img src="'.$img.$moviesn[$i]->getPoster().'" alt="'.$moviesn[$i]->getTitle().'" style="height: 250px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
          <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesn[$i]->getVoteAverage().'&nbsp</span>
          </a>
          <a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesn[$i]->getTitle().'">'.$moviesn[$i]->getTitle().'</a>
          </div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '<a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>';
        echo '<a data-slide="next" href="#Carousel" class="right carousel-control">›</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="container">';
        echo '<h3 class="page-header"><a href="popularMovies.php?page=1" style="text-decoration: none;color: inherit">Populares actualmente</a></h3>';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div id="Carousel2" class="carousel slide">';
        echo '<ol class="carousel-indicators">';
        echo '<li data-target="#Carousel2" data-slide-to="0" class="active"></li>';
        echo '<li data-target="#Carousel2" data-slide-to="1"></li>';
        echo '<li data-target="#Carousel2" data-slide-to="2"></li>';
        echo '<li data-target="#Carousel2" data-slide-to="3"></li>';
        echo '<li data-target="#Carousel2" data-slide-to="4"></li>';
        echo '</ol>';
        echo '<div class="carousel-inner">';
        echo '<div class="item active">';
        echo '<div class="row">';
        echo '<div class="col-md-4" style="width: 100%;text-align: center;">
        <a id="back" href="movie.php?id='.$moviesp[0]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesp[0]->get('backdrop_path') .');">
        <img src="'.$img.$moviesp[0]->getPoster().'" alt="'.$moviesp[0]->getTitle().'" style="height: 250px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
        <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesp[0]->getVoteAverage().'&nbsp</span>
        </a>
        <a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesp[0]->getTitle().'">'.$moviesp[0]->getTitle().'</a>
        </div>';
        echo '</div>';
        echo '</div>';
        for ($o = 1; $o < 5; $o++){
            echo '<div class="item">';
            echo '<div class="row">';
            echo '<div class="col-md-4" style="width: 100%;text-align: center;">
            <a id="back" href="movie.php?id='.$moviesp[$o]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesp[$o]->get('backdrop_path') .');">
            <img src="'.$img.$moviesp[$o]->getPoster().'" alt="'.$moviesp[$o]->getTitle().'" style="height: 250px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
            <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesp[$o]->getVoteAverage().'&nbsp</span>
            </a>
            <a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesp[$o]->getTitle().'">'.$moviesp[$o]->getTitle().'</a>
            </div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '<a data-slide="prev" href="#Carousel2" class="left carousel-control">‹</a>';
        echo '<a data-slide="next" href="#Carousel2" class="right carousel-control">›</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<h1 class="page-header">Descubrimientos</h1>';
        echo '</div>';
        echo '</div>';
        echo '<div class="row">';
        $movies = $tmdb->getDiscoverMovies(1);
        foreach($movies as $movie){
          include('movies.php');
        }
      }
?>
</div>
</div>
</div>
<!-- NOTE: #wrapper -->
</body>

</html>
