parentApp.controller('BehaviorCtrl', function($scope, $http, $timeout, $locale, $window,$location,$rootScope) {
	
	$scope.note = {};
	$scope.search = {};
	$scope.loading = true;
	$rootScope.activePath = $location.path();

	var date = new Date();
	$scope.initCalendar = function() {
		$scope.loading = true;
		$http.get('/parent/api/notes')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.notes = response.notes;
		  	var currentMonth = date.getMonth() + 1;
		  	$scope.filter = {month: currentMonth.toString(), year: date.getFullYear().toString(), day: date.getDate().toString()};
			$('#assinmentsCalendar').fullCalendar({
			  header: {
			    left: 'prev,next today',
			    center: 'title',
			    right: 'month,agendaWeek,agendaDay,listWeek'
			  },
			  defaultView: 'month',
			  defaultDate: new Date(),
			  navLinks: true, // can click day/week names to navigate views
			  editable: false,
			  eventLimit: true, // allow "more" link when too many events
			  events: $scope.notes,
			  eventClick: function(info) {
			  	$('#behaviour').html(info.title);
			  	$('#notedate').html(info.start._i);
			  	$('#details').html(info.details);
			  	$('#note').modal('show');
			  }
			});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.viewNote = function(note) {
		$scope.note = note;
		$('#notes').modal('show');
	}

	$scope.filterNotesByDate = function() {
		$scope.loading = true;
		var customdate = $scope.filter.month + '/' +  $scope.filter.day + '/' + $scope.filter.year;
		$http.post('/parent/api/notes/filter/date', {date:customdate})
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.notes = response.notes;
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
				  events: $scope.notes,
				  eventClick: function(info) {
				  	$('#behaviour').html(info.title);
				  	$('#notedate').html(info.start._i);
				  	$('#details').html(info.details);
				  	$('#note').modal('show');
				  }
				});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.filterByType = function(type) {
		$scope.loading = true;
		$http.post('/parent/api/notes/filter/type', {type:type})
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.notes = response.notes;
			$('#assinmentsCalendar').fullCalendar('destroy');
			$('#assinmentsCalendar').fullCalendar({
				  header: {
				    left: 'prev,next today',
				    center: 'title',
				    right: 'month,agendaWeek,agendaDay,listWeek'
				  },
				  // defaultView: 'agendaMonth',
				  defaultDate: ($scope.notes && $scope.notes[0]) ? new Date($scope.notes[0].start) : new Date(customdate),
				  navLinks: true, // can click day/week names to navigate views
				  editable: true,
				  eventLimit: true, // allow "more" link when too many events
				  events: $scope.notes,
				  eventClick: function(info) {
				  	$('#behaviour').html(info.title);
				  	$('#notedate').html(info.start._i);
				  	$('#details').html(info.details);
				  	$('#note').modal('show');
				  }
				});
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
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