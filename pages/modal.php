<?php
if (!defined("modal")){
    header("Location: index.php");
    exit();
}
$getMovie = $tmdb->getMovie($idMovie);
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div id="backdrop">';
echo '<div class="row">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'">';
echo '</div>';
echo '<div class="col-md-8">';
echo '<h1 class="film-header" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'">'.$getMovie->getTitle().'</h1>';
echo '<p class="flex">';
echo '<span><strong>&nbsp<i class="fa fa-calendar fa-fw"></i>'.$getMovie->get('release_date').'</strong></span>';
echo '<span><strong><i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'&nbsp</strong></span>';
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
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="panel-body">';
echo '<ul class="nav nav-tabs">';
echo '<li class="active"><a href="#actores" data-toggle="tab">Actores</a>';
echo '</li>';
echo '</ul>';
echo '<div class="tab-content">';
echo '<div class="tab-pane fade in active" id="actores">';
$credits = $getMovie->get('credits');
echo '<br>';
define("actor", 1);
include('actor.php');
echo '</div>';
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
