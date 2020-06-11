teacherApp.controller('AssignmentsCtrl', function($scope, $http, $timeout, $locale, $routeParams, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.assignment = {};
	$scope.assignmentBtn = 'Post Assignment';
	$scope.search = {subject:''};
	$scope.user = {};
	var date = new Date();
	$scope.loading = true;
	$scope.selected_child = "";
	$scope.check_all = false;
	$scope.assigned_students = [];
	
	$scope.$watch('check_all', function(newValue, oldValue, scope) {
  		if(newValue) {
  			$scope.assignment.students = [];
			$('#assignment_students').find('option').prop('selected', true).trigger('chosen:updated');
			$scope.students.map(function(student) {
				$scope.assignment.students.push(student.student.id);
			});
  		} else {
  			$('#assignment_students').find('option').prop('selected', false).trigger('chosen:updated');
  			$scope.assignment.students = [];
  		}
	});

	$scope.me = function() {
		$http.get('/teacher/api/profile')
		.then(function(response) {
	      $scope.user = response.data.data;	     
	    },function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.postAssignment = function () {
		$scope.loading = true;
		$http.post('/teacher/api/assignment', $scope.assignment)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.check_all = false;
		  		$scope.assignmentForm.$setUntouched();
		  		if($routeParams.id) {
		  			$scope.getAssignment();
		  		} else {
		  			$scope.getAssignments();
		  		}
		  		if(!$routeParams.id || $routeParams.id == '') {
		  			$scope.assignment = {};
		  		}
		  		$scope.bindDatePicker();
		  		$("#assignment_students").val('').trigger("chosen:updated");
		  		swal('Done', response.message, "success");
		  		$('#assignment').modal('hide');
		  		$scope.loading = false;
		  	} else {
		  		$scope.loading = false;
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getAssignments = function () {
		$scope.loading = true;
		$http.get('/teacher/api/assignments')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		  	$scope.assignments2 = response.assignments;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
		  	$scope.getStudents();
		  	$scope.loading = false;
		  	$scope.check_all = false;
		  	// $('a.embed').gdocsViewer({width: 600, height: 750});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.showPastAssignments = function (){
		$scope.loading = true;
		$http.get('/teacher/api/completedassignments')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		  	$scope.assignments2 = response.assignments;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
		  	$scope.getStudents();
		  	$scope.loading = false;
		  	$scope.check_all = false;
		  	// $('a.embed').gdocsViewer({width: 600, height: 750});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.editAssignment = function(assignment) {
		// $scope.getStudents();
		$scope.assignmentBtn = 'Update Assignment'; 
		$scope.assignment = assignment;
		$scope.assignment.assignment_files = assignment.files;
		$scope.assignment.start_date = $scope.assignment.start_date;
		$scope.assignment.due_date = $scope.assignment.due_date;
		$('#start_date').val($scope.assignment.start_date);
		$('#due_date').val($scope.assignment.due_date );
		$scope.loading = true;
		$http.get('/teacher/api/assignment/' + assignment.id)
		.then(function (response) {
		  	var response = response.data;
		  	$scope.loading = false;
		  	if(response.assignment.students.length == $scope.students.length) {
		  		$scope.check_all = true;
		  	} else {
		  		$scope.check_all = false;
		  	}
		  	if(response.status) {
		  		var studentArr = false;
		  		$timeout(function() {
		  			var students = [];
		  			response.assignment.students.map(function(value) {
		  				if(value.id) {
		  					studentArr = true;
		  					students.push(value.id);
		  				}
		  			});
		  			if(studentArr) {
						$("#assignment_students").val(students);
						$("#assignment_students").trigger("chosen:updated");
		  			} else  {
		  				$("#assignment_students").val(response.assignment.students);
						$("#assignment_students").trigger("chosen:updated");
		  			}
				},1000);
				// response.assignment.students.map(function(value) {
				// 	$('#assignment_students').find('option').each(function() {
				// 		if(value == $(this).val()) {
				// 			$(this).prop('selected', true).trigger('chosen:updated');
				// 		}
				// 	});
				// });
				$('#assignment').modal('show');
		  	} else {
		  		$location.path("/assignments");
		  		swal('Error', response.message, "error");
		  	}
		}, function (error) {
			$scope.loading = false;
	        if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	    });
	}

	$scope.deleteAssignment = function(assignment, redirect) {
		swal({
          title: 'Delete Assignment?',
          text: "You sure you want to delete assignment " + assignment.title + ".",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
        if(confirm) {
        	$scope.loading = true;
          $http.delete('/teacher/api/assignment/delete/' + assignment.id)
          .then(function (response) {
          	$scope.loading = false;
          	if(response.data.status) {    
	            swal('Deleted', response.data.message, "success");
          		if(redirect) {
          			$location.path("assignments");
          		} else {
	            	$scope.getAssignments();          			
          		}
          	} else {
          		swal('Error', response.data.message, "error");
          	}
          }, function (error) {
          	$scope.loading = false;
            if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
          });
        }
      });
	}

	$scope.getStudents = function() {
		$scope.loading = true;
		$http.get('/teacher/api/students')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.students = response.students;
		  	$scope.selected_child = ($scope.students.length) ? $scope.students[0].student.id : "";
		  	$timeout(function() {
		  		$('#assignment_students').chosen({width: "100%"});
		  	},1000);
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.fileNameChanged = function (event) {
		$scope.loading = true;
		$timeout(function() {
			$scope.enableSubmit = false;
		},1500);
		var files = event.target.files;
		if(!$scope.assignment.id) {
			$scope.assignment.assignment_files = [];
		}
		angular.forEach(files, function(value){
			var reader = new FileReader();
		    reader.readAsDataURL(value);
		   	reader.onload = function () {
		   	 $scope.loading = false;
		     $scope.assignment.assignment_files.push(reader.result);
		     console.log($scope.assignment.assignment_files);
		   	};
		});
	}

	$scope.getAssignment = function() {
		$scope.me();
		$scope.loading = true;
		$http.get('/teacher/api/assignment/' + $routeParams.id)
		.then(function (response) {
		  	var response = response.data;
		  	$scope.loading = false;
		  	$scope.host = $location.protocol() + '://' + $location.host();
		  	if(response.status) {
		  		$scope.assignment = response.assignment;
		  		var fileNames = $scope.assignment.files;
		  		$scope.files = fileNames.map(function (fileName) {
				  return {
				    name: fileName,
				    ext: fileName.substr(fileName.lastIndexOf('.') + 1)
				  }
				});
		  		$scope.assignment.start_date = $scope.assignment.start_date;
		  		$scope.assignment.due_date = $scope.assignment.due_date;
		  		$scope.assignment.students = response.students;
		  		$scope.assigned_students = response.assignment.students;
				$('#start_date').val($scope.assignment.start_date);
				$('#due_date').val($scope.assignment.due_date );
		  	} else {
		  		$scope.loading = false;
		  		$location.path("/assignments");
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.bindDatePicker = function() {
		
		var dateFormat = "mm/dd/yy";
			$scope.start_date = $( "#start_date" )
				.datepicker({
					autoclose: true,
				    todayHighlight: true,
				    format: dateFormat,
				    minDate: 0,
				    clearBtn: true,
				    multidate: false,
				    toggleActive: true,
				    changeMonth: true
				})
				.on( "change", function() {
					$timeout(function() {
						if($routeParams && $routeParams.id && $routeParams.id !='') {
							$scope.assignment.start_date = $('#start_date').val();
						} 
						$scope.due_date.datepicker( "option", "minDate", $scope.assignment.start_date );
					}, 250);
				});
			$scope.due_date = $( "#due_date" ).datepicker({
				autoclose: true,
			    todayHighlight: true,
			    format: dateFormat,
			    minDate: 0,
			    clearBtn: true,
			    multidate: false,
			    toggleActive: true,
			    changeMonth: true
			})
			.on( "change", function() {
				$timeout(function() {
					if($routeParams && $routeParams.id && $routeParams.id !='') {
						$scope.assignment.due_date = $('#due_date').val();
					}
					$scope.start_date.datepicker( "option", "maxDate", $scope.assignment.due_date );
				},250);
			});		
		
	}

	$scope.filterAssignmentsByDate = function() {
		$scope.loading = true;
		$http.post('/teacher/api/assignments/filter/date', $scope.filter)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.markComplete = function(student) {
		swal({
          title: 'Assignment Complete',
          text: "You are completing the assignment for  " + student.first_name + " " + student.last_name + ".",
          icon: "warning",
          buttons: true,
          cancelButtonText: "Cancel",
          confirmButtonColor: 'green',
          confirmButtonText: "Complete",
          dangerMode: true,
          html: true,
          buttons: ["Cancel", "Complete"]
        })
      	.then((confirm) => {
	        if(confirm) {
	        	$scope.loading = true;
	        	$http.post('/teacher/api/assignment/' + $routeParams.id + '/complete/' + student.id)
				.then(function (response) {
				  	var response = response.data;
				  	$scope.loading = false;
				  	if(response.status) {
				  		$scope.getAssignment();
				  		$scope.checkCompleted(student.id);
				  		swal("Done", response.message, "success");		
				  	} else {
				  		if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
				  	}
				},function(error){
					$scope.loading = false;
			      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
				});
	        }
    	});
	}

	$scope.getStudent = function() {
		$scope.loading = true;
		$http.get('/teacher/api/student/' + $routeParams.student)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.student = response.student;
		  	$scope.parent_guardian = response.parent_guardian;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.checkCompleted = function(studentId) {
		if($routeParams.student && $routeParams.student !='') {
			var student = $routeParams.student;
		} else {
			var student = studentId;
		}
		$http.get('/teacher/api/assignment/completed/' + $routeParams.id + '/student/' + student)
		.then(function (response) {
		  	var response = response.data;
		  	$scope.getAssignmentComments(studentId);
		  	if(response.assignment_completed && response.assignment_completed != null) {
		  		$scope.assignment_completed = response.assignment_completed;
		  		var fileNames = response.assignment_completed.files;
		  		$scope.completed_files = fileNames.map(function (fileName) {
				  return {
				    name: fileName,
				    ext: fileName.substr(fileName.lastIndexOf('.') + 1)
				  }
				});
		  	} else {
		  		window.history.back();
		  		swal("Not Submitted", "The assignment in not submitted by the student yet.", "error");		
		  	}
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.postComment = function () {
		var data = {assignment_id: $routeParams.id, comment: $scope.comment}
		$http.post('/teacher/api/assignment/comment/' + $routeParams.id + '/child/' + $routeParams.student, data)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.comment = '';
		  		$scope.getAssignmentComments();
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getAssignmentComments = function (studentId) {
		if($routeParams.student && $routeParams.student !='') {
			var student = $routeParams.student;
		} else {
			var student = studentId;
		}
		$http.get('/teacher/api/assignment/comments/' + $routeParams.id + '/child/' + student)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.comments = response.comments;
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.childSelectionChanged = function () {
		var assignments = [];
		if($scope.selected_child != null) {
			$scope.assignments2.map(function(value){
				if(value.students.indexOf($scope.selected_child) > 0) {
					assignments.push(value);
				}
			});
			$scope.assignments = assignments;
		} else {			
			$scope.assignments = $scope.assignments2;
		}
	}

	$scope.getDocUrl = function (fileName) {
		var url = "https://docs.google.com/viewer?url=/uploads/assignment_files/" + fileName;
		//console.log(url);
		return url;
	}

	$scope.removeFile = function (file) {
		$scope.assignment.files.map(function(i, f) {
			if(file.name == i) {
				 $scope.assignment.files.splice(f, 1);
			}
		})
		var fileNames = $scope.assignment.files;
  		$scope.files = fileNames.map(function (fileName) {
		  return {
		    name: fileName,
		    ext: fileName.substr(fileName.lastIndexOf('.') + 1)
		  }
		});
	}
});
