
@extends('app')

@section('content')

    <?php
        /**
         * resources: editor https://jsbin.com/gilatetuce/edit?html,js,output
         *
         * Checkbox:
         * src: http://stackoverflow.com/questions/27411826/detect-if-checkbox-is-checked-or-unchecked-in-angularjs-ng-change-event
         * src: https://docs.angularjs.org/api/ng/function/angular.bootstrap
         * src: http://www.w3schools.com/angular/
         * src: http://stackoverflow.com/questions/22322568/angularjs-detecting-which-checkbox-in-an-ngrepeat-is-checked-unchecked-and-call
         */
    ?>

 <div class="container">
     <hr>

     <div  ng-controller="myCtrl">
         <h3> Http request</h3>
         <p>Http request content = @{{   content_http }}</p>
         <p>Http request statuscode = @{{   statuscode_http }}</p>
         <p>Http request statustext = @{{   statustext_http }}</p>
         <span> @{{statusMessage}} </span>
         <input type="text" placeholder="search" ng-model="searchTodo" />
         <ul class="unstyled">
             <li ng-hide="todo_delete[todo.id]" ng-repeat="todo in todos | filter:searchTodo" ng-init="todo.done == true ? myStyle={'font-weight':'bold', 'color':'red', 'text-decoration': 'line-through', 'opacity':'0.5'} : myStyle={}" >
                 <input type="checkbox" ng-checked="@{{todo.done}}" ng-model="todoCheckbox[todo.id]" ng-click="(todoCheckbox[todo.id] == true ? myStyle={'font-weight':'bold', 'color':'red', 'text-decoration': 'line-through', 'opacity':'0.5'} : myStyle={});  todoDoneChange(todo.id);"    >
                 <span ng-style="myStyle" > @{{todo.id}} @{{ todo.text }} </span>

                 &nbsp;&nbsp;
                 <span style="cursor:pointer" ng-click="todoDelete(todo.id)" class="glyphicon glyphicon-trash" aria-hidden="true"  style="color:#29292c" >delete</span>
                 &nbsp;&nbsp;
                 <span style="cursor:pointer" class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:#472b28" >edit</span>
            </li>
         </ul>
         <form ng-submit="addNew()">
             <input type="text" ng-model="todotxt">
             <button type="submit" class="btn btn-primary" >Add new</button>
         </form>
         <input type="text" ng-model="search" placeholder="search" >
         <ul>
             <li ng-repeat="friend in friends | filter:search | orderBy:myOrderBy" style="list-style:none" >
                @{{$index + 1}} @{{ friend.name }} @{{friend.age}}
             </li>
         </ul>
         <button ng-click="showNames()" > Show list of array for each </button>
         <button ng-click="pushNewName()"> Add new name</button>
         <button ng-click="orderByMe('name')" >Name </button>
         <button ng-click="orderByMe('age')" >Age </button>

         <button ng-click="click1(); click2()" >Multiple ng-click</button>


     </div>
     <hr>
 </div>
 <div ng-controller="ChckbxsCtrl">
     <div ng-repeat="chk in chkbxs">
         <input type="checkbox" ng-model="chk.val" />
         <label>@{{chk.label}}</label> asdas
     </div>
     <div ng-show="flag">I'm ON when band choosed</div>
 </div>
@endsection