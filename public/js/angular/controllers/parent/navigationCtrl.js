parentApp.controller('NavigationCtrl', function($scope, $http, $timeout, $locale, $window,$location,$rootScope) {

	$scope.notifications = [];
	$scope.notificationsUnread = [];
	$rootScope.activePath = $location.path();

	$scope.getNotifications = function() {
		$scope.loading = true;
		$http.get('/parent/api/notifications')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.notifications = response.data.notifications;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getNotificationsUnread = function() {
		$scope.loading = true;
		$http.get('/parent/api/notifications_unread')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.notificationsUnread = response.data.notifications;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.markRead = function(notification) {
		$scope.loading = true;
		$http.post('/parent/api/mark_read/' + notification.id)
		.then(function(response) {
			$scope.loading = false;	      	
	      	$timeout(function() {
	      		$scope.getNotificationsUnread();
	      	},1000);
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.markReadAll = function() {
		$scope.loading = true;
		$http.post('/parent/api/mark_read_all')
		.then(function(response) {
			$scope.loading = false;	
			$scope.getNotificationsUnread();
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.clearAll = function() {
		$scope.loading = true;
		$http.delete('/parent/api/delete_notifications')
		.then(function(response) {
			$scope.loading = false;	
			$scope.getNotifications();
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}
});