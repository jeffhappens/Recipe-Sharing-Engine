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

Route::get('/','SiteController@index');

Route::get('/recipes','RecipeController@recipes');
Route::get('/recipes/{id}/{slug}','RecipeController@single');

Route::get('/auth/login','AuthController@login');
Route::post('/auth/login','AuthController@postLogin');
Route::get('/auth/logout','AuthController@logout');

Route::get('/refer/{email}/{token}','ReferController@refer');
Route::post('/refer/{email}/{token}','ReferController@complete');


Route::group(['middleware' => 'auth'], function() {
	// Protected routes

	Route::get('/user/recipes','UserController@recipes');

	Route::get('/user/favorites','UserController@favorites');

	Route::get('/user/share','UserController@share');
	Route::post('/user/share','UserController@postShare');

	Route::get('/user/invite','UserController@invite');
	Route::post('/user/invite','UserController@postInvite');

	//Route::get('/favorite/{id}','UserController@addFavorite');


});

Route::post('/api/favorite/{id}', function($id) {
	$input = \Input::get();

	// Check to make sure it is not already favorited
	$faveCheck = \App\Favorite::where('favorites_recipeid', $id)
		->where('favorites_userid', \Auth::user()->id)
		->get();
	if(!$faveCheck->isEmpty()) {
		$response = new StdClass;
		$response->success = false;
		return \Response::json($response);
	}
	else {
		$fave = new \App\Favorite;
		$fave->favorites_userid = \Auth::user()->id;
		$fave->favorites_recipeid = $input['recipeid'];
		if($fave->save()) {
			$response = new StdClass;
			$response->success = true;
			$response->recipe = \App\Recipe::find($fave->favorites_recipeid);
			return \Response::json($response);
		}
	}
});


Route::post('/api/unfavorite', function() {
	$input = \Input::get();
	$fave = \App\Favorite::where('favorites_userid', \Auth::user()->id)
	->where('favorites_recipeid', $input['recipeid'])->delete();
	return \Response::json($input);
});





