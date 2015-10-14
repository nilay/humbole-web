angular.module('headerApp',[])
.controller('HeaderController', function($scope) {
	var activeGender = null;	// selected gender	
	var activeMenu = null;		// selected menu item
	var activeTopic=null;		// selected article category

	var getMenuItems = function(){
	  	var maleMenu =  [{'t': 'Kids','l': '/male/kids'},{'t': 'Teens','l': '/male/teens'},{'t': 'Bachelors','l': '/male/bachelors'},{'t': 'Techies','l': '/male/techies'},{'t': '40+','l': '/male/fourty-plus'},{'t': '60+','l': '/male/sixty-plus'}];
		var femaleMenu =  [{'t': 'Kids','l': '/female/kids'},{'t': 'Teens','l': '/female/teens'},{'t': 'Spinsters','l': '/female/spinsters'},{'t': 'Mom','l': '/female/mom'},{'t': '40+','l': '/female/fourty-plus'},{'t': '60+','l': '/female/sixty-plus'}];
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
  	alert("here");
  	$scope.refreshGrid();
  };  

  
  $scope.menu = getMenuItems();
  
  $scope.getGender = function(){
  	//return $scope.mfswitch ? 'male' : 'female';
  	return $('.onoffswitch-checkbox').is(':checked') ? 'male' : 'female';
  }
  
  
  $scope.refreshGrid = function(){
  	var scp = angular.element(document.getElementById("gridWrap"));
  	if(!scp){
  		return;
  	}  	
    scp = scp.scope();
    if(scp.$$phase) {
	  return null;
	}
    
    scp.$apply(function () {
        scp.reddit.reStart();
    });
  }
 
  

});	
