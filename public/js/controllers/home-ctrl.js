var app = angular.module('app',['infinite-scroll']);
app.controller('AppController', function($scope, Reddit) {
  $scope.reddit = new Reddit();
});	
	
	

app.factory('Reddit', function($http) {
  var Reddit = function() {
    this.items = [];
    this.busy = false;
    this.page = 0;
    this.offset = 0
    
  };

  Reddit.prototype.nextPage = function() {
    if (this.busy) return;
    this.busy = true;
	var count = 10;
    var url = this.constructUrl();
    $http.get(url).success(function(data) {
      for(var i = 0; i< data.posts.length; i++) {
        this.items.push(data.posts[i]);
      }
      this.page = Math.ceil(this.items.length/count) +1 ;
      this.offset = this.items.length;
      this.busy = false;
    }.bind(this));
  };

  Reddit.prototype.constructUrl=function(){
  	var count = this.offset == 0 ? 14 : 12;
    var url = config.CMS_API_URL + "?json=get_humboles&count=" + count + "&offset=" + this.offset;
	var pageContext = this.getPageContext();
	
	if(pageContext.gender){url+= "&gender=" +  pageContext.gender;}
	if(pageContext.group){
		if(pageContext.group == "spinsters") pageContext.group = "bachelors";
		url+= "&group_slug=" +  pageContext.group;
	}
	if(pageContext.topic){url+= "&cat_slug=" +  pageContext.topic;}
	return url;	
  }
  Reddit.prototype.clear = function() {
     this.items=[];
     this.page = 1;
     this.offset = 0;
  };
  
  Reddit.prototype.reStart = function(){
  	 this.clear();
  	 this.nextPage();
  }
  
  
  Reddit.prototype.getPageContext = function(){
  	var gender = $('.onoffswitch-checkbox').is(':checked') ? 'male' : 'female';
    var pathArray = window.location.pathname.split( '/' );
    var group =  pathArray[2] ? pathArray[2] : null;
    var topic =  pathArray[3] ? pathArray[3] : null;
  	return {'gender': gender, 'group': group, 'topic':topic};
  }
  
  return Reddit;
});	

angular.bootstrap(document.getElementById("home-grid"),['app']);

