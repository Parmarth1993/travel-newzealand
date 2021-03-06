schoolApp.controller('ProfileCtrl', function($scope, $http, $timeout, $locale,$location,$rootScope) {
	$scope.loading = true;
	$rootScope.activePath = $location.path();
	$scope.user = {password: '', confirm_password: '', profile_pic: '/uploads/profiles/l60Hf.png'};
	$scope.showProfile = true;
	$scope.months = $locale.DATETIME_FORMATS.MONTH;
	$scope.currentYear = new Date().getFullYear() + 1;

	$scope.support = {};

	$('#supportDate').datepicker({
           autoclose: true,
           startDate: "dateToday",
           minDate: 0
	    })
	      .on( "change", function() {

	});

	$scope.me = function() {
		$scope.loading = true;
		$http.get('/school/api/profile')
		.then(function(response) {
			$scope.loading = false;
		    $scope.user = response.data.data;
		    $scope.user.password =  '';
		    $scope.user.confirm_password = '';
		    if(response.data.data.profile_pic && response.data.data.profile_pic !='') {
		      	$scope.user.profile_pic = '/uploads/profiles/' + response.data.data.profile_pic;
		    }
		    $scope.support.email = $scope.user.email;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.messageSupport = function(){
		$scope.loading = true;
		$http.post('/message-support', $scope.support)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Sent', response.message, "success");
		  		$scope.support = {};
		  		$('#contact-support').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.updateProfile = function() {
		$scope.loading = true;
		$http.post('/school/api/profile', $scope.user)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Profile Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.changePassword = function() {
		$scope.loading = true;
		$http.post('/school/api/passowrd/change', $scope.user)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Password Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}
});