<?php
$getMovie = $tmdb->getMovie($idMovie);
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div class="row">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'" style="background-image: url('.$img.$getMovie->getPoster().');">';
echo '</div>';
echo '<div class="col-md-8">';
echo '<h2 class="page-header" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'">'.$getMovie->getTitle().'</h2>';
echo '<p class="flex">';
echo '<span><strong><i class="fa fa-calendar fa-fw"></i>'.$getMovie->get('release_date').'</strong></span>';
echo '<span><strong><i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'</strong></span>';
echo '</p>';
echo '<p>'.$getMovie->get('overview').'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<br>';
?>
