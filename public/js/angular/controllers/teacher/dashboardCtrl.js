teacherApp.controller('DashbaordCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.loading = true;
	$scope.initCalendar = function() {
		$http.get('/teacher/api/assignments/calendar')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.assignments = response.assignments;
		  	$scope.loading = false;
			$('#assinmentsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  defaultView: 'month',
			  scrollTime: '00:00:00',
			  defaultDate: new Date(),
			  navLinks: true, // can click day/week names to navigate views
			  editable: false,
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
});