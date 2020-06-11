teacherApp.controller('ProfileCtrl', function($scope, $http, $timeout, $locale, $location, $rootScope) {
	$rootScope.activePath = $location.path();
	$scope.user = {password: '', confirm_password: '', profile_pic: '/uploads/profiles/l60Hf.png'};
	$scope.showProfile = true;
	$scope.months = $locale.DATETIME_FORMATS.MONTH;
	$scope.currentYear = new Date().getFullYear() + 1;
	$scope.support = {};
	$scope.loading = true;
	$scope.schools = [];
	$scope.show_schools = false;

	$timeout(function () {
		$scope.me();
	},500);

	$('#supportDate').datepicker({
           autoclose: true,
           startDate: "dateToday",
	    })
	      .on( "change", function() {

	});

	$scope.me = function() {
		$http.get('/teacher/api/profile')
		.then(function(response) {
		  $scope.not_listed_School_name = response.data.not_listed_School_name;
		  $scope.schools = response.data.schools;
	      $scope.user = response.data.data;
	      if($scope.user.school_name == '0') {
	      	$scope.show_schools = true;
	      } else {
	      	$scope.show_schools = false;
	      }
	      $scope.user.password =  '';
	      $scope.user.confirm_password = '';
	      $scope.email = response.data.data.email;
	      if(response.data.data.profile_pic && response.data.data.profile_pic !='') {
	      	$scope.user.profile_pic = '/uploads/profiles/' + response.data.data.profile_pic;
	      }
	      $scope.billing = response.data.billing_method;
	      $scope.loading = false;
	      $scope.paymentPlans();
	      $scope.support.email = $scope.user.email;
	    },function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.messageSupport = function(){
		$scope.loading = true;
		$http.post('/message-support', $scope.support)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Sent', response.message, "success");
		  		$scope.support = {};
		  		$('#contact-support').modal('hide');
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		  	$scope.loading = false;
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.updateProfile = function() {
		// $scope.loading = true;
		//console.log('email ===> ', $scope.email , $scope.user.email);
		if($scope.email != $scope.user.email) {
			swal({
	          title: 'Change Email?',
	          text: "After updating email you will be logged out from the system, and to login again you need to click on verification link sent to " + $scope.user.email,
	          icon: "warning",
	          buttons: true,
	          dangerMode: true,
	          html: true
	        })
	        .then((confirm) => {
		        if(confirm) {
		        	$scope.updateProfileSubmit(true);
		        }
	    	});
		} else {
			$scope.updateProfileSubmit(false);
		}
		
	}

	$scope.updateProfileSubmit = function(emailUpdate) {
		$scope.user.newschoolname = $scope.not_listed_School_name.school_name;
		$http.post('/teacher/api/profile', $scope.user)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.me();
		  		swal('Profile Updated', response.message, "success");
		  		if(emailUpdate) {
		  			$timeout(function() { 
		  				$('#logout-form').submit(); 
		  			},3000);
		  		}
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		  	$scope.loading = false;
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.addBillingMethod = function() {
		$scope.loading = true;
		$http.post('/teacher/api/billing', $scope.billing)
		.then(function (response) {
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		  	$scope.loading = false;
		},function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.paymentPlans = function () {
		$scope.loading = true;
		$http.get('/teacher/api/plans')
		.then(function(response) {
	      $scope.plans = response.data.plans;
	      $scope.loading = false;
	    },function(error){
	      if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
	      $scope.loading = false;
		});
	}

	$scope.activatePlan = function (plan) {
		swal({
          title: 'Change Plan?',
          text: "Activating plan " + plan.name + " you will be charged $" + plan.price + ".",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
        if(confirm) {
        	$scope.loading = true;
          $http.post('/teacher/api/activate-plan', {plan_id: plan.id})
          .then(function (response) {
          	if(response.data.status) {  
          		$scope.loading = false;        		
	            $scope.me();
	            swal('Done', "Your plan has been changed to " + plan.name, "success");
          	} else {
          		swal('Error', response.data.message, "error");
          	}
          }, function (error) {
          	$scope.loading = false;
            if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
          });
        }
      });
	}

	$scope.changePassword = function() {
		$scope.loading = true;
		$http.post('/teacher/api/passowrd/change', $scope.user)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.user.password = '';
		  		$scope.user.confirm_password = '';
		  		swal('Password Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.leaveSchool = function() {
		swal({
          title: 'Leave School?',
          text: "Are you sure, you want to leave this school.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      	})
      	.then((confirm) => {
        	if(confirm) {
        		$scope.loading = true;
				$http.post('/teacher/api/leave/school')
				.then(function (response) {
					$scope.loading = false;
				  	var response = response.data;
				  	if(response.status) {
				  		swal('Request Sent', response.message, "success");
				  	} else {
				  		swal('Error', response.message, "error");
				  	}
				},function(error){
					$scope.loading = false;
			      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
				});
        	}
        });
	}
});