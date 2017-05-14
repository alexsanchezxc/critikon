<?php
$getMovie = $tmdb->getMovie($movie->getID());
echo '<div class="modal fade" id="'.$getMovie->getID().'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
echo '<h2 class="modal-title" id="myModalLabel">'.$getMovie->getTitle().'<small> '.$getMovie->get('release_date').'</small></h2>';
echo '</div>';
echo '<div class="modal-body">';
echo '<div class="container">';
echo '<div class="col-md-3">';
echo '<img class="poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'" style="background-image: url('.$img.$movie->getPoster().');">';
echo '</div>';
echo '<div class="col-md-3">';
echo '<p>'.$getMovie->get('overview').'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
echo '<button type="button" class="btn btn-primary">Guardar cambios</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>
