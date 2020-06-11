teacherApp.controller('StudentsCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.students = {};
	$scope.studentBtn = 'Add Student';
	$scope.parentcount = 0;
	$scope.loading = true;
	$scope.disableImport = false;
	$timeout(function() {
		$scope.getStudents();
	},250);

	/* Show File Name on change file */
		var input = document.getElementById( 'file-upload' );
		var infoArea = document.getElementById( 'file-upload-filename' );

		input.addEventListener( 'change', showFileName );

		function showFileName( event ) {
		  
		  // the change event gives us the input it occurred in 
		  var input = event.srcElement;
		  
		  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
		  var fileName = input.files[0].name;
		  
		  // use fileName however fits your app best, i.e. add it into a div
		  infoArea.textContent = 'File name: ' + fileName;
		}
	/* */

	$scope.checkDisableImport = function() {
		console.log($('#file-upload').val() );
		if($('#file-upload').val()) {
			$timeout(function() {
				$scope.disableImport = true;
			},250);
		}
	}

	$scope.addMoreGuardian = function (){
		$scope.parentcount++;

		$timeout(function() {
			var parentPhone2 = document.getElementById('parentPhone2');

			parentPhone2.onkeydown = function(e) {
			    if(!((e.keyCode > 95 && e.keyCode < 106)
			      || (e.keyCode > 47 && e.keyCode < 58) 
			      || e.keyCode == 8)) {
			        return false;
			    }
			}
			if($scope.parentcount >= 2){
				var parentPhone3 = document.getElementById('parentPhone3');
				parentPhone3.onkeydown = function(e) {
				    if(!((e.keyCode > 95 && e.keyCode < 106)
				      || (e.keyCode > 47 && e.keyCode < 58) 
				      || e.keyCode == 8)) {
				        return false;
				    }
				}
			}
			if($scope.parentcount >= 3){
				var parentPhone4 = document.getElementById('parentPhone4');
				parentPhone4.onkeydown = function(e) {
				    if(!((e.keyCode > 95 && e.keyCode < 106)
				      || (e.keyCode > 47 && e.keyCode < 58) 
				      || e.keyCode == 8)) {
				        return false;
				    }
				}
			}	
		}, 500);	
	}

	var number = document.getElementById('numberText');
	var parentPhone1 = document.getElementById('parentPhone1');
		// Listen for input event on numInput.
		number.onkeydown = function(e) {
		    if(!((e.keyCode > 95 && e.keyCode < 106)
		      || (e.keyCode > 47 && e.keyCode < 58) 
		      || e.keyCode == 8)) {
		        return false;
		    }
		}

	    parentPhone1.onkeydown = function(e) {
		    if(!((e.keyCode > 95 && e.keyCode < 106)
		      || (e.keyCode > 47 && e.keyCode < 58) 
		      || e.keyCode == 8)) {
		        return false;
		    }
		}

	$scope.addStudent = function () {
		$scope.loading = true;
		$http.post('/teacher/api/student', $scope.students)
		.then(function (response) {
		  	var response = response.data;
		  	$scope.loading = false;
		  	if(response.status) {
		  		$scope.parentcount = 0;
		  		$scope.getStudents();
		  		$scope.students = {};
		  		swal('Done', response.message, "success");
		  		$('#student').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getStudents = function () {
		$timeout(function() {
			if($('.alert').length > 0) {
				$('.alert').fadeOut('slow');
			}
		},3000);
		$scope.loading = true;
		$http.get('/teacher/api/students')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.studentsList = response.students;
		  	$('#_token').val($('meta[name="csrf-token"]').attr('content'));
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.viewAllGuardians = function(guardians) {
		$scope.guardians = guardians;
		$('#guardians').modal('show');
	}

	$scope.updateGuardian =  function (guardian) {
		$scope.loading = true;
		$http.post('/teacher/api/guardian/update', $scope.guardians)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Done', response.message, "success");
		  		$('#guardians').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.removeGuardian = function() {
		$scope.parentcount--;
	}
	
});