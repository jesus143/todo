var routeBase = 'http://localhost/practice/laravel/todo';
var app = angular.module('myApp', []);



//get response
/**
 * .delete()
 * .get()
 * .head()
 * .jsonp()
 * .patch()
 * .post()
 * .put()
 */
app.controller('myCtrl', function($scope, $http){



    //autoload data and send qet request to a controller
   $http({
        method: "GET",
        url:routeBase +'/angular/get_onload'
   })
   .then(function($response){
       $scope.content_http = $response.data;
       $scope.statuscode_http = $response.status;
       $scope.statustext_http = $response.statustext;
   }, function myError($response) {
        $scope.response_http = $response.statusText;
   });


    //
    //$scope.todos = [
    //    {text: "THis is todo text1", done:false },
    //    {text: "THis is todo text2", done:false }
    //];


    $http.get(routeBase +'/todos')
    .then(function(response) {
        $scope.todos = response.data;
    }, function(response) {
        $scope.content = "Something went wrong";
    });


    // submit post action to a controller
    $scope.addNew = function() {
        var todo = {text: $scope.todotxt, done: false};
        $scope.todotxt = "";


        $scope.todos.push(todo);

        $http.post(routeBase + '/addTodo', todo). then(function($response){
            $scope.statusMessage = $response.status == 200 ? "<span style='color:red'>successfully posted</span>" : "failed to post";
        });
    };


    //load list of array and display in the view
    $scope.showNames = function() {
       $scope.friends = [
           {name:'John', age:25, gender:'boy'},
           {name:'Jessie', age:30, gender:'girl'},
           {name:'Johanna', age:28, gender:'girl'},
           {name:'Joy', age:15, gender:'girl'},
           {name:'Mary', age:28, gender:'girl'},
           {name:'Peter', age:95, gender:'boy'},
           {name:'Sebastian', age:50, gender:'boy'},
           {name:'Erika', age:27, gender:'girl'},
           {name:'Patrick', age:40, gender:'boy'},
           {name:'Samantha', age:60, gender:'girl'}
       ];
    };

    // push to list of array amd display in the view
    $scope.pushNewName = function () {
        $scope.friends.push({name: 'John', age:25, gender:'boy'})
    };



    //sort order

    $scope.orderByMe = function(x) {
        $scope.myOrderBy = x;
    };


    // done clicked

    $scope.checkIfChecked = function(status) {
           console.log( " status = " + $scope.checkboxModel);
        //$scope.myStyle = {color:'red'};
    };




    // detect if checked or not


    $scope.isStateChange = function (id) {
        //console.log("test")l
        //if($scope.done[id]) {
        //    console.log(id + 'checked');
        //} else {
        //    console.log(id + 'unchecked');
        //}
    };


    /**
     * Turn todo list to done
     * use http request to update the todo application list
     */

    $scope.todoCheckbox = [];
    $scope.todoDoneChange = function (id){
        $http.post(routeBase + '/home/http/done', {id:id, done:$scope.todoCheckbox[id]}).then(function($response){
            console.log(response.data);
        });
    };


    // multiple ng-click used
    $scope.click1 = function() {
        alert("click1 ");
    };

    $scope.click2 = function() {
        alert("click2");
    };
});


// post response


