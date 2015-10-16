angular.module('articleApp',[])
.controller("ArticleController", function($scope, $http) {
  var url = config.CMS_API_URL + "?json=get_humboles&count=3&offset=0";
  $http.get(url).
    success(function(data, status, headers, config) {
      console.log(data);
      $scope.relatedPosts = data.posts;
    }).
    error(function(data, status, headers, config) {
      // log error
    });
});

angular.bootstrap(document.getElementById("site-contents"),['articleApp']);
