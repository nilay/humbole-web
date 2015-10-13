angular.module('headerApp',[])
.controller('HeaderController', function($scope) {
	var activeGender = null;	// selected gender	
	var activeMenu = null;		// selected menu item
	var activeTopic=null;		// selected article category

	var getMenuItems = function(){
	  	var maleMenu =  [{'t': 'Kids','l': '/male/kids'},{'t': 'Teens','l': '/male/teens'},{'t': 'Bachelors','l': '/male/bachelor'},{'t': 'Techies','l': '/male/techies'},{'t': '40+','l': '/male/fourty-plus'},{'t': '60+','l': '/male/sixty-plus'}];
		var femaleMenu =  [{'t': 'Kids','l': '/female/kids'},{'t': 'Teens','l': '/female/teens'},{'t': 'Sinster','l': '/female/sinster'},{'t': 'Mom','l': '/female/mom'},{'t': '40+','l': '/female/fourty-plus'},{'t': '60+','l': '/female/sixty-plus'}];
		return $('.onoffswitch-checkbox').is(':checked') ? maleMenu : femaleMenu;
	};

  // change navigation menu based on gender selection	
  $scope.genderChange = function(){
  	$scope.menu = getMenuItems();
  	// set cookies foe gender. 
  	var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = 'gender=' + $scope.getGender() +';path=/'+ ';expires=' + expires.toUTCString();  	
  	window.history.pushState('page2', $scope.getGender(), "/"+$scope.getGender());
  	$scope.refreshGrid();
  };  

  
  $scope.menu = getMenuItems();
  
  $scope.assignActiveMenu = function(menuItem){ 

  	activeMenu = menuItem.l;
  	//window.history.pushState('page2', menuItem.t, menuItem.l);
  	$scope.refreshGrid();
  };
  
  $scope.getActiveMenu = function(){
  	return activeMenu;
  }
  
  $scope.getGender = function(){
  	return $scope.mfswitch ? 'male' : 'female';
  }
  
  $scope.getPageContext = function(){
  	return {'gender': $scope.getGender(), 'group': activeMenu, 'topic':activeTopic};
  }
  
  $scope.refreshGrid = function(){
  	// change url before refreshing grid
  	
  	var scp = angular.element(document.getElementById("gridWrap"));
  	if(!scp){
  		return;
  	}

    scp = scp.scope();

    scp.$apply(function () {
        scp.reddit.reStart($scope.getPageContext());
    });
  }
 
  

});	
