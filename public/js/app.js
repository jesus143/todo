
$(document).ready(function(){
    console.log("this is jquery and its ready document.ready" );
});


$(function(){
    console.log("this is jquery  function() and its ready ");
});




function TodoCtrl($scope, $http){

    $http.get('/todos').success(function(todos){

        console.log("this is todo ");
        $scope.todos = todos;
    });


    $scope.remaining = function () {

        var count = 0;
        angular.forEach($scope.todos, function(todo){
            count+=todo.done ? 0 : 1;

            return count;
        });
    }
}