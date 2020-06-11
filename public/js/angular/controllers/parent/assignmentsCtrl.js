parentApp.controller('AssignmentsCtrl', function($scope, $http, $timeout, $locale, $routeParams, $location, $window, $rootScope) {
	$scope.assignment = {};
	$rootScope.activePath = $location.path();
	$scope.search = {subject:''};
	$scope.assignment_submit = {};
	$scope.user = {};
	$scope.enableSubmit = false;
	var date = new Date();
	$scope.loading = true;
	
	$scope.me = function() {
		$http.get('/parent/api/profile')
		.then(function(response) {
	      $scope.user = response.data.data;	     
	    },function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.getAssignments = function () {
		$scope.loading = true;
		$http.get('/parent/api/assignments')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getAssignment = function() {
		$scope.me();
		$scope.loading = true;
		$http.get('/parent/api/assignment/' + $routeParams.id)
		.then(function (response) {
			$scope.host = $location.protocol() + '://' + $location.host();
		  	var response = response.data;
		  	$scope.loading = false;
		  	if(response.status) {
		  		$scope.assignment = response.assignment;
		  		var fileNames = $scope.assignment.files;
		  		$scope.files = fileNames.map(function (fileName) {
				  return {
				    name: fileName,
				    ext: fileName.substr(fileName.lastIndexOf('.') + 1)
				  }
				});
		  		$scope.assignment.start_date = new Date($scope.assignment.start_date);
		  		$scope.assignment.due_date = new Date($scope.assignment.due_date);
		  		$scope.assignment.students = response.students;
		  		$scope.assignment.status = (response.completed && response.completed != null) ? response.completed.status : '';
		  		$scope.getAssignmentComments();
		  	} else {
		  		$scope.loading = false;
		  		$location.path("/assignments");
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.openSubmitAssignment = function(assignment) {
		var selectedAssignment = assignment;
		if(assignment.status == "submit") {
			swal({
	          title: 'Re-submit Assignments',
	          text: "You sure you want to request for re-submitting this assignment?",
	          icon: "warning",
	          buttons: ["Cancel", "Confirm"],
	          dangerMode: true,
	          html: true
	      	})
	      	.then((confirm) => {
		        if(confirm) {
		        	$scope.assignment_submit = selectedAssignment;
		        	$http.post('/parent/api/assignment/resubmit', $scope.assignment_submit)
						.then(function (response) {
						console.log('Assignment Data ==> ' , $scope.assignment_submit);
						var response = response.data;
						$scope.loading = false;
						if(response.status) {
							swal("", "Your request has been sent for re-submit.", "");
						} else {
						  	swal('Error', response.message, "error");
						}
					},function(error){
						$scope.loading = false;
					    if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
					});
		        	
				}
			});
	      } else if(assignment.status == "approved") {
			swal({
	          title: 'Re-submit Assignments',
	          text: "You sure you want to re-submit this assignment?",
	          icon: "warning",
	          buttons: ["Cancel", "Confirm"],
	          dangerMode: true,
	          html: true
	      	})
	      	.then((confirm) => {
		        if(confirm) {
					$scope.assignment_submit = selectedAssignment;
					$scope.assignment_submit.files = [];
					$('#submitAssignment').modal('show');
				}
			});
	      }else  {	      	
			$scope.assignment_submit = selectedAssignment;
			$scope.selected_assigment_files = [];
			$('#submitAssignment').modal('show');
	      }
	}

	$scope.fileNameChanged = function (event) {
		$scope.loading = true;
		$timeout(function() {
			$scope.enableSubmit = false;
		},1500);
		var files = event.target.files;
		$scope.selected_assigment_files = [];
		angular.forEach(files, function(value){
			var reader = new FileReader();
		    reader.readAsDataURL(value);
		   	reader.onload = function () {
		   		$scope.loading = false;
			    $scope.selected_assigment_files.push(reader.result);
			    swal('Uploaded', 'File has been uploaded.', "success");
			    if($scope.assignment_submit.notes !='') {
				 	
			    }
		   	};
		});
	}

	$scope.submitAssignment = function() {
		$scope.loading = true;
		$http.post('/parent/api/assignment/submit', {assignment: $scope.assignment_submit, files: $scope.selected_assigment_files})
		.then(function (response) {
		  	var response = response.data;
		  	$scope.loading = false;
		  	$scope.submitAssignmentForm.$setUntouched();
		  	if(response.status) {
		  		$scope.assignment_submit  = {};
		  		$scope.assignment_submit.files  = [];
		  		$('#submitAssignment').modal('hide');
		  		$scope.getAssignment();
		  		swal('Submitted', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterAssignmentsByDate = function() {
		$scope.loading = true;
		$http.post('/parent/api/assignments/filter/date', $scope.filter)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.postComment = function () {
		$scope.loading = true;
		var data = {assignment_id: $scope.assignment.id, comment: $scope.comment}
		$http.post('/parent/api/assignment/comment/' + $scope.assignment.id, data)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.comment = '';
		  		$scope.getAssignmentComments();
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getAssignmentComments = function () {
		$scope.loading = true;
		$http.get('/parent/api/assignment/comments/' + $scope.assignment.id)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.comments = response.comments;
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
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
});