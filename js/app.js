var app = angular.module("imdb", ["ngRoute"]);

app.controller("movieController", function($scope, $http) {
  this.formAction = function() {
    $http.get('https://api.themoviedb.org/3/search/movie?api_key=261f14ae26451d083908c559bf610fca&query=' + this.movieSearch).
    then(function(response) {
      $scope.movies = response.data.results;
    });
  };
  this.movieSelect = function(id) {
    $http.get('https://api.themoviedb.org/3/movie/' + id + '?api_key=261f14ae26451d083908c559bf610fca').
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
