window.onload = iniciar;

function iniciar() {
  $("#submit").click(validar);
  $("#usuario").on("click keyup", validarUsuario);
  $("#nombre").on("click keyup", validarNombre);
  $("#apellidos").on("click keyup", validarApellidos);
  $("#email").on("click keyup", validarEmail);
  $("#password1").on("click keyup", validarPassword1);
  $("#password2").on("click keyup", validarPassword2);
}

function validarUsuario() {
  if ($("#usuario").val().length < 4) {
    $("#usuario").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El usuario debe tener 4 carecteres minimo.</strong>' +
      '</div>');
    return false;
  } else {
    $("#usuario").prev().html('');
    return true;
  }
}

function validarNombre() {
  if ($("#nombre").val().length === 0) {
    $("#nombre").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El nombre es obligatorio.</strong>' +
      '</div>');
    return false;
  } else {
    $("#nombre").prev().html('');
    return true;
  }
}

function validarApellidos() {
  if ($("#apellidos").val().length === 0) {
    $("#apellidos").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>El apellido es obligatorio.</strong>' +
      '</div>');
    return false;
  } else {
    $("#apellidos").prev().html('');
    return true;
  }
}

function validarEmail() {
  if (!$("#email").val().match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
    $("#email").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>Introduzca un email válido.</strong>' +
      '</div>');
    return false;
  } else {
    $("#email").prev().html('');
    return true;
  }
}

function validarPassword1() {
  var elemento = document.getElementById("tlfn");
  if ($("#password1").val().length < 5 || $("#password1").val().length > 12) {
    $("#password1").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>La contraseña debe ser entre 5 y 12 caracteres.</strong>' +
      '</div>');
    return false;
  } else if (!$("#password1").val().match(/^[0-9a-zA-Z]+$/)) {
    $("#password1").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>La contraseña debe contener números y letras.</strong>' +
      '</div>');
    return false;
  } else {
    $("#password1").prev().html('');
    return true;
  }
}

function validarPassword2() {
  if ($("#password1").val() != $("#password2").val()) {
    $("#password2").prev().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
      '<strong>Las contraseñas deben ser iguales.</strong>' +
      '</div>');
    return false;
  }
  // SI son iguales
  else {
    $("#password2").prev().html('');
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
