angular.module('foodDeliveryApp')
    .controller('OrderController', orderController);

function orderController($scope, $rootScope, $routeParams, DataService) {
    $scope.id = $routeParams.id;
    DataService.getOrderDetail($scope.id, function (response) {
        $scope.orderDetailList = response;
    });

    $scope.emptyBasket = function () {
        $rootScope.basket = [];
    }
}