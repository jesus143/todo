


@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Todo Application</div>

                    <div class="panel-body">


                        <div id="todos" ng-controller="TodoCtrl">
                            <h3 class="page-header">
                                Todos
                                <small ng-if="remaining()">(@{{remaining()}}) remaining</small>
                            </h3>

                            <ul class="unstyled">
                                <li ng-repeat="todo in todos" >
                                    <input type="checkbox" ng-model="todo.done">
                                    @{{ todo.text }}
                                </li>
                            </ul>



                            <h3 class="page-header">Add new</h3>
                            <form ng-submit="addNew()">
                                <input type="text" ng-model="todotext">
                                <button type="submit" class="btn btn-primary">Add new</button>
                            </form>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

