var schoolApp = angular.module("schoolApp", ["ngRoute","angularUtils.directives.dirPagination"]);

/*
* Routing
*/
schoolApp.config(function($routeProvider, $locationProvider) {
   $locationProvider.html5Mode(true);
    $routeProvider
    .when("/school", {
        templateUrl : "templates/school/dashboard.html",
        controller: 'DashbaordCtrl'
    })
    .when("/school/profile", {
        templateUrl : "templates/school/profile.html",
        controller: 'ProfileCtrl'
    })
    .when("/school/teachers", {
        templateUrl : "templates/school/teachers.html",
        controller: 'TeachersCtrl'
    })
    // .when("/subscriptions", {
    //     templateUrl : "templates/school/subscriptions.html",
    //     controller: 'SubscriptionsCtrl'
    // })
    .otherwise("/school", {
        templateUrl : "templates/school/dashboard.html"
    });
});

schoolApp.filter
  ( 'range'
  , function() {
      var filter = 
        function(arr, lower, upper) {
          for (var i = lower; i <= upper; i++) arr.push(i)
          return arr
        }
      return filter
    }
  )

schoolApp.directive("ngUploadChange",function(){
    return{
        scope:{
            ngUploadChange:"&"
        },
        link:function($scope, $element, $attrs){
            if(event.target && event.target.files && event.target.files[0] && (event.target.files[0].size / 1000) > 5000) {
              swal("Error", "File size should not be more than 5 MB.", "error");
            } else {
                $scope.$apply(function(){
                    $scope.ngUploadChange({$event: event})
                })                    
            }
            $scope.$on("$destroy",function(){
                $element.off();
            });
        }
    }
});
schoolApp.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="/img/ajax-loader.gif"  /></div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
});