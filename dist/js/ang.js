var app = angular.module("imdb", ["ngRoute"]);

app.controller("movieController", function($scope, $http) {
  var imgPath = "https://image.tmdb.org/t/p/w300/";
  this.movieSearch = "";
  this.formAction = function() {
    $http.get('https://api.themoviedb.org/3/search/movie?api_key=261f14ae26451d083908c559bf610fca&query=' + this.movieSearch).
    then(function(response) {
      $scope.movies = response.data.results;
    });
  };
  this.movieSelect = function(imdbID) {
    $http.get('https://api.themoviedb.org/3/search/movie?api_key=261f14ae26451d083908c559bf610fca&id=' + movieId).
    then(function(data) {
      console.log(data.data);
      $scope.movie = data.data;
    });
  };
});

app.config(function($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "../pages/index.html"
    })
    .when("/movie", {
      controller: "movieController",
      controllerAs: "movieCtrl",
      templateUrl: "../pages/movie.html"
    });
});
