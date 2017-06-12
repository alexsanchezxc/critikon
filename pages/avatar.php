<?php
if (!defined("avatar")) {
  header("Location: index.php");
  exit();
}
$username = $_SESSION["idUsuario"];
$directorio = "../assets/avatares/";
$result = $conn->query("SELECT * FROM usuarios WHERE Id_Usuario = '$username'");
while ($row=$result->fetch_array(MYSQLI_ASSOC)){
  $ruta_img = $row['Avatar'];
}
if (isset($_POST['enviar'])){
  $nombre_img = $_FILES['imagen']['name'];
  $tipo = $_FILES['imagen']['type'];
  $tamano = $_FILES['imagen']['size'];

  if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 1000000)){
    if (($_FILES["imagen"]["type"] == "image/gif")
    || ($_FILES["imagen"]["type"] == "image/jpeg")
    || ($_FILES["imagen"]["type"] == "image/jpg")
    || ($_FILES["imagen"]["type"] == "image/png")) {

      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

      $sql = "UPDATE usuarios SET Avatar = '$nombre_img' WHERE Id_Usuario = '$username'";
      if ($conn->query($sql)) {
        ?>
        <script type="text/javascript">
          $('.configuracion').removeClass('active');
          $('.avatar').addClass('active');
          $('#configuracion').removeClass('active');
          $('#avatar').addClass('active');
        </script>
        <?php
        echo '<div class="alert alert-success alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Se ha subido correctamente la imagen.</strong> Recargando...';
        echo '</div><br>';
        echo '<meta http-equiv="refresh" content="1">';
      } else {
        ?>
        <script type="text/javascript">
          $('.configuracion').removeClass('active');
          $('.avatar').addClass('active');
          $('#configuracion').removeClass('active');
          $('#avatar').addClass('active');
        </script>
        <?php
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<strong>Ups! Ha ocurrido un error en la subida.</strong>';
        echo '</div><br>';
      }
    } else {
      ?>
      <script type="text/javascript">
        $('.configuracion').removeClass('active');
        $('.avatar').addClass('active');
        $('#configuracion').removeClass('active');
        $('#avatar').addClass('active');
      </script>
      <?php
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>No se puede subir una imagen con ese formato.</strong>';
      echo '</div><br>';
    }
  } else {
    if($nombre_img == !NULL) {
      ?>
      <script type="text/javascript">
        $('.configuracion').removeClass('active');
        $('.avatar').addClass('active');
        $('#configuracion').removeClass('active');
        $('#avatar').addClass('active');
      </script>
      <?php
      echo '<div class="alert alert-danger alert-dismissable">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      echo '<strong>La imagen es demasiado grande.</strong>';
      echo '</div><br>';
    }
  }
}
mysqli_close($conn);
?>
<div class="col-md-3">
  <img id="avatarPerfil" class="poster" src="../assets/avatarI.png"/>
</div>
<div class="col-md-9">
  <form method="post" style="color: var(--color)" enctype="multipart/form-data">
    <fieldset>
      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input id="imagen" name="imagen" type="file" />
      </div>
      <input class="btn btn-lg btn-sample btn-block" type="submit" name="enviar" id="enviar" value="Subir Avatar" />
    </fieldset>
  </form>
</div>
<style media="screen">

#avatarPerfil {
  background-image: url('<?php echo $directorio.$ruta_img ?>');
}
</style>
