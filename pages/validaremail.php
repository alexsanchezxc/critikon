<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
  <div class="container">
    <div class="row vertical-align">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-panel panel panel-default">
          <?php
          if (!isset($_SESSION["usuario"])) {
            if (isset($_REQUEST['Submit'])){
              function generarLinkTemporal($idusuario, $username, $conn){
                 // Se genera una cadena para validar el cambio de contraseña
                 $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
                 $token = sha1($cadena);
                 // Se inserta el registro en la tabla tblreseteopass
                 $sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";
                 $resultado = $conn->query($sql);
                 if($resultado){
                    // Se devuelve el link que se enviara al usuario
                    $enlace = 'http://217.182.205.110/critikon/pages/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
                    return $enlace;
                 }
                 else
                    return "";
              }

              function enviarEmail($email, $link){
                 $mensaje = '<html>
                   <head>
                      <title>Restablece tu contraseña</title>
                   </head>
                   <body>
                     <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
                     <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
                     <p>
                       <strong>Enlace para restablecer tu contraseña</strong><br>
                       <a href="'.$link.'"> Restablecer contraseña </a>
                     </p>
                   </body>
                  </html>';

                 $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                 $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                 $cabeceras .= 'From: Codedrinks <support@critikon.com>' . "\r\n";
                 // Se envia el correo al usuario
                 mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
              }

              $email = $_POST['email'];

              if($email != ""){
                 define("conn", 1);
                 include("conexion.php");
                 $respuesta = '';

                 $sql = " SELECT * FROM usuarios WHERE Email = '$email' ";
                 print_r ($email);

                 $resultado = $conn->query($sql);
                 if($resultado->num_rows > 0){
                    $usuario = $resultado->fetch_assoc();
                    print_r ($usuario['Usuario']);
                    $linkTemporal = generarLinkTemporal($usuario['Id_Usuario'], $usuario['Usuario'],$conn);
                    if($linkTemporal != ""){
                      print_r ("Hola");
                      enviarEmail($email, $linkTemporal);
                      $respuesta = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
                    } else {
                      $respuesta = '<div class="alert alert-warning">Ya se ha enviado un email de recuperación. </div>';
                    }
                 } else {
                    $respuesta = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
                 }
              } else {
                 $respuesta = "Debes introducir el email de la cuenta";
              }
              echo $respuesta;
            }
            ?>
            <div class="panel-heading">
              <h3 class="panel-title">Recuperar Contraseña</h3>
            </div>
            <div class="panel-body">
              <form id="frmRestablecer" action="validaremail.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <label for="email"> Escribe el email asociado a tu cuenta para recuperar tu contraseña:</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                  </div>
                  <input class="btn btn-lg btn-sample btn-block" type="submit" name="Submit" value="Recuperar contraseña" />
                  <br>
                  <a style="text-decoration: none;" href="index.php"><input class="btn btn-lg btn-sample btn-block" type="button" name="Volver" value="Volver a Inicio" /></a>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>
  <?php
} else {
  header("Location: index.php");
  exit();
}
?>
