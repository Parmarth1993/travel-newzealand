var parentApp = angular.module("parentApp", ["ngRoute","angularUtils.directives.dirPagination", "ngSanitize"]);

/*
* Routing
*/
parentApp.config(function($routeProvider, $locationProvider) {
  $locationProvider.html5Mode(true);
    $routeProvider
    .when("/parent", {
        templateUrl : "templates/parent/dashboard.html",
        controller: 'DashboardCtrl'
    })
    .when("/parent/profile", {
        templateUrl : "templates/parent/profile.html",
        controller: 'ProfileCtrl'
    })
    .when("/parent/children", {
        templateUrl : "templates/parent/childrens.html",
        controller: 'ChildrenCtrl'
    })
    .when("/parent/calendar", {
        templateUrl : "templates/parent/calendar.html",
        controller: 'CalendarCtrl'
    })
    .when("/parent/events", {
        templateUrl : "templates/parent/events.html",
        controller: 'EventsCtrl'
    })
    .when("/parent/behavior", {
        templateUrl : "templates/parent/behavior.html",
        controller: 'BehaviorCtrl'
    })
    .when("/parent/assignments", {
        templateUrl : "templates/parent/assignments.html",
        controller: 'AssignmentsCtrl'
    })
    .when("/parent/announcements", {
        templateUrl : "templates/parent/announcements.html",
        controller: 'AnnouncementsCtrl'
    })
    .when("/parent/assignment/:id", {
        templateUrl : "templates/parent/assignment.html",
        controller: 'AssignmentsCtrl'
    })
    .when("/parent/inbox", {
        templateUrl : "templates/parent/inbox.html",
        controller: 'InboxCtrl'
    })
    .when("/parent/notifications", {
        templateUrl : "templates/parent/notifications.html",
        controller: 'NavigationCtrl'
    })
    .otherwise("/parent", {
        templateUrl : "templates/parent/dashboard.html"
    });
});

parentApp.filter
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

parentApp.directive("ngUploadChange",function(){
    return{
        scope:{
            ngUploadChange:"&"
        },
        link:function($scope, $element, $attrs){
            $element.on("change",function(event){
                if(event.target && event.target.files && event.target.files[0] && (event.target.files[0].size) > 6242880) {
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

parentApp.filter('fromNow', function() {
  return function(date) {
    return moment(date).fromNow();
  }
});

parentApp.directive('showMore', [function() {
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


parentApp.filter('subString', function() {
    return function(str, start, end) {
        if (str != undefined) {
            return str.substr(start, end);
        }
    }
})

parentApp.directive('loading', function () {
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

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}