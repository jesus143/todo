<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// default routes
Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// todo routs
Route::get('todo', function(){
	return view('pages.todo', ['user'=>Auth::user()]);
});
Route::get('todos', function(){

//	dd(App\Todo::all());
	return App\Todo::where('user_id', Auth::user()->id)->get();
});
Route::post('addTodo', function() {

	$inputs = array_merge(Input::all(), array('user_id'=>Auth::user()->id));
	return App\Todo::create($inputs);
});

// angular test routes

Route::group(['prefix'=> 'home', 'middleware'=> 'auth'], function(){
	Route::get('/', function(){
		return view('pages.angular');
	});
	Route::get('get_onload', function(){
		return "page loaded http get request";
	});
	Route::post('http/done', function(){
		$todo = App\Todo::find(Input::get('id'));
		$todo->done = Input::get('done');
 
		if($todo->save()) {
			return 'successfully updated';
		} else {
			return 'failed to update';
		}
	});
});


