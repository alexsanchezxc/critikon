window.onload = iniciar;

function iniciar() {
  $("#submit").click(validar);
  $("#usuario").on("keyup", validarUsuario);
  $("#nombre").on("keyup", validarNombre);
  $("#apellidos").on("keyup", validarApellidos);
  $("#email").on("keyup", validarEmail);
  $("#password1").on("keyup", validarPassword1);
  $("#password2").on("keyup", validarPassword2);

  //document.getElementById("cb").addEventListener("change", mostrarOculto, false);
}

function validarUsuario() {
  if ($("#usuario").val().length < 4) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El usuario debe tener 4 carecteres minimo.</strong>.' +
      '</div>');
    return false;
  } else {
    $("#error").html('');
    return true;
  }
}

function validarNombre() {
  if ($("#nombre").val().length === 0) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El nombre es obligatorio.</strong>.' +
      '</div>');
    return false;
  } else {
    $("#error").html('');
    return true;
  }
}

function validarApellidos() {
  if ($("#apellidos").val().length === 0) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El apellido es obligatorio.</strong>.' +
      '</div>');
    return false;
  } else {
    $("#error").html('');
    return true;
  }
}

function validarEmail() {
  if (!$("#email").val().match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>Introduzca un email válido.</strong>.' +
      '</div>');
    return false;
  } else {
    $("#error").html('');
    return true;
  }
}

function validarPassword1() {
  var elemento = document.getElementById("tlfn");
  if ($("#password1").val().length < 5 || $("#password1").val().length > 12) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>La contraseña debe ser entre 5 y 12 caracteres.</strong>.' +
      '</div>');
    return false;
  } else if (!$("#password1").val().match(/^[0-9a-zA-Z]+$/)) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>La contraseña debe contener números y letras.</strong>.' +
      '</div>');
    return false;
  } else {
    $("#error").html('');
    return true;
  }
}

function validarPassword2() {
  if ($("#password1").val() != $("#password2").val()) {
    $("#error").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>Las contraseñas deben ser iguales.</strong>.' +
      '</div>');
    return false;
  }
  // SI son iguales
  else {
    $("#error").html('');
    return true;
  }
}

function validar(e) {
  $("#error").html("");
  if (validarNombre() && validarUsuario() && validarEmail() && validarPassword2() && validarPassword1() && validarApellidos()) {
    return true;
  } else {
    e.preventDefault();
    return false;
  }
}
