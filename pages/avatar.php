<?php
if (!defined("avatar")) {
    header("Location: index.php");
    exit();
}
$result = $conn->query("SELECT * FROM usuarios");
while ($row=$result->fetch_array(MYSQLI_ASSOC)){
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/
    $ruta_img = $row['Avatar'];
}
if (isset($_POST['enviar'])){
    // Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];

    //Si existe imagen y tiene un tamaño correcto
    if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)){
       //indicamos los formatos que permitimos subir a nuestro servidor
       if (($_FILES["imagen"]["type"] == "image/gif")
       || ($_FILES["imagen"]["type"] == "image/jpeg")
       || ($_FILES["imagen"]["type"] == "image/jpg")
       || ($_FILES["imagen"]["type"] == "image/png")) {
          // Ruta donde se guardarán las imágenes que subamos
          $directorio = "../avatares/";
          // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
          move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

          /* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de
          datos para ejecutar nuestra sentencia SQL */

          /* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen
          el nombre de nuestra imagen */

          $sql = "UPDATE usuarios SET ruta_imagen = '$nombre_img' ";
          if ($conn->query($sql)) {
            echo '<div class="alert alert-success alert-dismissable">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo '<strong>Se ha subido correctamente la imágen.</strong>';
            echo '</div><br>';
            echo '<meta http-equiv="refresh" content="0">';
          } else {
            echo '<div class="alert alert-danger alert-dismissable">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo '<strong>Ups! Ha ocurrido un error en el registro.</strong>';
            echo '</div>';
          }
        } else {
           //si no cumple con el formato
           echo "No se puede subir una imagen con ese formato ";
        }
    } else {
       //si existe la variable pero se pasa del tamaño permitido
       if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
    }
}
mysqli_close($conn);
?>
<div>
   <img src="<?php echo $ruta_img; ?>" alt="" />
</div>
<form method="post">
  <fieldset>
    <div class="form-group">
      <label for="imagen">Imagen:</label>
      <input id="imagen" name="imagen" size="30" type="file" />
    </div>
    <input class="btn btn-lg btn-sample btn-block" type="submit" name="enviar" id="enviar" value="Subir Avatar" />
  </fieldset>
</form>
