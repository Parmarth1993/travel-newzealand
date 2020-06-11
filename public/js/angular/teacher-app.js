var teacherApp = angular.module("teacherApp", ["ngRoute","angularUtils.directives.dirPagination", "ngSanitize"]);

/*
* Routing
*/
teacherApp.config(function($routeProvider, $locationProvider) {
    $locationProvider.html5Mode(true);
    
    $routeProvider
    .when("/teacher", {
        templateUrl : "templates/teacher/dashboard.html",
        controller: 'DashbaordCtrl'
    })
    .when("/teacher/calendar", {
        templateUrl : "templates/teacher/calendar.html",
        controller: 'CalendarCtrl'
    })
    .when("/teacher/events", {
        templateUrl : "templates/teacher/events.html",
        controller: 'EventsCtrl'
    })
    .when("/teacher/behavior", {
        templateUrl : "templates/teacher/behavior.html",
        controller: 'BehaviorCtrl'
    })
    .when("/teacher/profile", {
        templateUrl : "templates/teacher/profile.html",
        controller: 'ProfileCtrl'
    })
    .when("/teacher/assignments", {
        templateUrl : "templates/teacher/assignments.html",
        controller: 'AssignmentsCtrl'
    })
    .when("/teacher/announcements", {
        templateUrl : "templates/teacher/announcements.html",
        controller: 'AnnouncementsCtrl'
    })
    .when("/teacher/students", {
        templateUrl : "templates/teacher/students.html",
        controller: 'StudentsCtrl'
    })
    .when("/teacher/assignment/:id", {
        templateUrl : "templates/teacher/assignment.html",
        controller: 'AssignmentsCtrl'
    })
    .when("/teacher/assignment/:id/student/:student", {
        templateUrl : "templates/teacher/assignment-submitted.html",
        controller: 'AssignmentsCtrl'
    })
    .when("/teacher/inbox", {
        templateUrl : "templates/teacher/inbox.html",
        controller: 'InboxCtrl'
    })
    .when("/teacher/outbox", {
        templateUrl : "templates/teacher/outbox.html",
        controller: 'OutboxCtrl'
    })
    .when("/teacher/notifications", {
        templateUrl : "templates/teacher/notifications.html",
        controller: 'NavigationCtrl'
    })
    .otherwise("/teacher", {
        templateUrl : "templates/teacher/dashboard.html"
    });
});

teacherApp.filter
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

teacherApp.directive("ngUploadChange",function(){
    return{
        scope:{
            ngUploadChange:"&"
        },
        link:function($scope, $element, $attrs){
            $element.on("change",function(event){
                if(event.target && event.target.files && event.target.files[0] && (event.target.files[0].size) > 6842880) {
                    swal("Error", "File size should not be more than 5 MB.", "error");
                } else {
                    $scope.$apply(function(){
                        $scope.ngUploadChange({$event: event})
                    })                    
                }
            })
            $scope.$on("$destroy",function(){
                $element.off();
            });
        }
    }
});

teacherApp.filter('fromNow', function() {
  return function(date) {
    return moment(date).fromNow();
  }
});

teacherApp.directive('showMore', [function() {
    return {
        restrict: 'AE',
        replace: true,
        scope: {
            text: '=',
            limit:'='
        },

        template: '<div><p ng-show="largeText"> {{ text | subString :0 :end }}.... <a href="javascript:;" ng-click="showMore()" ng-show="isShowMore">Show More</a><a href="javascript:;" ng-click="showLess()" ng-hide="isShowMore">Show Less </a></p><p ng-hide="largeText">{{ text }}</p></div> ',

        link: function(scope, iElement, iAttrs) {

            
            scope.end = scope.limit;
            scope.isShowMore = true;
            scope.largeText = true;

            if (scope.text.length <= scope.limit) {
                scope.largeText = false;
            };

            scope.showMore = function() {

                scope.end = scope.text.length;
                scope.isShowMore = false;
            };

            scope.showLess = function() {

                scope.end = scope.limit;
                scope.isShowMore = true;
            };
        }
    };
}]);


teacherApp.filter('subString', function() {
    return function(str, start, end) {
        if (str != undefined) {
            return str.substr(start, end);
        }
    }
})

teacherApp.directive('loading', function () {
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