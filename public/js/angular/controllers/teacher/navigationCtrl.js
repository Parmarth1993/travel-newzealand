teacherApp.controller('NavigationCtrl', function($scope, $http, $timeout, $locale, $window, $rootScope) {

	$scope.notifications = [];
	$scope.notificationsUnread = [];

	$scope.getNotifications = function() {
		$scope.loading = true;
		$http.get('/teacher/api/notifications')
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
		$http.get('/teacher/api/notifications_unread')
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
		console.log('mark read ', notification);
		$scope.loading = true;
		if(notification.type == 'request_resubmit_assignment'){
				swal({
		          title: 'Re-submit Assignments',
		          text: "You sure you want to approve request for re-submitting this assignment?",
		          icon: "warning",
		          buttons: true,
		          dangerMode: true,
		          html: true
		      	}).then((confirm) => { 
		      		if(confirm) {
			      		$http.post('/teacher/api/reSubmitNotification' , notification)
						.then(function(response) {
							$http.post('/teacher/api/mark_read/' + notification.id)
							.then(function(response) {
								$scope.loading = false;
								swal("", "Request Approved", "");
						      	$timeout(function() {
						      		$scope.getNotificationsUnread();
						      	},1000);
						    },function(error){
						    	$scope.loading = false;
						      	if(error.data.message == 'Unauthenticated.') { 
						      	} else { swal("Error", error.data.message, "error"); }
							});
					    },function(error){
					    	$scope.loading = false;
					      	if(error.data.message == 'Unauthenticated.') { 
					      	} else { swal("Error", error.data.message, "error"); }
						}); 
		      		}else{
		      			$http.post('/teacher/api/rejectSubmitNotification' , notification)
						.then(function(response) {
							$http.post('/teacher/api/mark_read/' + notification.id)
							.then(function(response) {
								$scope.loading = false;
								swal("", "Request Rejected", "");
						      	$timeout(function() {
						      		$scope.getNotificationsUnread();
						      	},1000);
						    },function(error){
						    	$scope.loading = false;
						      	if(error.data.message == 'Unauthenticated.') { 
						      	} else { swal("Error", error.data.message, "error"); }
							});
					    },function(error){
					    	$scope.loading = false;
					      	if(error.data.message == 'Unauthenticated.') { 
					      	} else { swal("Error", error.data.message, "error"); }
						});
		      		}
		      	});
		}else{

			$http.post('/teacher/api/mark_read/' + notification.id)
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
	}

	$scope.markReadAll = function() {
		$scope.loading = true;
		$http.post('/teacher/api/mark_read_all')
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
		$http.delete('/teacher/api/delete_notifications')
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