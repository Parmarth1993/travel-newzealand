teacherApp.controller('InboxCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.loading = true;
	$scope.inbox = true;
	$scope.replyText = "";
	

	$scope.getparents = function(){
		$scope.loading = true;
		$http.get('/teacher/api/listParents')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.parentlist = response.data.list;
	      	//$scope.get();
		  	//$scope.message = {receiver:'',message:''};
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.get = function() {
		$scope.loading = true;
		$http.get('/teacher/api/inbox')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.messages = response.data.messages;
		  	$scope.message = {receiver:'',message:''};
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getTeachers = function() {
		$scope.loading = true;
		$http.get('/teacher/api/parent_guardians')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.parent_guardians = response.data.parent_guardians;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.sendMessage = function(isThread) {
		$scope.loading = true;
		$scope.message.new_thread = (isThread) ? '1' : '0';
		$http.post('/teacher/api/message', $scope.message)
		.then(function(response) {
		  var response = response.data;
		  $scope.loading = false;
	      if(response.status) {
	      	$scope.messageForm.$setUntouched();
	      	$scope.message = {};
			$scope.get();
	      	swal("Sent", response.message, "success");
	      	$('#message').modal('hide');
	      } else {
	      	swal("Error", response.message, "error");	
	      }
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.outbox = function() {
		$scope.loading = true;
		$http.get('/teacher/api/outbox')
		.then(function(response) {
	      $scope.outboxM = response.data.messages;
		  $scope.message = {receiver:'',message:''};
		  $scope.loading = false;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.toggleAnnouncement = function(index) {
		// $scope.loading = true;
		$('#accordion .collapse').removeClass('show');
		$('#collapseOne' + index).addClass('show');
		// $http.get('/teacher/api/getParentChat/'+ index)
		// .then(function(response) {
		// 	$scope.loading = false;
	 //      	$scope.messagesChat = response.data.messages;
		//   	//$scope.message = {receiver:'',message:''};
	 //    },function(error){
	 //    	$scope.loading = false;
	 //      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		// });

	}

	$scope.toggleAnnouncementOut = function(index) {
		$('#accordion2 .collapse').removeClass('show');
		$('#collapseOneOut' + index).addClass('show');
	}

	$scope.replyMessage = function (thread, replyText) {
		$scope.loading = true;
		$scope.message.message = replyText;
		$scope.message.receiver = thread.student_id;
		$scope.message.thread_id = thread.id;
		$scope.message.new_thread = '0';
		$http.post('/teacher/api/message', $scope.message)
		.then(function(response) {
		  var response = response.data;
		  $scope.loading = false;
	      if(response.status) {
	      	$scope.message = {};
			$scope.get();
	      	swal("Sent", response.message, "success");
	      	$timeout(function() {
				$('#accordion .collapse').removeClass('show');
				$('#collapseOne' + thread.id).addClass('show');
			},1500);
	      } else {
	      	swal("Error", response.message, "error");	
	      }
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});		
	}

	$scope.toggleMessage = function (index) {
		$('#accordion'+index+' .collapse').removeClass('show');
		$('#collapseOne' + index).addClass('show');
	}


	$scope.getStudents = function () {
		$http.get('/teacher/api/students')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.students = response.data.students;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}
});