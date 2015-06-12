<?php namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;



	class RecipeController extends Controller {

		public function recipes() {
			$data = [
				'recipes' => \App\Recipe::leftJoin('media', function($leftJoin) {
					$leftJoin->on('media.media_recipeid','=','recipes.id');
				})
				->leftJoin('favorites', function($leftJoin) {
					$leftJoin->on('favorites.favorites_recipeid','=','recipes.id');
				})				
				->join('users','users.id','=','recipes.recipe_author')
				->orderby('recipes.created_at','desc')
				->get([
					'recipes.id',
					'recipes.recipe_title',
					'recipes.recipe_slug',
					'recipes.recipe_description',
					'recipes.created_at',
					'media.media_filename',
					'users.display_name',
					'users.username'
				])
			];
			return view('recipes.index', $data);
		}






		public function single($id,$slug) {

			$data = [
				'single' => \App\Recipe::leftJoin('users', function($leftJoin) {
					$leftJoin->on('users.id','=','recipes.recipe_author');
				})
				->leftJoin('favorites', function($leftJoin) {
					$leftJoin->on('favorites.favorites_recipeid','=','recipes.id');
				})
				->join('media','media.media_recipeid','=','recipes.id')
				->join('instructions','instructions.instructions_recipeid','=','recipes.id')
				->join('ingredients','ingredients.ingredient_recipeid','=','recipes.id')
				->where('recipes.id', $id)
				->get([
					'recipes.id',
					'recipes.recipe_title',
					'recipes.recipe_description',
					'recipes.created_at',
					'recipes.recipe_enable_comments',
					'users.display_name',
					'media.media_filename',
					'ingredients.ingredient_name',
					'instructions.instructions_name',
					'favorites.favorites_userid'

				])
			];
			return view('recipes.single', $data);

		}

	}
