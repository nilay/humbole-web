var app = angular.module('app',['infinite-scroll']);
app.controller('AppController', function($scope, Reddit) {
  $scope.reddit = new Reddit();
});	
	
	

app.factory('Reddit', function($http) {
  var Reddit = function() {
    this.items = [];
    this.busy = false;
    this.after = '';
    
  };

  Reddit.prototype.nextPage = function() {
    if (this.busy) return;
    this.busy = true;

    var url = config.CMS_API_URL + "?json=1&after=" + this.after;
    $http.get(url).success(function(data) {
      for(var i = 0; i< data.posts.length; i++) {
        this.items.push(data.posts[i]);
      }
      this.after = this.items.length - 1;
      this.busy = false;
    }.bind(this));
  };

  return Reddit;
});	
