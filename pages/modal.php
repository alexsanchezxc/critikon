<?php
$getMovie = $tmdb->getMovie($idMovie);
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div id="backdrop">';
echo '<div class="row">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'">';
echo '</div>';
echo '<div class="col-md-8">';
echo '<h2 class="page-header" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'">'.$getMovie->getTitle().'</h2>';
echo '<p class="flex">';
echo '<span><strong>&nbsp<i class="fa fa-calendar fa-fw"></i>'.$getMovie->get('release_date').'</strong></span>';
echo '<span><strong><i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'&nbsp</strong></span>';
echo '</p>';
echo '<p>'.$getMovie->get('overview').'</p>';
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
