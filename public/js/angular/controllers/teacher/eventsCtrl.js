teacherApp.controller('EventsCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.datefilter = {};
	$scope.event = {};
	$scope.updateeventdata = {};
	$scope.updateeventdatasubmit = {};
	$scope.eventsBtn = 'Add Event';
	var date = new Date();
	$scope.view = false;
	$scope.loading = true;

	$('#event_date').datepicker({
           autoclose: true,
           startDate: "dateToday",
           minDate: 0,
           changeMonth: true
	    })
	    .on( "change", function() {

	});  

	$scope.getEvents = function(){
		$scope.loading = true;
		var todaytime = new Date();
		var currntime = todaytime.getHours() + ":" + todaytime.getMinutes() + ":" + todaytime.getSeconds();
		var currentMonth = date.getMonth() + 1;
	  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString(), type: 'start_date'}
	  	$('#eventsCalendar').fullCalendar('destroy');
	  	var scope = $scope;
		$http.get('/teacher/api/events')
		.then(function (response) {
			$scope.loading = false;
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
			  	// console.log(scope);
			  	scope.view = true;
			  	$scope.updateeventdata = info;
			  	$('#event_date_view').datepicker({
			           autoclose: true,
			           startDate: info.date,
			           minDate: 0
				    })
				    .on( "change", function() {

				});  
			  	$('#event_title_view').val(info.title);
			  	$('#event_details_view').val(info.details);
			  	$('#event_date_view').val(info.date);
			  	$('#from_time_view').val(info.from_time);
			  	$('#to_time_view').val(info.to_time);
			  	$('#events_view').modal('show');

			  	$('#from_time_view').timepicker({
				    timeFormat: 'h:mm p',
				    interval: 30,
				    // minTime: '10',
				    // maxTime: '6:00pm',
				    defaultTime: info.from_time,
				    startTime: '10:00',
				    dynamic: false,
				    dropdown: true,
				    scrollbar: true,
				    change: function(time) {
				     $scope.event.from_time = $('#from_time_view').val();
				     $('#to_time').timepicker( "option", "minTime", $('#from_time').val() );
				    }
				});

				$('#to_time_view').timepicker({
				    timeFormat: 'h:mm p',
				    interval: 30,
				    // minTime: '10',
				    // maxTime: '6:00pm',
				    defaultTime: info.to_time,
				    startTime: '10:00',
				    dynamic: false,
				    dropdown: true,
				    scrollbar: true,
				    change: function(time) {
				     // $('#from_time').timepicker( "option", "maxTime", $('#to_time').val() );
				     $scope.event.to_time = $('#to_time_view').val();
				    }
				});
			  }
			});

			$('#from_time').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 30,
			    // minTime: '10',
			    // maxTime: '6:00pm',
			    defaultTime: currntime,
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true,
			    change: function(time) {
			     $scope.event.from_time = $('#from_time').val();
			     $('#to_time').timepicker( "option", "minTime", $('#from_time').val() );
			    }
			});

			$('#to_time').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 30,
			    // minTime: '10',
			    // maxTime: '6:00pm',
			    defaultTime: currntime,
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true,
			    change: function(time) {
			     // $('#from_time').timepicker( "option", "maxTime", $('#to_time').val() );
			     $scope.event.to_time = $('#to_time').val();
			    }
			});

		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterDate = function(){
		var customdate = $scope.filter.month + '/' +  $scope.filter.day + '/' + $scope.filter.year;
		$('#eventsCalendar').fullCalendar('destroy');
		$('#eventsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  defaultView: 'month',
			  defaultDate: customdate,
			  navLinks: true, // can click day/week names to navigate views
			  editable: false,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.events,
			  eventClick: function(info) {
			  	$scope.view = true;
			  	$('#event_date_view').datepicker({
			           autoclose: true,
			           startDate: info.date,
			           minDate: 0
				    })
				    .on( "change", function() {

				}); 
			  	$('#event_title_view').val(info.title);
			  	$('#event_details_view').val(info.details);
			  	$('#event_date_view').val(info.date);
			  	$('#from_time_view').val(info.from_time);
			  	$('#to_time_view').val(info.to_time);
			  	$('#events_view').modal('show');

			  	$('#from_time_view').timepicker({
				    timeFormat: 'h:mm p',
				    interval: 30,
				    // minTime: '10',
				    // maxTime: '6:00pm',
				    defaultTime: info.from_time,
				    startTime: '10:00',
				    dynamic: false,
				    dropdown: true,
				    scrollbar: true,
				    change: function(time) {
				     $scope.event.from_time = $('#from_time_view').val();
				     $('#to_time').timepicker( "option", "minTime", $('#from_time').val() );
				    }
				});

				$('#to_time_view').timepicker({
				    timeFormat: 'h:mm p',
				    interval: 30,
				    // minTime: '10',
				    // maxTime: '6:00pm',
				    defaultTime: info.to_time,
				    startTime: '10:00',
				    dynamic: false,
				    dropdown: true,
				    scrollbar: true,
				    change: function(time) {
				     // $('#from_time').timepicker( "option", "maxTime", $('#to_time').val() );
				     $scope.event.to_time = $('#to_time_view').val();
				    }
				});
			  }
			});
	}

	$scope.submitEvent = function(){
		$scope.loading = true;
		$http.post('/teacher/api/event/add', $scope.event)
		.then(function (response){
			$scope.loading = false;
			$scope.event = {};
			$scope.getEvents();
			$scope.eventsForm.$setUntouched();
			swal("Posted", response.data.message, "success");
	      	$('#events').modal('hide');
		}, function(error){
			$scope.loading = false;
			if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.updateEvent = function(){
		$scope.loading = true;
		$scope.updateeventdatasubmit.title = $scope.updateeventdata.title;
		$scope.updateeventdatasubmit.details = $scope.updateeventdata.details;
		$scope.updateeventdatasubmit.date = $scope.updateeventdata.date;
		$scope.updateeventdatasubmit.from_time = $scope.updateeventdata.from_time;
		$scope.updateeventdatasubmit.to_time = $scope.updateeventdata.to_time;
		$scope.updateeventdatasubmit.id = $scope.updateeventdata.id;
		//console.log($scope.updateeventdatasubmit);
		$http.post('/teacher/api/event/updateevent',$scope.updateeventdatasubmit)
		.then(function(response){
			$scope.loading = false;
			$scope.event = {};
			$scope.updateeventdata = {};
			$scope.updateeventdatasubmit = {};
			$scope.getEvents();
			$scope.eventsForm.$setUntouched();
			swal("Updated", response.data.message, "success");
	      	$('#events_view').modal('hide');
		}, function(error){
			$scope.loading = false;
			//if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.addevent = function(){
		var todaytime = new Date();
		var currntime = todaytime.getHours() + ":" + todaytime.getMinutes() + ":" + todaytime.getSeconds();
		$('#from_time').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 30,
			    // minTime: '10',
			    // maxTime: '6:00pm',
			    defaultTime: currntime,
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true,
			    change: function(time) {
			     $scope.event.from_time = $('#from_time').val();
			     $('#to_time').timepicker( "option", "minTime", $('#from_time').val() );
			    }
			});

		   $scope.event.from_time = $('#from_time').val();
			$('#to_time').timepicker({
			    timeFormat: 'h:mm p',
			    interval: 30,
			    // minTime: '10',
			    // maxTime: '6:00pm',
			    defaultTime: currntime,
			    startTime: '10:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true,
			    change: function(time) {
			     // $('#from_time').timepicker( "option", "maxTime", $('#to_time').val() );
			     $scope.event.to_time = $('#to_time').val();
			    }
			});
		$scope.event.to_time = $('#to_time').val();
		$('#event_title').val('');
		$('#event_details').val('');
		$('#event_date').val('');
	}
});