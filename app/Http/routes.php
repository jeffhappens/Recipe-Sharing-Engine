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

Route::get('/recipes/category/{slug}','RecipeController@getByCategory');

Route::get('/recipes/{id}/{slug}','RecipeController@single');



Route::get('/auth/login','AuthController@login');
Route::post('/auth/login','AuthController@postLogin');
Route::get('/auth/logout','AuthController@logout');

Route::get('/refer/{email}/{token}','ReferController@refer');
Route::post('/refer/{email}/{token}','ReferController@complete');

Route::get('/member/{id}','MemberController@profile');


Route::group(['middleware' => 'auth'], function() {
	// Protected routes

	Route::get('/user/recipes','UserController@recipes');

	Route::get('/user/favorites','UserController@favorites');

	Route::get('/user/share','UserController@share');
	Route::post('/user/share','UserController@postShare');

	Route::get('/user/invite','UserController@invite');
	Route::post('/user/invite','UserController@postInvite');

	Route::get('/admin','AdminController@index');
	Route::get('/admin/users','AdminController@users');
	Route::get('/admin/recipes','AdminController@recipes');

	Route::post('/api/photos/upload', function() {
		move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$_FILES['file']['name']);
		return 'File Uploaded';
	});
	Route::post('/api/photos/remove', function() {
		$filename = \Input::get('filename');
		unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/'.$filename);
		return $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$filename;
		//return 'File Removed';
		
	});



});

Route::post('/api/favorite/{id}', function($id) {
	$input = \Input::get();

	if(!\Auth::check()) {
		$response = new StdClass;
		$response->success = false;
		$response->errorCode = 503;
		$response->errorText = \Config::get('strings.unauthorized');
		return \Response::json($response);
	}

	// Check to make sure it is not already favorited
	$faveCheck = \App\Favorite::where('favorites_recipeid', $id)
		->where('favorites_userid', \Auth::user()->id)
		->get(['favorites.id']);

	if(!$faveCheck->isEmpty()) {
		$response = new StdClass;
		$response->success = false;
		$response->errorText = \Config::get('strings.alreadyFavorited');
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


Route::post('/api/unfavorite/{id}', function($id) {
	$input = \Input::get();
	$fave = \App\Favorite::where('favorites_userid', \Auth::user()->id)
	->where('favorites_recipeid', $id)->delete();
	
	return \Response::json($input);
});





