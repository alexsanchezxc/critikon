<?php
if (!defined("modal")){
    header("Location: index.php");
    exit();
}
$getMovie = $tmdb->getMovie($idMovie);
define("conn", 1);
include("conexion.php");
$numv = mysqli_query($conn, "SELECT Voto FROM votos WHERE Id_Pelicula = '$idMovie'");
$sumv = mysqli_query($conn, "SELECT SUM(Voto) as total FROM votos WHERE Id_Pelicula = '$idMovie'");
$row = mysqli_fetch_array($sumv, MYSQL_ASSOC);
$total = $row["total"];
$vnum = mysqli_num_rows($numv);
@$sum = $total / $vnum;
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div id="backdrop">';
echo '<div class="row informacion">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'">';
define("votos", 1);
include('votos.php');
echo '<br>';
echo '</div>';
echo '<div class="col-md-8">';
echo '<h1 class="film-header" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'"><strong>'.$getMovie->getTitle().'</strong></h1>';
echo '<p class="p-margin">';
echo '<span style="font-size: 27.5px;"><strong>IMDB<i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'</strong></span><br>';
echo '<span style="font-size: 27.5px;"><strong style="color: #FFB900;">CRITIKON<i class="fa fa-star fa-fw"></i>'.round($sum,1).'</strong></span>';
echo '</p>';
echo '<h1 class="film-header">Sinopsis</h1>';
echo '<p>'.$getMovie->get('overview').'</p>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-md-8">';
echo '<h1 class="film-header">Ficha</h1>';
echo '<ul id="ficha">';
echo '<li><b class="bDrop">Director:</b>';
$credits = $getMovie->get('credits');
echo $credits['crew'][0]['name'];
echo '</li>';
echo '<li><b class="bDrop">Generos: </b>';
$Genre = $getMovie->getGenres();
for ($i=0; $i < count($Genre); $i++) {
  if ($i > 0) {
    echo ', ';
  }
  echo $Genre[$i]->getName();
}
echo '</li>';
echo '<li><b class="bDrop">Fecha de lanzamiento:</b>';
echo $getMovie->get('release_date');
echo '</li>';
echo '<li><b class="bDrop">Compañias:</b>';
$Company = $getMovie->get('production_companies');
for ($i=0; $i < count($Company); $i++) {
  if ($i > 0) {
    echo ', ';
  }
  echo $Company[$i]['name'];
}
echo '</li>';
echo '<li><b class="bDrop">Paises:</b>';
$Countries = $getMovie->get('production_countries');
for ($i=0; $i < count($Countries); $i++) {
  if ($i > 0) {
    echo ', ';
  }
  echo $Countries[$i]['name'];
}
echo '</li>';
echo '<li><b class="bDrop">Dinero:</b>';
echo '$'.$getMovie->get('revenue');
echo '</li>';
echo '<li><b class="bDrop">Dinero invertido:</b>';
echo '$'.$getMovie->get('budget');
echo '</li>';
echo '<li><b class="bDrop">Duración:</b>';
echo $getMovie->get('runtime');
echo '</li>';
echo '<li><b class="bDrop">Estado:</b>';
echo $getMovie->get('status');
echo '</li>';
echo '</ul>';
echo '<br>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="panel-body">';
echo '<ul class="nav nav-tabs">';
echo '<li class="active"><a href="#actores" data-toggle="tab">Actores</a>';
echo '</li>';
echo '<li><a href="#trailer" data-toggle="tab">Trailers</a>';
echo '</li>';
echo '</ul>';
echo '<div class="tab-content">';
echo '<div class="tab-pane fade in active" id="actores">';
$credits = $getMovie->get('credits');
echo '<br>';
define("actor", 1);
include('actor.php');
echo '</div>';
echo '<div class="tab-pane fade" id="trailer">';
@$trailer = $getMovie->getTrailer();
echo '<br>';
echo '<div id="trailers" class="embed-responsive embed-responsive-16by9">';
echo '<center><iframe id="trailers" src="https://www.youtube.com/embed/'.$trailer.'" allowfullscreen></iframe><center>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="row" style="padding: 0 15px 0 15px; box-shadow: inset 0 25px 25px -25px rgba(0, 0, 0, 0.75);">';
define("comentarios", 1);
include('comentarios.php');
echo '</div>';
echo '</div>';
echo '</div>';
echo '<br>';
?>
<style media="screen">
#backdrop:before {
  background-image: url('<?php echo $img.$getMovie->get('backdrop_path') ?>');
}
.poster {
  background-image: url('<?php echo $img.$getMovie->getPoster() ?>');
}
</style>
