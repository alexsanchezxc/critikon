$(document).ready(function() {
  //variables globales
  var usuario = $("#usuario");
  var nombre = $("#nombre");
  var apellidos = $("#apellidos");
  var password1 = $("#password1");
  var password2 = $("#password2");
  var email = $("#email");
});

//funciones de validacion
function validateUsuario() {
  //NO cumple longitud minima
  if (usuario.val().length < 4) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>El usuario debe ser de mínimo 4 caracteres.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI longitud,
  else {
    return true;
  }
}

function validateNombre() {
  //NO cumple longitud minima
  if (nombre.val().length < 1) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>El nombre es obligatorio.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI longitud,
  else {
    return true;
  }
}

function validateApellidos() {
  //NO cumple longitud minima
  if (apellidos.val().length < 1) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>Debes introducir al menos un apellido.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI longitud,
  else {
    return true;
  }
}

function validatePassword1() {
  //NO tiene minimo de 5 caracteres o mas de 12 caracteres
  if (password1.val().length < 5) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>La contraseña debe ser de minimo 5 caracteres.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI longitud, NO VALIDO numeros y letras
  else if (!password1.val().match(/^[0-9a-zA-Z]+$/)) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>La contraseña debe contener números y caracteres.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI rellenado, SI email valido
  else {
    return true;
  }
}

function validatePassword2() {
  //NO son iguales las password
  if (password1.val() != password2.val()) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>Las contraseñas no son iguales.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI son iguales
  else {
    return true;
  }
}

function validateEmail() {
  //NO hay nada escrito
  if (email.val().length == 0) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>El email es obligatorio.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI escrito, NO VALIDO email
  else if (!email.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)) {
    var code = "";
    code += '<div class="alert alert-danger alert-dismissable">';
    code += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    code += '<strong>Email no válido.</strong> Comprueba que la informacion este correcta.';
    code += '</div>';
    $("#error").html(code);
    return false;
  }
  // SI rellenado, SI email valido
  else {
    return true;
  }
}


usuario.blur(validateUsuario);
email.blur(validateEmail);
nombre.blur(validateNombre);
apellidos.blur(validateApellidos);
password1.blur(validatePassword1);
password2.blur(validatePassword2);

// Pulsacion de tecla
usuario.keyup(validateUsuario);
email.keyup(validateEmail);
nombre.keyup(validateNombre);
apellidos.keyup(validateApellidos);
password1.keyup(validatePassword1);
password2.keyup(validatePassword2);

// Envio de formulario
$("#registro").submit(function() {
  if (validateUsuario() & validatePassword1() & validatePassword2() & validateEmail() & validateNombre() & validateApellidos())
    return true;
  else
    return false;
});

//controlamos el foco / perdida de foco para los input text
searchBoxes.focus(function() {
  $(this).addClass("active");
});
