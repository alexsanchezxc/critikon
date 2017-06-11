<?php
if (!defined("segu")) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION["idUsuario"];
$sql = "SELECT * FROM usuarios WHERE Id_Usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_array(MYSQLI_ASSOC);
  if (isset($_REQUEST['SubmitPass'])) {
    @$passwordAc = $_POST['passwordAc'];
    @$password1 = $_POST['password1'];
    @$password2 = $_POST['password2'];

    // NOTE: Comprobamos si la contraseña es correcta
    $sql1 = "SELECT * FROM usuarios WHERE Id_Usuario = '$username' AND Pass = sha1('$passwordAc')";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
      $sql2 = "UPDATE usuarios SET Pass = sha1('$password1') WHERE Id_Usuario = '$username'";
      if (mysqli_query($conn, $sql2)) {
        ?>
        <script type="text/javascript">
          $('.configuracion').removeClass('active');
          $('.seguridad').addClass('active');
          $('#configuracion').removeClass('active');
          $('#seguridad').addClass('active');
        </script>
        <?php
        echo '<div class="alert alert-success alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Su contraseña se cambió con exito.</strong>';
        echo '</div><br>';
      } else {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Su contraseña no se cambió con exito.</strong>';
        echo '</div><br>';
      }
      mysqli_close($conn);
    } else {
      ?>
      <script type="text/javascript">
        $('.configuracion').removeClass('active');
        $('.seguridad').addClass('active');
        $('#configuracion').removeClass('active');
        $('#seguridad').addClass('active');
      </script>
      <?php
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>La contraseña actual es incorrecta.</strong>';
      echo '</div><br>';
    }
  }
  ?>
  <form method="post">
    <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Contraseña Actual" id="passwordAc" name="passwordAc" type="password" required />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Nueva Contraseña" id="password1" name="password1" type="password" />
        <p class="p-margin"></p>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Repita la Contraseña" id="password2" name="password2" type="password" />
        <p class="p-margin"></p>
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" id="submitPass" name="SubmitPass" value="Guardar cambios" />
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
