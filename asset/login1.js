
var mymodal1 = angular.module('mymodal1', []);

mymodal1.controller('MainCtrl1', function ($scope) {
    $scope.showtes1 = false;
    $scope.toggletes1 = function(){
        $scope.showtes1 = !$scope.showtes1;
    };
  });

mymodal1.directive('modal1', function () {
    return {
      template: '<div class="modal fade">' + 
          '<div class="modal-dialog modal-lg">' + 
            '<div class="modal-content modal-lg">' + 
              '<div class="modal-header modal-lg">' + 
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' + 
                '<h4 class="modal-title">{{ title }}</h4>' + 
              '</div>' + 
              '<div class="modal-body" ng-transclude></div>' + 
            '</div>' + 
          '</div>' + 
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;

        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });

mymodal1.controller('MainCtrl', function ($scope) {
    $scope.showtes = false;
    $scope.toggletes = function(){
        $scope.showtes = !$scope.showtes;
    };
  });

mymodal1.directive('modal', function () {
    return {
      template: '<div class="modal fade">' + 
          '<div class="modal-dialog modal-sm">' + 
            '<div class="modal-content modal-sm">' + 
              '<div class="modal-header modal-sm">' + 
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' + 
                '<h4 class="modal-title">{{ title }}</h4>' + 
              '</div>' + 
              '<div class="modal-body" ng-transclude></div>' + 
            '</div>' + 
          '</div>' + 
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;

        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });

