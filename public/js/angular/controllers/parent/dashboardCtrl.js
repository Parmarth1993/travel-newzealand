parentApp.controller('DashboardCtrl', function($scope, $http, $timeout, $locale, $window,$location,$rootScope) {
	$scope.loading = true;
	$rootScope.activePath = $location.path();
	$scope.initCalendar = function() {
		$scope.loading = true;
		$http.get('/parent/api/assignments/calendar')
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
			  defaultView: 'month',
			  scrollTime: '00:00:00',
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
	      	$scope.initCalendar();
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