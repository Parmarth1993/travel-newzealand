teacherApp.controller('BehaviorCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.note = {};
	$scope.search = {};
	$scope.notesBtn = 'Add Notes';
	var date = new Date();
	$scope.loading = true;
	$scope.selected_child = "";

	$scope.getNotes = function() {
		$scope.loading = true;
		$http.get('/teacher/api/notes')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.notes = response.notes;
		  	$scope.notes2 = response.notes;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString()};
		  	$scope.loading = false;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.deleteNote = function (id){
	  swal({
          title: 'Delete Note?',
          text: "You sure you want to delete note.",
          icon: "warning",
          buttons: true,
          dangerMode: true
      })
      .then((confirm) => {
        if(confirm) {
        	$scope.loading = true;
          $http.delete('/teacher/api/note/delete/' + id)
          .then(function (response) {
          	if(response.data.status) {          		
	            $scope.getNotes();
	            swal('Deleted', response.data.message, "success");
          	} else {
          		swal('Error', response.data.message, "error");
          	}
          	$scope.loading = false;
          }, function (error) {
          	$scope.loading = false;
            if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
          });
        }
      });
	}

	$scope.getStudents = function() {

		$('#notedate').datepicker({
           autoclose: true,
           startDate: "dateToday",
           maxDate: 0,
           changeMonth: true
	    })
	      .on( "change", function() {

	    });
	    $scope.loading = true;
		$http.get('/teacher/api/students')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.students = response.students;
		  	$scope.selected_child = ($scope.students.length) ? $scope.students[0].student.id : "";
		  	$scope.loading = false;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.sendNote = function() {
		$scope.loading = true;
		$http.post('/teacher/api/note/add', $scope.note)
		.then(function (response){
			$scope.notesForm.$setUntouched();
			$scope.getNotes();
			swal("", response.data.message, "success");
	      	$('#notes').modal('hide');
	      	$scope.loading = false;
		}, function(error){
			$scope.loading = false;
			if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.viewNote = function(note) {
		$scope.note = note;
		$('#viewNote').modal('show');
	}

	$scope.filterNotesByDate = function() {
		$scope.loading = true;
		$http.post('/teacher/api/notes/filter/date', $scope.filter)
		.then(function (response) {
		  	var response = response.data;
		  	$scope.notes = response.notes;
		  	$scope.loading = false;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.childSelectionChanged = function () {
		var notes = [];
		if($scope.selected_child != null) {
			$scope.notes2.map(function(value){
				if(value.student_id == $scope.selected_child) {
					notes.push(value);
				}
			});
			$scope.notes = notes;
		} else {
			$scope.notes = $scope.notes2;
		}
	}

	$scope.filterByType = function(type) {
		var notes = [];
		$scope.notes2.map(function(value){
			if(value.behaviour === type) {
				notes.push(value);
			}
		});
		$scope.notes = notes;
	}

	$scope.editNote = function(note) {
		$scope.note = note;
		$('#notes').modal('show');
	}
});