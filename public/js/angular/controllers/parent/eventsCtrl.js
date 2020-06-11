parentApp.controller('EventsCtrl', function($scope, $http, $timeout, $locale, $window,$rootScope,$location) {
	$scope.filter = {};
	$scope.event = {};
	$rootScope.activePath = $location.path();
	$scope.eventsBtn = 'Add Event';
	var date = new Date();
	$scope.loading = true;

	$('#eventdate').datepicker({
           autoclose: true,
           startDate: "dateToday",
           minDate: 0
	    })
	      .on( "change", function() {

	});

	$scope.getEvents = function(){
		$scope.loading = true;
	  	// $('#eventsCalendar').fullCalendar('destroy');
		$http.get('/parent/api/events')
		.then(function (response) {
			$scope.loading = false;
			var currentMonth = date.getMonth() + 1;
	  		$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
		  	var response = response.data;
		  	$scope.events = response.events;
		  	$('#eventsCalendar').fullCalendar({
			 header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay'
			  },
			  // defaultView: 'agendaMonth',
			  defaultDate: new Date(),
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.events,
			  eventClick: function(info) {
			  	$('#event_title_view').html(info.title);
			  	$('#event_details_view').html(info.details);
			  	$('#event_date_view').html(info.date);
			  	$('#from_time_view').html(info.from_time);
			  	$('#to_time_view').html(info.to_time);
			  	$('#events_view').modal('show');
			  }
			});

		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}


	$scope.filterDate = function(){
		var customdate = $scope.filter.month + '/' +  $scope.filter.day + '/' + $scope.filter.year;
		$('#eventsCalendar').fullCalendar('destroy');
		$('#eventsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay'
			  },
			  // defaultView: 'agendaMonth',
			  defaultDate: new Date(customdate),
			  navLinks: true, // can click day/week names to navigate views
			  editable: true,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.events,
			  eventClick: function(info) {
			  	$('#event_title_view').html(info.title);
			  	$('#event_details_view').html(info.details);
			  	$('#event_date_view').html(info.date);
			  	$('#from_time_view').html(info.from_time);
			  	$('#to_time_view').html(info.to_time);
			  	$('#events_view').modal('show');
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