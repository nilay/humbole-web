angular.module('headerApp',[])
.controller('HeaderController', function($scope) {
	var activeMenu = '';

	var getMenuItems = function(){
	  	var maleMenu =  [{'t': 'Kids','l': '/#/kids'},{'t': 'Teens','l': '/#/teens'},{'t': 'Bachelors','l': '/#/bachelor'},{'t': 'Techies','l': '/#/techies'},{'t': '40+','l': '/#/fourty-plus'},{'t': '60+','l': '/#/sixty-plus'}];
		var femaleMenu =  [{'t': 'Kids','l': '/#/kids'},{'t': 'Teens','l': '/#/teens'},{'t': 'Sinster','l': '/#/sinster'},{'t': 'Mom','l': '/#/mom'},{'t': '40+','l': '/#/fourty-plus'},{'t': '60+','l': '/#/sixty-plus'}];
		return $('.onoffswitch-checkbox').is(':checked') ? maleMenu : femaleMenu;
	};

  // change navigation menu based on gender selection	
  $scope.genderChange = function(){
  	
  	$scope.menu = getMenuItems();
  	
  	// set cookies foe gender. 
  	var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = 'gender=' + $scope.getGender() +';path=/'+ ';expires=' + expires.toUTCString();
  	
  	$scope.refreshGrid();
  };  

  
  $scope.menu = getMenuItems();
  
  $scope.assignActiveMenu = function(menuItem){ 

  	activeMenu = menuItem;
  	$scope.refreshGrid();
  };
  
  $scope.getActiveMenu = function(){
  	return activeMenu;
  }
  
  $scope.getGender = function(){
  	return $scope.mfswitch ? 'male' : 'female';
  }
  
  $scope.getPageContext = function(){
  	return {'gender': $scope.getGender(), 'group': activeMenu, 'category':null};
  }
  
  $scope.refreshGrid = function(){
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
