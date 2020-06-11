schoolApp.controller('NavigationCtrl', function($scope, $http, $timeout, $locale, $window, $rootScope) {

	$scope.notifications = [];
	$scope.notificationsUnread = [];
	$scope.teacherslist = [];
	$scope.assigndata = {};

	$scope.getNotifications = function() {
		$scope.loading = true;
		$http.get('/school/api/notifications')
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
		$http.get('/school/api/notifications_unread')
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
			      		$http.post('/school/api/reSubmitNotification' , notification)
						.then(function(response) {
							$http.post('/school/api/mark_read/' + notification.id)
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
		      			$http.post('/school/api/rejectSubmitNotification' , notification)
						.then(function(response) {
							$http.post('/school/api/mark_read/' + notification.id)
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

			$http.post('/school/api/mark_read/' + notification.id)
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
		$http.post('/school/api/mark_read_all')
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
		$http.delete('/school/api/delete_notifications')
		.then(function(response) {
			$scope.loading = false;	
			$scope.getNotifications();
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { 
	      	} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.confrimSchoolLeaveAction = function (notification) {
		swal({
	          title: 'Confirm Request',
	          text: "You sure you want to approve leave school request for " + notification.first_name + ".",
	          icon: "warning",
	          buttons: true,
	          dangerMode: true,
	          html: true
	      	}).then((confirm) => { 
	      		if(confirm) {
	      			$http.post('/school/api/accept/leave_school', notification)
						.then(function(response) {
							$scope.loading = false;	
							//ask school to replace the teacher with any other teacher
							swal({
						          title: 'Assign New Teacher',
						          text: "You want to assign any other teacher in place of " + notification.first_name + ".",
						          icon: "warning",
						          buttons: true,
						          dangerMode: true,
						          html: true
						      	}).then((confirm) => { 
						      		if(confirm) {
						      			$http.get('/school/api/teacherList/'+ notification.sender_id)
										.then(function(response) {
											$('#teachid').val(notification.sender_id);
											$('#notificationid').val(notification.id);
						      				//open teacher list modal
						      				$('#assignTeacher').modal('show');
									      	$scope.teacherslist = response.data.teacherslist;
											$scope.loading = false;
									    },function(error){
									    	$scope.loading = false;
									      	if(error.data.message == 'Unauthenticated.') { 
									      	} else { swal("Error", error.data.message, "error"); }
										});
						      		}
						      	});
					    },function(error){
					    	$scope.loading = false;
					      	if(error.data.message == 'Unauthenticated.') { 
					      	} else { swal("Error", error.data.message, "error"); }
						});
	      		}
		});
	}

	$scope.updateTeacherData = function(){
		var oldteacherid = $('#teachid').val();
		var notificationid = $('#notificationid').val();
		console.log($scope.teacherid, oldteacherid);
		$scope.assigndata.oldteacher = oldteacherid;
		$scope.assigndata.newteacher = $scope.teacherid;
		$http.post('/school/api/updateTeacherDatabase' , $scope.assigndata)
		.then(function(response) {
				$('#assignTeacher').modal('hide');
				$http.post('/school/api/mark_read/' + notificationid)
				.then(function(response) {
						$scope.loading = false;
						swal("", "Data Assigned Successfully", "");
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