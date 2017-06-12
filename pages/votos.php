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
  <h1 class="film-header">Votos</h1>
  <form method="post">
    <fieldset>
      <div class="form-group">
        <select name="voto" id="star-rating">
          <option value="">Selecciona tu voto</option>
          <option value="5">Excelente</option>
          <option value="4">Muy buena</option>
          <option value="3">Buena</option>
          <option value="2">Mediocre</option>
          <option value="1">Terrible</option>
        </select>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="votar" name="votar" value="Votar" />
    </fieldset>
  </form>
  <br>
  <script type="text/javascript">
  var starrating = new StarRating(document.getElementById('star-rating'));
  </script>
  <?php
  if (isset($_POST['votar'])){
    $votos = mysqli_query($conn, "SELECT * FROM votos WHERE Id_Usuario = '$username' AND Id_Pelicula = '$idMovie'");
    if (mysqli_num_rows($votos) > 0) {
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>Ya has votado esta pelicula.</strong>';
      echo '</div>';
    } else {
      $voto = $_POST['voto'];
      $sql = "INSERT INTO votos (Id_Usuario, Id_Pelicula, Voto) VALUES ('$username', '$idMovie', '$voto')";
      if (!mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Ups! Ha ocurrido un error.</strong>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-success alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Su voto se ha realizado correctamente.</strong> Refrescando...';
        echo '</div>';
        echo '<meta http-equiv="refresh" content="0">';
      }
    }
  }
}
?>
