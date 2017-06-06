<?php
define("conn", 1);
include("conexion.php");
$username = $_SESSION["idUsuario"];
?>
<form method="post">
  <div class="form-group">
    <label for="comentario">Comentar:</label>
    <textarea class="form-control" rows="5" name="comentario" id="comentario"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
  </div>
  <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" <?php if (isset($_GET['id'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?> value="Comentar" />
</form>
<?php
if (isset($_POST['comentar'])) {
  $comentario = $_POST['comentario'];
  $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario) VALUES ('$username', '$idMovie', '$comentario', NOW())";
  if (mysqli_query($conn, $sql)) {
    echo '<meta http-equiv="refresh" content="0">';
  }
}
if (isset($_POST['reply'])) {
  $comentario = $_POST['comentario'];
  $sql = "INSERT INTO comentarios (Id_Usuario, Id_Pelicula, Comentario, Fecha_Comentario, Reply) VALUES ('$username', '$idMovie', '$comentario', NOW(), '".$_GET['id']."')";
  if (mysqli_query($conn, $sql)) {
    echo '<meta http-equiv="refresh" content="0">';
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
            <a href="index.php?user=<?php echo $user['Usuario']; ?>&id=<?php echo $row['Id_Comentario']; ?>">
              Responder
            </a>
          </span>
        </div>
        <?php
        $contar = mysqli_num_rows(mysql_query($conn, "SELECT * FROM comentarios WHERE Id_Pelicula = '$idMovie' AND Reply = '".$row['Id_Comentario']."'"));
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
            <?php } } } ?>
          </li>
        </ul>
      </div>
