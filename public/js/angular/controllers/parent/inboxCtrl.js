parentApp.controller('InboxCtrl', function($scope, $http, $timeout, $locale, $window,$rootScope,$location) {

	$scope.loading = true;
	$scope.inbox = true;
	$rootScope.activePath = $location.path();

	$scope.get = function() {
		$scope.loading = true;
		$http.get('/parent/api/inbox')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.messages = response.data.messages;
		  	$scope.message = {receiver:'',message:''};
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getparents = function(){
		$scope.loading = true;
		$http.get('/parent/api/listParents')
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

	$scope.outbox = function() {
		$scope.loading = true;
		$http.get('/parent/api/outbox')
		.then(function(response) {
	      $scope.outboxM = response.data.outbox;
		  $scope.message = {receiver:'',message:''};
		  $scope.loading = false;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}


	$scope.getTeachers = function() {
		$scope.loading = true;
		$http.get('/parent/api/teachers')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.teachers = response.data.teachers;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.sendMessage = function(isThread) {
		$scope.loading = true;
		$scope.message.new_thread = (isThread) ? '1' : '0';
		$http.post('/parent/api/message', $scope.message)
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

	// $scope.toggleAnnouncement = function(index) {
	// 	$('#accordion .collapse').removeClass('show');
	// 	$('#collapseOne' + index).addClass('show');
	// }

	$scope.toggleAnnouncement = function(index) {
		$scope.loading = true;
		$('#accordion .collapse').removeClass('show');
		$('#collapseOne' + index).addClass('show');
		$http.get('/parent/api/getParentChat/'+ index)
		.then(function(response) {
			$scope.loading = false;
	      	$scope.messagesChat = response.data.messages;
		  	//$scope.message = {receiver:'',message:''};
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});

	}

	$scope.toggleAnnouncementOut = function(index) {
		$('#accordion2 .collapse').removeClass('show');
		$('#collapseOneOut' + index).addClass('show');
	}

	$scope.selected_child = "";
	$scope.getChildrens = function() {
		$scope.loading = true;
		$http.get('/parent/api/childrens')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.childrens = response.data.childrens;
	      	var selectedChild = getCookie('teachpar_selected_child');
	      	if(selectedChild && selectedChild != null) {
	      		$scope.selected_child = parseInt(selectedChild);
	      	} else {
	      		$scope.selected_child = ($scope.childrens && $scope.childrens[0] && $scope.childrens[0]) ? $scope.childrens[0].id : "";
	      		setCookie('teachpar_selected_child', $scope.childrens[0].id);
	      	}
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.childSelectionChanged = function () {
		swal({
          title: 'Change Children Profile?',
          text: "You sure you want to switch to selected child's dashboard?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      	})
      	.then((confirm) => {
	        if(confirm) {
				setCookie('teachpar_selected_child', $scope.selected_child);
				$window.location.reload();
			}
		});
	}

	$scope.replyMessage = function (thread, replyText) {
		$scope.loading = true;
		$scope.message.message = replyText;
		$scope.message.receiver = thread.student_id;
		$scope.message.thread_id = thread.id;
		$scope.message.new_thread = '0';
		$http.post('/parent/api/message', $scope.message)
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
});