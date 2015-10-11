angular.module('headerApp',[])
.controller('HeaderController', function($scope) {
  
  var getMenuItems = function(){
  	var maleMenu =  [{'t': 'Kids','l': '/'},{'t': 'Teens','l': '/about'},{'t': 'Bachelors','l': '/contact'},{'t': 'Techies','l': '/workspace'},{'t': '40+','l': '/signin'},{'t': '60+','l': '/signin'}];
	var femaleMenu =  [{'t': 'Kids','l': '/'},{'t': 'Teens','l': '/about'},{'t': 'Sinster','l': '/contact'},{'t': 'Mom','l': '/workspace'},{'t': '40+','l': '/signin'},{'t': '60+','l': '/signin'}];
	return $scope.mfswitch ? maleMenu : femaleMenu;
  };

  $scope.change = function(){ $scope.menu = getMenuItems();};  
  $scope.menu = getMenuItems();
});	
