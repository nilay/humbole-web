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

  Reddit.prototype.nextPage = function(pageContext) {
    if (this.busy) return;
    this.busy = true;
	var count = 10;
    var url = this.constructUrl(pageContext );
    $http.get(url).success(function(data) {
      for(var i = 0; i< data.posts.length; i++) {
        this.items.push(data.posts[i]);
      }
      this.page = Math.ceil(this.items.length/count) +1 ;
      this.offset = this.items.length;
      this.busy = false;
    }.bind(this));
  };

  Reddit.prototype.constructUrl=function(context){
  	var count = this.offset == 0 ? 14 : 12;
    var url = config.CMS_API_URL + "?json=get_humboles&count=" + count + "&offset=" + this.offset;
	var pageContext = context? context : this.getPageContext();
	if(pageContext.gender){url+= "&gender=" +  pageContext.gender;}
	if(pageContext.group){url+= "&group_slug=" +  pageContext.group;}
	if(pageContext.topic){url+= "&cat_slug=" +  pageContext.topic;}
	return url;	
  }
  Reddit.prototype.clear = function() {
     this.items=[];
     this.page = 1;
     this.offset = 0;
  };
  
  Reddit.prototype.reStart = function(pageContext){
  	 this.clear();
  	 this.nextPage(pageContext);
  }
  
  
  Reddit.prototype.getPageContext = function(){
  	var pageContext;
  	var scp = angular.element(document.getElementById("site-header"));

  	if(!scp){return;}
    
    scp = scp.scope();  
    if(scp.$$phase) {
	  return null;
	}
      
    scp.$apply(function () {
        pageContext = scp.getPageContext();
    });
    return pageContext;
  }
  
  return Reddit;
});	

angular.bootstrap(document.getElementById("home-grid"),['app']);

