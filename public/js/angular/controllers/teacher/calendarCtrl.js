teacherApp.controller('CalendarCtrl', function($scope, $http, $timeout, $locale,$location, $rootScope) {
	$rootScope.activePath = $location.path();
	var date = new Date();
	$scope.loading = true;
	$scope.filter = {};

	$scope.initCalendar = function() {
		$scope.loading = true;
		$('#assinmentsCalendar').fullCalendar('destroy');
		$http.get('/teacher/api/assignments/calendar')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
			$('#assinmentsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  // defaultView: 'agendaMonth',
			  defaultDate: new Date(),
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.assignments,
			  eventClick: function(info) {
			  	window.location.href = '/teacher/assignment/'+info.id;
			  }
			});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterSubjects = function(subjectname) {
		$scope.loading = true;
		$('#assinmentsCalendar').fullCalendar('destroy');
		$http.post('/teacher/api/assignments/filtercalendar',{subject: subjectname})
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
			$('#assinmentsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  // defaultView: 'agendaMonth',
			  defaultDate: new Date(),
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.assignments,
			  eventClick: function(info) {
			  	window.location.href = '/teacher/assignment/'+info.id;
			  }
			});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterDate = function(){
		var customdate = $scope.filter.month + '/' +  $scope.filter.day + '/' + $scope.filter.year;
		$('#assinmentsCalendar').fullCalendar('destroy');
		$('#assinmentsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  // defaultView: 'agendaMonth',
			  defaultDate: new Date(customdate),
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.assignments,
			  eventClick: function(info) {
			  	window.location.href = '/teacher/assignment/'+info.id;
			  }
			});
	}

	$scope.syncCalendar = function() {
		
	}
});