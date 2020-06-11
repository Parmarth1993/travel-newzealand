teacherApp.controller('AnnouncementsCtrl', function($scope, $http, $timeout, $locale,$location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.announcement = {};
	$scope.announcementBtn = 'Post Announcement';
	$timeout(function() {
		$scope.getAnnouncements();
	},250);
	$scope.postAnnouncement = function () {
		$http.post('/teacher/api/announcement', $scope.announcement)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.announcementForm.$setUntouched();
		  		$scope.getAnnouncements();
		  		$scope.announcement = {};
		  		swal('Done', response.message, "success");
		  		$('#announcements').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.getAnnouncements = function () {
		$http.get('/teacher/api/announcements')
		.then(function (response) {
		  	var response = response.data;
		  	$scope.announcements = response.announcements;
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.editAnnouncement = function(announcement) {
		$scope.announcementBtn = 'Update Announcement'; 
		$scope.announcement = announcement;
		$('#announcements').modal('show');
	}

	$scope.deleteAnnouncement = function(announcement) {
		swal({
          title: 'Delete Announcement?',
          text: "You sure you want to delete announcement " + announcement.name + ".",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
        if(confirm) {
          $http.delete('/teacher/api/announcement/delete/' + announcement.id)
          .then(function (response) {
          	if(response.data.status) {          		
	            $scope.getAnnouncements();
	            swal('Deleted', response.data.message, "success");
          	} else {
          		swal('Error', response.data.message, "error");
          	}
          }, function (error) {
            if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
          });
        }
      });
	}

	$scope.toggleAnnouncement = function(index) {
		$('#accordion .collapse').removeClass('show');
		$('#collapseOne' + index).addClass('show');
	}

	$scope.bindDatePicker = function() {
		
		var dateFormat = "mm/dd/yy";
			$scope.start_date = $( "#announcement_date" )
				.datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					minDate: 0
				})
				.on( "change", function() {
					$timeout(function() {
						// if($routeParams && $routeParams.id && $routeParams.id !='') {
						// 	$scope.assignment.start_date = $('#start_date').val();
						// } 
						// $scope.due_date.datepicker( "option", "minDate", $scope.assignment.start_date );
					}, 250);
				});
		}
});