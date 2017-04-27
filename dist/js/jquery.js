$(document).ready(function() {
  $("[data-toggle='tooltip']").tooltip();

  var url = "url('https://image.tmdb.org/t/p/original')";
  $('input#search').on('input', function() {
    for (var i = 0; i < $(".movieList").length; i++) {
      if ($(this).find(".poster").eq(i).css("background-image") == url) {
        $(".movieList").find(".poster").eq(i).src = "../assets/no-image.png";
      }
    }
  });
});
