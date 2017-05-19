<?php
  echo '<div class="movieList col-xs-6 col-sm-6 col-md-4 col-lg-3">';
  echo '<a href="movie.php?id='.$movie->getID().'">';
  echo '<div class="thumbnail">';
  echo '<img class="posters" src="../assets/poster.png" alt="'.$movie->getTitle().'" style="background-image: url('.$img.$movie->getPoster().');">';
  echo '<div class="caption">';
  echo '<h4 data-toggle="tooltip" data-placement="top" title="'.$movie->getTitle().'">&nbsp'.$movie->getTitle().'</h4>';
  echo '<p class="flex" data-toggle="tooltip" data-placement="bottom" title="'.$movie->get('release_date').' | '.$movie->getVoteAverage().'">';
  echo '<span>&nbsp<i class="fa fa-calendar fa-fw"></i>'.$movie->get('release_date').'</span>';
  echo '<span><i class="fa fa-star fa-fw"></i>'.$movie->getVoteAverage().'&nbsp</span>';
  echo '</p>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
  echo '</div>';
?>
