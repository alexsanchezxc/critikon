$(document).ready(function() {
  // NOTE: tooltip-demo (Texto que sale al poner el raton encima de las peliculas)
  $('[data-toggle="tooltip"]').tooltip();

  // NOTE: Imagen vacia si la url esta vacia (No funciona)
  var url = "url('https://image.tmdb.org/t/p/original')";
  $('input#search').on('input', function() {
    for (var i = 0; i < $(".movieList").length; i++) {
      if ($(this).find(".poster").eq(i).css("background-image") == url) {
        $(".movieList").find(".poster").eq(i).src = "../assets/no-image.png";
      }
    }
  });

  // NOTE: Boton para cambiar el color de pagina
  $("#switch").on('change', function() {
    if ($(this).is(':checked')) {
      $(this).attr('value', 'true');
      $('#pageColor').attr('href', '../css/black.css');
    } else {
      $(this).attr('value', 'false');
      $('#pageColor').attr('href', '../css/white.css');
    }
  });

  // NOTE: Cambios de la pagina en x resoluciones
  $(window).on('resize', function() {
    var win = $(this);
    // NOTE: Cambio de clase menu desplegable de usuario
    if (win.width() <= 768) {
      $('#drop').addClass('dropdown');
      $('#drop').removeClass('dropup');
      $('#dropcaret').addClass('fa-caret-down');
      $('#dropcaret').removeClass('fa-caret-up');
    } else {
      $('#drop').removeClass('dropdown');
      $('#drop').addClass('dropup');
      $('#dropcaret').removeClass('fa-caret-down');
      $('#dropcaret').addClass('fa-caret-up');
    }
    // NOTE: Cambio en el tamaño de las peliculas
    if (win.width() <= 375) {
      $('.movieList').addClass('col-xs-12');
      $('.movieList').removeClass('col-xs-6');
    } else {
      $('.movieList').addClass('col-xs-6');
      $('.movieList').removeClass('col-xs-12');
    }
  }).resize();
});
