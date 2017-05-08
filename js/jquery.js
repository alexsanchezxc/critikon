$(document).ready(function() {
  // NOTE: tooltip-demo (no funciona)
  $('[data-toggle="tooltip"]').tooltip();

  var url = "url('https://image.tmdb.org/t/p/original')";
  $('input#search').on('input', function() {
    for (var i = 0; i < $(".movieList").length; i++) {
      if ($(this).find(".poster").eq(i).css("background-image") == url) {
        $(".movieList").find(".poster").eq(i).src = "../assets/no-image.png";
      }
    }
  });

  // NOTE: Cambiar color pagina

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
