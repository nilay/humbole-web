var app = angular.module('app',['infinite-scroll']);
app.controller('AppController', function($scope, Reddit) {
  $scope.reddit = new Reddit();
});	
	
	

// Reddit constructor function to encapsulate HTTP and pagination logic
app.factory('Reddit', function($http) {
  var Reddit = function() {
    this.items = [];
    this.busy = false;
    this.after = '';
  };

  Reddit.prototype.nextPage = function() {
    if (this.busy) return;
    this.busy = true;

    var url = "/json/dummy?after=" + this.after;
    $http.get(url).success(function(data) {
      for (var i = 0; i < data.length; i++) {
        this.items.push(data[i]);
      }
      this.after = this.items.length - 1;
      this.busy = false;
    }.bind(this));
  };

  return Reddit;
});	
