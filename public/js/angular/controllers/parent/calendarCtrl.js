parentApp.controller('CalendarCtrl', function($scope, $http, $timeout, $locale,$location, $window,$rootScope) {
	
	var date = new Date();
	$scope.loading = true;
	$rootScope.activePath = $location.path();

	$scope.filter = {};


	$scope.initCalendar = function(refresh) {
		if(refresh == 'refresh') {
			$('#assinmentsCalendar').fullCalendar('destroy');
		}
		$scope.loading = true;
		$http.get('/parent/api/assignments/calendar')
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
			  	window.location.href = '/parent/assignment/'+info.id;
			  	// $location.path('parent/assignment/'+info.id);
			  }
			});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterSubjects = function(subjectname) {
		$scope.loading = true;
		$('#assinmentsCalendar').fullCalendar('destroy');
		$http.post('/parent/api/assignments/filtercalendar',{subject: subjectname})
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
			  	window.location.href = '/parent/assignment/'+info.id;
			  }
			});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
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
			  	window.location.href = '/parent/assignment/'+info.id;
			  }
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