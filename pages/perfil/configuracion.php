<?php
$username = $_SESSION["usuario"];
$sql = "SELECT * FROM usuarios WHERE Usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);
  ?>
  <form>
    <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $row['Nombre'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" value="<?php echo $row['Apellidos'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Usuario" id="usuario" name="usuario" value="<?php echo $row['Usuario'] ?>" type="text" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $row['Email'] ?>" type="email" />
        <p class="p-margin"></p>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="submit" name="Submit" value="Guardar cambios" />
      <br>
      <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-sample btn-block" type="button" name="Volver" value="Volver atrás" /></a>
    </fieldset>
  </form>
  <?php
  if (isset($_REQUEST['Submit'])) {
    @$nombre = $_POST['nombre'];
    @$apellidos = $_POST['apellidos'];
    @$usuario = $_POST['usuario'];
    @$email = $_POST['email'];

    $sql = "UPDATE usuarios SET Nombre = $nombre, Apellidos = $apellidos, Usuario = $usuario, Email = $email WHERE Usuario = '$username'";
    $result = $conn->query($sql);
  }
} else {
  echo 'No hay ningun dato.';
}
?>
