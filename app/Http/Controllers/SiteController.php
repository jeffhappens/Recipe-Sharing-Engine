<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index() {
			$data = [
				'recipes' => \App\Recipe::leftJoin('media', function($leftJoin) {
					$leftJoin->on('media.media_recipeid','=','recipes.id');
				})
				->join('users','users.id','=','recipes.recipe_author')
				->orderby('recipes.created_at','desc')
				->get([
					'recipes.created_at',
					'recipes.id',
					'recipes.recipe_title',
					'recipes.recipe_slug',
					'recipes.recipe_description',
					'media.media_filename',
					'users.username',
					'users.display_name'
				])
			];

		return view('site.index', $data);
	}

}
