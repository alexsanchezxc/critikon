<br>
<?php
if (isset($_SESSION["idUsuario"])){
  define("conn", 1);
  include("conexion.php");
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

  if (isset($_POST['comentar'])) {
    $comentario = $_POST['comentario'];
    $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario) VALUES ('$username', '$idMovie', '$comentario', NOW())";
    if (!mysqli_query($conn, $sql)) {
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>Ups! Ha ocurrido un error.</strong>';
      echo '</div>';
    } else {
      echo '<meta http-equiv="refresh" content="0;">';
      ?>
      <script type="text/javascript">
      $('#formComment');
      $(window).on('beforeunload', function(){
        $('.actores').removeClass('active');
        $('.comentarios').addClass('active');
        $('#actores').removeClass('in active');
        $('#comentarios').addClass('in active');
      });
      </script>
      <?php
    }
  }
  if (isset($_POST['reply'])) {
    $comentario = $_POST['comentario'];
    $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario, Reply) VALUES ('$username', '$idMovie', '$comentario', NOW(), '".$_GET['idC']."')";
    if (!mysqli_query($conn, $sql)) {
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>Ups! Ha ocurrido un error.</strong>';
      echo '</div>';
    } else {
    }
  }
  ?>
  <br>
  <div id="container">
    <ul id="comments">
      <?php
      $comentarios = mysqli_query($conn, "SELECT * FROM comentarios WHERE Reply = 0 AND Id_Pelicula = '$idMovie' ORDER BY Id_Comentario DESC");
      if (mysqli_num_rows($comentarios) == 0) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<center><strong>No hay ningun comentario</strong></center>';
        echo '</div>';
      }
      while($row = mysqli_fetch_array($comentarios)) {
        $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE Id_Usuario = '".$row['Id_Usuario']."'");
        $user = mysqli_fetch_array($usuario);
        ?>
        <li class="comment">
          <div class="avatar">
            <img class="img-circle" src="<?php echo $user['Avatar']; ?>" height="55" width="55">
          </div>
          <div class="comment-content">
            <header>
              <a href="#" class="userlink"><?php echo $user['Usuario']; ?></a> - <span class="pubdate"><?php echo $row['Fecha_Comentario']; ?></span>
            </header>
            <p>
              <?php echo $row['Comentario']; ?>
            </p>
            <span>
              <a href="movie.php?id=<?php echo $idMovie ?>&user=<?php echo $user['Usuario']; ?>&idC=<?php echo $row['Id_Comentario']; ?>">
                Responder
              </a>
            </span>
          </div>
          <?php
          $contar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comentarios WHERE Id_Pelicula = '$idMovie' AND Reply = '".$row['Id_Comentario']."'"));
          if($contar != '0') {
            $reply = mysqli_query($conn, "SELECT * FROM comentarios WHERE Id_Pelicula = '$idMovie' AND Reply = '".$row['Id_Comentario']."' ORDER BY Id_Comentario DESC");
            while($rep=mysqli_fetch_array($reply)) {
              $usuario2 = mysqli_query($conn, "SELECT * FROM usuarios WHERE Id_Usuario = '".$rep['Id_Usuario']."'");
              $user2 = mysqli_fetch_array($usuario2);
              ?>
              <ul class="replies">
                <li class="comment">
                  <div class="avatar">
                    <img class="img-circle" src="<?php echo $user2['Avatar']; ?>" height="55" width="55">
                  </div>
                  <div class="comment-content">
                    <header>
                      <a href="#" class="userlink"><?php echo $user2['Usuario']; ?></a> - <span class="pubdate"><?php echo $rep['Fecha_Comentario']; ?></span>
                    </header>
                    <p>
                      <?php echo $rep['Comentario']; ?>
                    </p>
                  </div>
                </li>
              </ul>
              <?php
            }
          }
        }
        ?>
      </li>
    </ul>
  </div>
  <br>
  <div id="container">
    <form id="formComment" method="post">
      <div class="form-group">
        <label for="comentario">Comentar:</label>
        <textarea class="form-control" rows="5" name="comentario" id="comentario" required><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user'].' '; ?><?php } ?></textarea>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" <?php if (isset($_GET['idC'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?> value="Comentar" />
    </form>
  </div>
  <?php
} else {
  ?>
  <br>
  <div id="container">
    <center>
      <a style="text-decoration: none;" href="login.php"><input class="btn btn-sample btn-lg" type="button" name="Volver" value="Conectarse" /></a>
      <a style="text-decoration: none;" href="registro.php"><input class="btn btn-sample btn-lg" type="button" name="Volver" value="Registrarse" /></a>
    </center>
  </div>
  <?php
}
?>
