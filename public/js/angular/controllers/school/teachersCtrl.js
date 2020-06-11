schoolApp.controller('TeachersCtrl', function($scope, $http, $timeout, $locale,$location,$rootScope) {
	$scope.teacher = {};
	$rootScope.activePath = $location.path();
	// $scope.search = {};
	$timeout(function() {
		$scope.getTeachers();
	},250);
	$scope.loading = true;

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
	$scope.addTeacher = function () {
		$scope.loading = true;
		$http.post('/school/api/teacher', $scope.teacher)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.teacherForm.$setUntouched();
		  		$scope.getTeachers();
		  		$scope.teacher = {};
		  		swal('Done', response.message, "success");
		  		$('#teacher').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.fileEvent = function(element) {
        let file = fileInput.target.files[0];
    let fileName = file.name;
    };

	$scope.getTeachers = function () {
		$scope.loading = true;
		$http.get('/school/api/teachers')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.teachers = response.teachers;
		  	$('#_token').val($('meta[name="csrf-token"]').attr('content'));
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.editTeacher = function(teacher) {
		$scope.teacher = teacher;
		//console.log($scope.teacher);
		$('#teacher').modal('show');
	}

	$scope.updateGuardian =  function (teacher) {
		$scope.loading = true;
		$http.post('/school/api/teacher/update', teacher)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Done', response.message, "success");
		  		$('#teacher').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}


});