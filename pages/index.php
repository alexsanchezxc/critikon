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
    <link href="../css/slide.css" rel="stylesheet" type="text/css">
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
        $moviesu = $tmdb->getUpcomingMovies(1);
        $moviest = $tmdb->getTopRatedMovies(1);
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
              echo '<h3 class="page-header"><a href="playingMovies.php" style="text-decoration: none;color: inherit">En Cartelera Hoy</a></h3>';
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
                                                        <img src="'.$img.$moviesn[0]->getPoster().'" alt="'.$moviesn[0]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
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
                                                          <img src="'.$img.$moviesn[$i]->getPoster().'" alt="'.$moviesn[$i]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
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
              echo '<h3 class="page-header"><a href="popularMovies.php" style="text-decoration: none;color: inherit">Populares actualmente</a></h3>';
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
                                                                    <img src="'.$img.$moviesp[0]->getPoster().'" alt="'.$moviesp[0]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
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
                                                                        <img src="'.$img.$moviesp[$o]->getPoster().'" alt="'.$moviesp[$o]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
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

        echo '<div class="container">';
              echo '<h3 class="page-header"><a href="upcomingMovies.php" style="text-decoration: none;color: inherit">Próximamente</a></h3>';
              echo '<div class="row">';
                    echo '<div class="col-md-12">';
                          echo '<div id="Carousel3" class="carousel slide">';
                                echo '<ol class="carousel-indicators">';
                                      echo '<li data-target="#Carousel3" data-slide-to="0" class="active"></li>';
                                      echo '<li data-target="#Carousel3" data-slide-to="1"></li>';
                                      echo '<li data-target="#Carousel3" data-slide-to="2"></li>';
                                      echo '<li data-target="#Carousel3" data-slide-to="3"></li>';
                                      echo '<li data-target="#Carousel3" data-slide-to="4"></li>';
                                echo '</ol>';
                      
                                echo '<div class="carousel-inner">';
                                      echo '<div class="item active">';
                                            echo '<div class="row">';
                                                  echo '<div class="col-md-4" style="width: 100%;text-align: center;">
                                                              <a id="back" href="movie.php?id='.$moviesu[0]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesu[0]->get('backdrop_path') .');">
                                                                    <img src="'.$img.$moviesu[0]->getPoster().'" alt="'.$moviesu[0]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
                                                                    <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesu[0]->getVoteAverage().'&nbsp</span>
                                                              </a><a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesu[0]->getTitle().'">'.$moviesu[0]->getTitle().'</a>
                                                        </div>';
                                            echo '</div>';
                                      echo '</div>';
                                    
                                      for ($u = 1; $u < 5; $u++){
                                            echo '<div class="item">';
                                                  echo '<div class="row">';
                                                        echo '<div class="col-md-4" style="width: 100%;text-align: center;"><a id="back" href="movie.php?id='.$moviesu[$u]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviesu[$u]->get('backdrop_path') .');"><img src="'.$img.$moviesu[$u]->getPoster().'" alt="'.$moviesu[$u]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" /><span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviesu[$u]->getVoteAverage().'&nbsp</span></a><a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviesu[$u]->getTitle().'">'.$moviesu[$u]->getTitle().'</a></div>';
                                                  echo '</div>';
                                            echo '</div>';
                                      }

                                echo '</div>';

                                echo '<a data-slide="prev" href="#Carousel3" class="left carousel-control">‹</a>';
                                echo '<a data-slide="next" href="#Carousel3" class="right carousel-control">›</a>';
                          echo '</div>';
                    echo '</div>';
              echo '</div>';
        echo '</div>';

        echo '<div class="container">';
              echo '<h3 class="page-header"><a href="topratedMovies.php" style="text-decoration: none;color: inherit">Mejor Valoradas</a></h3>';
              echo '<div class="row">';
                    echo '<div class="col-md-12">';
                          echo '<div id="Carousel4" class="carousel slide">';
                                echo '<ol class="carousel-indicators">';
                                      echo '<li data-target="#Carousel4" data-slide-to="0" class="active"></li>';
                                      echo '<li data-target="#Carousel4" data-slide-to="1"></li>';
                                      echo '<li data-target="#Carousel4" data-slide-to="2"></li>';
                                      echo '<li data-target="#Carousel4" data-slide-to="3"></li>';
                                      echo '<li data-target="#Carousel4" data-slide-to="4"></li>';
                                echo '</ol>';
                      
                                echo '<div class="carousel-inner">';
                                      echo '<div class="item active">';
                                            echo '<div class="row">';
                                                  echo '<div class="col-md-4" style="width: 100%;text-align: center;">
                                                              <a id="back" href="movie.php?id='.$moviest[0]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviest[0]->get('backdrop_path') .');">
                                                                    <img src="'.$img.$moviest[0]->getPoster().'" alt="'.$moviest[0]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />
                                                                    <span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviest[0]->getVoteAverage().'&nbsp</span>
                                                              </a>
                                                              <a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviest[0]->getTitle().'">'.$moviest[0]->getTitle().'</a>
                                                       </div>';
                                            echo '</div>';
                                      echo '</div>';
                                    
                                      for ($a = 1; $a < 5; $a++){
                                            echo '<div class="item">';
                                                  echo '<div class="row">';
                                                        echo '<div class="col-md-4" style="width: 100%;text-align: center;">';
                                                              echo '<a id="back" href="movie.php?id='.$moviest[$a]->getID().'" class="thumbnail" style="background-image: url('. $img.$moviest[$a]->get('backdrop_path') .');">';
                                                                    echo '<img src="'.$img.$moviest[$a]->getPoster().'" alt="'.$moviest[$a]->getTitle().'" style="height: 370px;background-size: 250px;background-repeat: no-repeat;background-position: center;border: 1px solid black;" />';
                                                                    echo '<span id="puntos"><i class="fa fa-star fa-fw"></i>'.$moviest[$a]->getVoteAverage().'&nbsp</span>';
                                                              echo '</a>';
                                                              echo '<a id="tituloi" data-toggle="tooltip" data-placement="bottom" title="'.$moviest[$a]->getTitle().'">'.$moviest[$a]->getTitle().'</a>';
                                                        echo '</div>';
                                                  echo '</div>';
                                            echo '</div>';
                                      }

                                echo '</div>';

                                echo '<a data-slide="prev" href="#Carousel4" class="left carousel-control">‹</a>';
                                echo '<a data-slide="next" href="#Carousel4" class="right carousel-control">›</a>';
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