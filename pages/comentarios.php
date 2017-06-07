<?php
if (isset($_SESSION["idUsuario"])){
    define("conn", 1);
    include("conexion.php");
    $username = $_SESSION["idUsuario"];
    // NOTE: Guardamos la id de la pelicula en la base de datos
    $getMovie = $tmdb->getMovie($idMovie);
    $movie = $getMovie->getTitle();
    $sql = "INSERT IGNORE INTO peliculas (Id_Pelicula, Pelicula) VALUES ('$idMovie', '$movie')";
    mysqli_query($conn, $sql);

    if (isset($_POST['comentar'])) {
      $comentario = $_POST['comentario'];
      $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario) VALUES ('$username', '$idMovie', '$comentario', NOW())";
      if (mysqli_query($conn, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=movie.php?id='.$idMovie.'">';
      }
    }
    if (isset($_POST['reply'])) {
      $comentario = $_POST['comentario'];
      $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario, Reply) VALUES ('$username', '$idMovie', '$comentario', NOW(), '".$_GET['idC']."')";
      if (mysqli_query($conn, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=movie.php?id='.$idMovie.'">';
      }
    }
    ?>
    <div id="container">
      <ul id="comments">
        <?php
        $comentarios = mysqli_query($conn, "SELECT * FROM comentarios WHERE Reply = 0 AND Id_Pelicula = '$idMovie' ORDER BY Id_Comentario DESC");
        while($row = mysqli_fetch_array($comentarios)) {
          $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE Id_Usuario = '".$row['Id_Usuario']."'");
          $user = mysqli_fetch_array($usuario);
          ?>
          <li class="cmmnt">
            <div class="avatar">
              <img src="<?php echo $user['Avatar']; ?>" height="55" width="55">
            </div>
            <div class="cmmnt-content">
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
                  <li class="cmmnt">
                    <div class="avatar">
                      <img src="<?php echo $user2['Avatar']; ?>" height="55" width="55">
                    </div>
                    <div class="cmmnt-content">
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
    <form method="post">
      <div class="form-group">
        <label for="comentario">Comentar:</label>
        <textarea class="form-control" rows="5" name="comentario" id="comentario"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" <?php if (isset($_GET['idC'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?> value="Comentar" />
    </form>
<?php
} else {
?>
<div id="container">
  <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" value="Conectarse" />
  <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" value="Registrarse" />
</div>
<?php
}
?>
