<?php
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
  <link id="pageColor" href="../css/black.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <!-- NOTE: Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="wrapper">
    <!-- NOTE: Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CRITIKON</a>
      </div>
      <!-- NOTE: navbar-header -->
      <ul class="nav navbar-top-links navbar-right">
        <li>
          <div class="material-switch">
            <input id="switch" name="switch" type="checkbox" />
            <label for="switch" class="label-default"></label>
          </div>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- NOTE: dropdown-user -->
        </li>
        <!-- NOTE: dropdown -->
      </ul>
      <!-- NOTE: navbar-top-links -->
      <div class="sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <form method="get" class="input-group custom-search-form">
                <input type="text" class="form-control" name="movieSearch" placeholder="Buscar pelicula...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit" name="boton">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </form>
              <!-- NOTE: input-group -->
            </li>
            <li>
              <a href="index.php"><i class="fa fa-film fa-fw"></i> Inicio</a>
            </li>
          </ul>
        </div>
        <!-- NOTE: sidebar-collapse -->
      </div>
      <!-- NOTE: navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <?php
          if (isset($_REQUEST['boton'])) {
            $title = $_REQUEST['movieSearch'];
            $img = 'https://image.tmdb.org/t/p/original';
          	$movies = $tmdb->searchMovie($title);
            // NOTE: Devuleve el array de Movie Object
            echo '<div class="row">';
            echo '<div class="col-lg-12">';
            echo '<h1 class="page-header">Peliculas</h1>';
            echo '</div>';
            echo '<!-- NOTE: col-lg-12 -->';
            echo '</div>';
            echo '<div class="row">';
          	foreach($movies as $movie){
              echo '<div class="movieList col-xs-6 col-sm-6 col-md-4 col-lg-3">';
              echo '<div data-toggle="modal" data-target="#myModal" class="thumbnail">';
              echo '<img class="poster" src="../assets/poster.png" alt="'.$movie->getTitle().'" style="background-image: url('.$img.$movie->getPoster().');">';
              echo '<div class="caption">';
              echo '<a href="#"><h4 data-toggle="tooltip" data-placement="top" title="'.$movie->getTitle().'">'.$movie->getTitle().'</h4></a>';
              echo '<h6 data-toggle="tooltip" data-placement="bottom" title="'.$movie->get('release_date').'"><strong>Año:</strong> '.$movie->get('release_date').'</h6>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          	}
          } else {
            $img = 'https://image.tmdb.org/t/p/original';
            // NOTE: (En Proceso)
            // NOTE: Cambiar el campo() por $page y asignarlo a un boton
            // NOTE: para hacer una paginacion de peliculas
          	$movies = $tmdb->getNowPlayingMovies();
            // NOTE: Devuleve el array de Movie Object
            echo '<div class="row">';
            echo '<div class="col-lg-12">';
            echo '<h1 class="page-header">Peliculas </h1>';
            echo '</div>';
            echo '<!-- NOTE: col-lg-12 -->';
            echo '</div>';
            echo '<div class="row">';
          	foreach($movies as $movie){
              echo '<div class="movieList col-xs-6 col-sm-6 col-md-4 col-lg-3">';
              echo '<div data-toggle="modal" data-target="#myModal" class="thumbnail">';
              echo '<img class="poster" src="../assets/poster.png" alt="'.$movie->getTitle().'" style="background-image: url('.$img.$movie->getPoster().');">';
              echo '<div class="caption">';
              echo '<a href="#"><h4 data-toggle="tooltip" data-placement="top" title="'.$movie->getTitle().'">'.$movie->getTitle().'</h4></a>';
              echo '<h6><strong>Año:</strong> '.$movie->get('release_date').'</h6>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
        }
        ?>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h2 class="modal-title" id="myModalLabel">{{movie.title}}<small> {{movie.release_date}}</small></h2>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="col-md-3">
                  <img class="poster" src="../assets/poster.png" alt="{{movie.title}}" style="background-image: url('https://image.tmdb.org/t/p/original{{movie.poster_path}}');">
                </div>
                <div class="col-md-3">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
          </div>
          <!-- NOTE: modal-content -->
        </div>
        <!-- NOTE: modal-dialog -->
      </div>
      <!-- NOTE: modal -->
    </div>
    <!-- NOTE: #wrapper -->

    <!-- NOTE: jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- NOTE: Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- NOTE: Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- NOTE: Custom Theme JavaScript -->
    <script src="../js/master.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/jquery.js"></script>
</body>

</html>
