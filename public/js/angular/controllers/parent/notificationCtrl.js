parentApp.controller('NotificationsCtrl', function($scope, $http, $timeout, $locale, $window,$location,$rootScope) {

	$scope.loading = true;
	$rootScope.activePath = $location.path();

	$scope.get = function() {
		$scope.loading = true;
		$http.get('/parent/api/notifications')
		.then(function(response) {
			$scope.loading = false;
			var response = response.data;
	      	$scope.notifications = response.data;
	      	$scope.updatenotifications();
	      	//console.log($scope.notifications.data);
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}
	$scope.updatenotifications = function() {
		$http.post('/parent/api/updatenotifications')
		.then(function(response) {
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}
});