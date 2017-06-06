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
    <link href="../css/slideshow.css" rel="stylesheet" type="text/css">
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
        $movies = $tmdb->getNowPlayingMovies(1);
        /*echo '<h2 class="w3-center">Manual Slideshow</h2>';
        echo '<div class="w3-content w3-display-container" style="background-color: #6f2323;">';
        for ($i = 1; $i < 5; $i++){
            echo '<img class="mySlides" src="../assets/poster.png" alt="'.$movies[$i]->getTitle().'" data-toggle="tooltip" data-placement="bottom" style="background-image: url('.$img.$movies[$i]->getPoster().');max-height: 510px;width: 100%;background-size: 350px;background-position: center;background-repeat: no-repeat;display: inline;">';
        }
        echo '<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094';
        echo '</button>';
        echo '<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095';
        echo '</button>';
        echo '</div>';*/

        echo '<div class="container">';
            echo '<div class="row">';
		            echo '<div class="col-md-12">';
                    echo '<div id="Carousel" class="carousel slide">';
                          echo '<ol class="carousel-indicators">';
                              echo '<li data-target="#Carousel" data-slide-to="0" class="active"></li>';
                              echo '<li data-target="#Carousel" data-slide-to="1"></li>';
                              echo '<li data-target="#Carousel" data-slide-to="2"></li>';
                          echo '</ol>';
                  
                          echo '<div class="carousel-inner">';
                              echo '<div class="item active">';
                                      echo '<div class="row">';
                                      echo '<div class="col-md-4" style="width: 100%;"><a href="#" class="thumbnail"><img src="../assets/poster.png"" alt="'.$movies[0]->getTitle().'" style="background-image: url('.$img.$movies[0]->getPoster().');height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;" /></a></div>';
                                      echo '</div>';
                                  echo '</div>';
                              for ($i = 1; $i < 5; $i++){
                                  echo '<div class="item">';
                                      echo '<div class="row">';
                                      echo '<div class="col-md-4" style="width: 100%;"><a href="#" class="thumbnail"><img src="../assets/poster.png"" alt="'.$movies[$i]->getTitle().'" style="background-image: url('.$img.$movies[$i]->getPoster().');height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;" /></a></div>';
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
      }
      ?>
      </div>
    </div>
    <!-- NOTE: #wrapper -->
  </body>

  </html>