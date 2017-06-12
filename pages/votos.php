<?php
if (isset($_SESSION["idUsuario"])){
  $username = $_SESSION["idUsuario"];
  // NOTE: Guardamos la id de la pelicula en la base de datos
  $getMovie = $tmdb->getMovie($idMovie);
  $movie = $getMovie->getTitle();
  $sql = "INSERT IGNORE INTO peliculas (Id_Pelicula, Pelicula) VALUES ('$idMovie', '$movie')";
  if (!mysqli_query($conn, $sql)) {
    echo '<div class="alert alert-danger alert-dismissable">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    echo '<strong>Ups! Ha ocurrido un error.</strong>';
    echo '</div>';
  }
  ?>

  <?php
}
?>
