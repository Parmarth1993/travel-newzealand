schoolApp.controller('SubscriptionsCtrl', function($scope, $http, $timeout, $locale) {

	$scope.months = $locale.DATETIME_FORMATS.MONTH;
	$scope.currentYear = new Date().getFullYear() + 1;
	$scope.support = {};
	$scope.loading = true;

	$('#supportDate').datepicker({
           autoclose: true,
           startDate: "dateToday",
	    })
	      .on( "change", function() {

	});

	$scope.me = function() {
		$scope.loading = true;
		$http.get('/school/profile')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.user = response.data.data;
	      	$scope.user.password =  '';
	      	$scope.user.confirm_password = '';
	      	if(response.data.data.profile_pic && response.data.data.profile_pic !='') {
	      		$scope.user.profile_pic = '/uploads/profiles/' + response.data.data.profile_pic;
	      	}
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

	$scope.addBillingMethod = function() {
		$scope.loading = true;
		$http.post('/school/billing', $scope.billing)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		swal('Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.paymentPlans = function () {
		$scope.loading = true;
		$http.get('/school/plans')
		.then(function(response) {
			$scope.loading = false;
	      	$scope.plans = response.data.plans;
	      	$scope.billing = response.data.billing;
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("Session Expired", "Your session is expired, please login again to continue.", "error"); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
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
          	$http.post('/school/activate-plan', {plan_id: plan.stripe_plan_id})
          	.then(function (response) {
          		$scope.loading = false;
          		if(response.data.status) {          		
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
});