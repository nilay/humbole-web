var app = angular.module('app',['infinite-scroll']);

app.factory('hSharedService', function($rootScope) {
    var sharedService = {};
    sharedService.publishItem = function() {
        $rootScope.$broadcast('refreshGridView');
    };
    
    sharedService.getPageContext = function(){
	  	var gender = $('.onoffswitch-checkbox').is(':checked') ? 'male' : 'female';
	  	var group=null;
	  	var topic=null;
	    var pathArray = window.location.pathname.split( '/' );
	    
	    if(pathArray[1] == 'male' || pathArray[1]=='female'){
		    group =  pathArray[2] ? pathArray[2] : null;
		    topic =  pathArray[3] ? pathArray[3] : null;
		}
	  	return {'gender': gender, 'group': group, 'topic':topic};
	}
	
  	sharedService.constructUrl=function(count, offset){
	    var url = config.CMS_API_URL + "?json=get_humboles&count=" + count + "&offset=" + offset;
		var pageContext = this.getPageContext();
		
		if(pageContext.gender){url+= "&gender=" +  pageContext.gender;}
		if(pageContext.group){
			if(pageContext.group == "spinsters") pageContext.group = "bachelors";
			if(pageContext.group == "ageless") pageContext.group = "fourty-plus";
			if(pageContext.group == "career-women") pageContext.group = "techies";
			url+= "&group_slug=" +  pageContext.group;
		}
		if(pageContext.topic){url+= "&cat_slug=" +  pageContext.topic;}
		return url;	
	  }
	
    
    return sharedService;
});

app.factory('Reddit', function($http, hSharedService) {
  var Reddit = function() {
    this.sharedService = hSharedService;
    this.items = [];
    this.busy = false;
    this.page = 0;
    this.offset = 0
    
  };

  Reddit.prototype.nextPage = function() {
    if (this.busy) return;
    this.busy = true;
	var count = this.offset == 0 ? 18 : 16;	
    var url = this.sharedService.constructUrl(count, this.offset);
    
    $http.get(url).success(function(data) {
      for(var i = 0; i< data.posts.length; i++) {
        this.items.push(data.posts[i]);
      }
      this.page = Math.ceil(this.items.length/count) +1 ;
      this.offset = this.items.length;
      this.busy = false;
    }.bind(this));
  };

  Reddit.prototype.clear = function() {
     this.items=[];
     this.page = 1;
     this.offset = 0;
  };
  
  Reddit.prototype.reStart = function(){
  	 this.clear();
  	 this.nextPage();
  }
  
  
  
  return Reddit;
});	



app.controller('HeaderController', function($scope, hSharedService) {

	var getMenuItems = function(){
	  	var maleMenu =  [{'t': 'Kids','l': '/male/kids'},{'t': 'Teens','l': '/male/teens'},{'t': 'Bachelors','l': '/male/bachelors'},{'t': 'Techies','l': '/male/techies'},{'t': '40+','l': '/male/fourty-plus'},{'t': '60+','l': '/male/sixty-plus'}];
		var femaleMenu =  [{'t': 'Kids','l': '/female/kids'},{'t': 'Teens','l': '/female/teens'},{'t': 'Spinsters','l': '/female/spinsters'},{'t': 'Career Women','l': '/female/career-women'},{'t': 'Mom','l': '/female/mom'},{'t': 'Ageless','l': '/female/ageless'}];
		return $('.onoffswitch-checkbox').is(':checked') ? maleMenu : femaleMenu;
	};

	// change navigation menu based on gender selection	
	$scope.genderChange = function(){
	  	$scope.menu = getMenuItems();
	  	// set cookies for gender. 
	  	var expires = new Date();
	    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
	    document.cookie = 'gender=' + $scope.getGender() +';path=/'+ ';expires=' + expires.toUTCString();  	
	  	window.history.pushState('page2', $scope.getGender(), "/"+$scope.getGender());
	  	//$scope.$broadcast('re-start', null);
	  	hSharedService.publishItem();
	};
  
	$scope.getSelectedGroup = function(){
	  	var context = hSharedService.getPageContext();
	  	return context.group;
	}  

	$scope.appliedClass = function(menuName) {
	    if (menuName.split('/')[2] === $scope.getSelectedGroup()) {
	        return "nav-selected";
	    } else {
	        return ""; 
	    }
	}
  
  $scope.menu = getMenuItems();
  
  $scope.getGender = function(){
  	//return $scope.mfswitch ? 'male' : 'female';
  	return $('.onoffswitch-checkbox').is(':checked') ? 'male' : 'female';
  }
    
});	


app.controller('HomeController', function($scope, Reddit, hSharedService) {
  $scope.reddit = new Reddit();
    $scope.$on('refreshGridView', function() {
        $scope.reddit.reStart();
    });        
});

app.controller("RelatedController", function($scope, $http, hSharedService) {
	var url = hSharedService.constructUrl(3,0);
	if(article_tags){
		url+="&tags_slug="+article_tags;
	}			
	if(typeof article_id != 'undefined'){
		if(article_id.lenngth > 0){
			url+="&not="+article_id;
		}
	}
	$http.get(url).
	    success(function(data, status, headers, config) {
	      $scope.relatedPosts = data.posts;
	    }).
	    error(function(data, status, headers, config) {
	      // log error
	});
});

app.controller("RecentController", function($scope, $http, hSharedService) {
	var url = hSharedService.constructUrl(9,0);			
	if(typeof article_id != 'undefined'){
		if(article_id.lenngth > 0){
			url+="&not="+article_id;
		}
	}
	$http.get(url).
	    success(function(data, status, headers, config) {
	      $scope.relatedPosts = data.posts;
	    }).
	    error(function(data, status, headers, config) {
	      // log error
	});
});	
	

