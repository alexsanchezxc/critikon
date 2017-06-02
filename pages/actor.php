<?php
if (!defined("actor")){
    header("Location: index.php");
    exit();
}
echo '<div class="col-md-6">';
echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Actor</th>';
echo '<th>Personaje</th>';
echo '<th>Nombre</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
for ($i=0; $i < 12;) {
  echo '<tr>';
  echo '<td><img class="actor" src="../assets/actor.png" style="background-image: url('.$img.$credits['cast'][$i]['profile_path'].');"></td>';
  echo '<td>'.$credits['cast'][$i]['character'].'</td>';
  echo '<td>'.$credits['cast'][$i]['name'].'</td>';
  echo '</tr>';
  $i = $i + 2;
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '<div class="col-md-6">';
echo '<div class="table-responsive">';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Actor</th>';
echo '<th>Personaje</th>';
echo '<th>Nombre</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
for ($i=1; $i < 12;) {
  echo '<tr>';
  echo '<td><img class="actor" src="../assets/actor.png" style="background-image: url('.$img.$credits['cast'][$i]['profile_path'].');"></td>';
  echo '<td>'.$credits['cast'][$i]['character'].'</td>';
  echo '<td>'.$credits['cast'][$i]['name'].'</td>';
  echo '</tr>';
  $i = $i + 2;
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
?>
