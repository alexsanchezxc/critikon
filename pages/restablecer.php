<?php
$token = $_GET['token'];
$idusuario = $_GET['idusuario'];

$sql = "SELECT * FROM tblreseteopass WHERE token = '$token'";
$resultado = $conn->query($sql);

if( $resultado->num_rows > 0 ){
   $usuario = $resultado->fetch_assoc();
   if( sha1($usuario['idusuario']) == $idusuario ){
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRITIKON - Inicio</title>
  <!-- NOTE: Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- NOTE: MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- NOTE: Custom CSS -->
  <link id="pageColor" href="../css/white.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <!-- NOTE: Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <?php
  define("scripts", 1);
  include('scripts.php');
  ?>
</head>

 <body>
  <div class="container" role="main">
   <div class="col-md-4"></div>
   <div class="col-md-4">
    <form action="cambiarpassword.php" method="post">
     <div class="panel panel-default">
      <div class="panel-heading"> Restaurar contraseña </div>
      <div class="panel-body">
       <p></p>
       <div class="form-group">
        <label for="password"> Nueva contraseña </label>
        <input type="password" class="form-control" name="password1" required>
       </div>
       <div class="form-group">
        <label for="password2"> Confirmar contraseña </label>
        <input type="password" class="form-control" name="password2" required>
       </div>
       <input type="hidden" name="token" value="<?php echo $token ?>">
       <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
       <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
       </div>
      </div>
     </div>
    </form>
   </div>
  <div class="col-md-4"></div>
  </div> <!-- /container -->

  <script src="js/jquery-1.11.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>
<?php
   }
   else{
     header('Location:index.html');
   }
 }
 else{
     header('Location:index.html');
 }
?>
