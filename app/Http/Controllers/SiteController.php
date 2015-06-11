<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index() {
		$data = [
			'recipes' => \App\Recipe::join('users','users.id','=','recipes.recipe_author')
			->leftJoin('media', function($leftJoin) {
				$leftJoin->on('media.media_recipeid','=','recipes.id');
			})
			->leftJoin('favorites', function($leftJoin) {
				$leftJoin->on('favorites.favorites_recipeid','=','recipes.id');
			})
			->get([
				'recipes.created_at',
				'recipes.id',
				'recipes.recipe_title',
				'recipes.recipe_slug',
				'recipes.recipe_description',
				'media.media_filename',
				'users.username',
				'users.display_name',
				'favorites.favorites_userid'
			])
		];
		//return $data;
		return view('site.index', $data);
	}

}
