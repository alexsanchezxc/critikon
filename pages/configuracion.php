<?php
if (!defined("conf")) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION["idUsuario"];
$sql = "SELECT * FROM usuarios WHERE Id_Usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);
  if (isset($_REQUEST['Submit'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];

    // NOTE: Comprobamos si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' OR Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $sql = "UPDATE usuarios SET Nombre = '$nombre', Apellidos = '$apellidos', Usuario = '$usuario', Email = '$email' WHERE Id_Usuario = '$username'";
      if (mysqli_query($conn, $sql)) {
         echo '<meta http-equiv="refresh" content="0;URL=perfil.php">';
      } else {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Ups! Ha ocurrido un error en el registro.</strong>';
        echo '</div>';
      }
      mysqli_close($conn);
    } else {
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>El usuario/email ya existe.</strong>';
      echo '</div>';
    }
  }
  ?>
  <form action="perfil.php" method="post">
    <fieldset>
      <div class="form-group">
        Nombre:
        <input class="form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $row['Nombre'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        Apellidos:
        <input class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" value="<?php echo $row['Apellidos'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        Usuario:
        <input class="form-control" placeholder="Usuario" id="usuario" name="usuario" value="<?php echo $row['Usuario'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        Email:
        <input class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $row['Email'] ?>" type="email" />
        <p class="p-margin"></p>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" name="Submit" value="Guardar cambios" />
      <br>
      <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-sample btn-block" type="button" name="Volver" value="Volver atrás" /></a>
    </fieldset>
  </form>
  <?php
} else {
  echo '<div class="alert alert-danger alert-dismissable">';
  echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
  echo '<strong>No hay ningun dato.</strong>';
  echo '</div>';
}
?>
