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
      $('#pageColor').attr('href', '../css/white.css');
    } else {
      $(this).attr('value', 'false');
      $('#pageColor').attr('href', '../css/black.css');
    }
  });

});
