parentApp.controller('ChildrenCtrl', function($scope, $http, $timeout, $locale, $window,$rootScope,$location) {

	$scope.user = {password: '', confirm_password: '', profile_pic: '/uploads/profiles/l60Hf.png'};
	$scope.support = {};
	$rootScope.activePath = $location.path();
	$scope.loading = true;
	$scope.selected_child = {};
	$scope.showProfile = true;
	$scope.teachpar_schoool_data = [];

	$('#supportDate').datepicker({
           autoclose: true,
           startDate: "dateToday",
	    })
	      .on( "change", function() {

	});

	$scope.me = function() {
		$scope.loading = true;
		$http.get('/parent/api/profile')
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
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
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
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.updateProfile = function() {
		$scope.loading = true;
		$http.post('/parent/api/profile', $scope.user)
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
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	$scope.updateChildProfile = function() {
		$scope.loading = true;
		$http.post('/parent/api/profile/child', {child:$scope.selected_child, parent: $scope.user})
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
	      	$scope.teachpar_schoool_data = response.data.data;
	      	var selectedChild = getCookie('teachpar_selected_child');
	      	if(selectedChild && selectedChild != null) {
	      		$scope.childrens.map(function(val) {
	      			if(val.id == JSON.parse(selectedChild)) {
	      				$scope.selected_child = val;
	      			}
	      		})
	      	} else {
	      		$scope.selected_child = ($scope.childrens && $scope.childrens[0] && $scope.childrens[0]) ? $scope.childrens[0] : "";
	      		setCookie('teachpar_selected_child', $scope.childrens[0].id);
	      	}
	      	console.log('$scope.selected_child ',  $scope.teachpar_schoool_data[$scope.selected_child.id].teacher);
	    },function(error){
	    	$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}

	// $scope.childSelectionChanged = function () {
	// 	swal({
 //          title: 'Change Children Profile?',
 //          text: "You sure you want to switch to selected child's dashboard?",
 //          icon: "warning",
 //          buttons: true,
 //          dangerMode: true,
 //          html: true
 //      	})
 //      	.then((confirm) => {
	//         if(confirm) {
	//         	delete $scope.selected_child.parents;
	// 			setCookie('teachpar_selected_child', JSON.stringify($scope.selected_child));
	// 			$window.location.reload();
	// 		}
	// 	});
	// }
	$scope.changePassword = function() {
		$scope.loading = true;
		$http.post('/parent/api/passowrd/change', $scope.user)
		.then(function (response) {
			$scope.loading = false;
		  	var response = response.data;
		  	if(response.status) {
		  		$scope.user.passowrd = '';
		  		$scope.user.confirm_password = '';
		  		swal('Password Updated', response.message, "success");
		  	} else {
		  		swal('Error', response.message, "error");
		  	}
		},function(error){
			$scope.loading = false;
	      	if(error.data.message == 'Unauthenticated.') { swal("", "Your session is expired, please login again to continue.", ""); $timeout(function() { $('#logout-form').submit(); },3000);} else { swal("Error", error.data.message, "error"); }
		});
	}
});