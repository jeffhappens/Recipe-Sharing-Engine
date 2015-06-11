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
				//'single' => \App\Recipe::find($id),
				'single' => \App\Recipe::join('users','users.id','=','recipes.recipe_author')
				->where('recipes.id', $id)->get(),

				'media' => \App\Media::where('media_recipeid', $id)->get(),

				'ingredients' => \App\Ingredient::where('ingredient_recipeid', $id)->get(),
				
				'instructions' => \App\Instruction::where('instructions_recipeid', $id)->get()
			];
			return view('recipes.single', $data);
		}

	}
