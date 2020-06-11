schoolApp.controller('DashbaordCtrl', function($scope, $http, $timeout, $locale,$location,$rootScope) {
	//$scope.loading = true;
	$rootScope.activePath = $location.path();
	//console.log($rootScope.activePath);
	// $scope.initCalendar = function() {
	// 	$http.get('/teacher/api/assignments/calendar')
	// 	.then(function (response) {
	// 		$scope.loading = false;
	// 	  	var response = response.data;
	// 	  	$scope.assignments = response.assignments;
	// 		$('#assinmentsCalendar').fullCalendar({
	// 		  header: {
	// 		    left: 'prev,next today',
	// 		    center: 'title',
	// 		    right: 'month,agendaWeek,agendaDay,listWeek'
	// 		  },
	// 		  defaultView: 'agendaWeek',
	// 		  defaultDate: new Date(),
	// 		  navLinks: true, // can click day/week names to navigate views
	// 		  editable: false,
	// 		  eventLimit: true, // allow "more" link when too many events
	// 		  events: $scope.assignments
	// 		});
	// 	},function(error){
	// 		$scope.loading = false;
	//       	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	// 	});
	// }
});