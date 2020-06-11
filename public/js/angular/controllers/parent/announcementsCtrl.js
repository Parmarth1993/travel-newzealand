parentApp.controller('AnnouncementsCtrl', function($scope, $http, $timeout, $locale, $window, $rootScope,$location) {
	$scope.announcement = {};
	$scope.announcementBtn = 'Post Announcement';
	$rootScope.activePath = $location.path();
	$timeout(function() {
		$scope.getAnnouncements();
	},250);
	$scope.loading = true;

	$scope.getAnnouncements = function () {
		$scope.loading = true;
		$http.get('/parent/api/announcements')
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	$scope.announcements = response.announcements;
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}


	$scope.toggleAnnouncement = function(index) {
		$('#accordion .collapse').removeClass('show');
		$('#collapseOne' + index).addClass('show');
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