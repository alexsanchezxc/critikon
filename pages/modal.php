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
$votos = $total / $vnum;
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div id="backdrop">';
echo '<div class="row informacion">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'">';
echo '<h1 class="film-header">Votos</h1>';
define("votos", 1);
include('votos.php');
echo '</div>';
echo '<div class="col-md-8">';
echo '<h1 class="film-header" style="margin: 0;" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'"><strong>'.$getMovie->getTitle().'</strong></h1>';
echo '<p class="p-margin">';
echo '<span style="font-size: 27.5px;"><strong>IMDB<i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'</strong></span><br>';
echo '<span style="font-size: 27.5px;"><strong style="color: #FFB900;">CRITIKON<i class="fa fa-star fa-fw"></i>'.$votos.'</strong></span>';
echo '</p>';
echo '<p>'.$getMovie->get('overview').'</p>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-md-4">';
echo '<h1 class="film-header">Generos</h1>';
echo '<ul>';
foreach ($getMovie->getGenres() as $Genre) {
  echo '<li>'.$Genre->getName().'</li>';
}
echo '</ul>';
echo '</div>';
echo '<div class="col-md-4">';
echo '<h1 class="film-header">Ficha</h1>';
echo '<ul>';
echo '<li>Idiomas hablados: ';
$Lang = $getMovie->get('spoken_languages');
for ($i=0; $i < count($Lang); $i++) {
  echo $Lang[$i]['name'];
}
echo '</li>';
echo '</ul>';
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
