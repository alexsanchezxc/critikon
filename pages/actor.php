<?php
echo '<h1 class="page-header">Actores</h1>';
for ($i=0; $i < 8; $i++) {
  echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">';
  echo '<div class="thumbnail">';
  echo '<img class="posters" src="../assets/poster.png" alt="'.$credits['cast'][$i]['character'].'" style="background-image: url('.$img.$credits['cast'][$i]['profile_path'].');">';
  echo '<div class="caption">';
  echo '<p class="flex" data-toggle="tooltip" data-placement="bottom" title="'.$credits['cast'][$i]['character'].' | '.$credits['cast'][$i]['name'].'">';
  echo '<span>'.$credits['cast'][$i]['character'].'</span>';
  echo '<br>';
  echo '<span>'.$credits['cast'][$i]['name'].'</span>';
  echo '</p>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
?>
<!--
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#actores" aria-expanded="false" class="collapsed">Actores</a>
    </h3>
  </div>
  <div id="actores" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
    <div class="panel-body">
    </div>
  </div>
</div>
-->
