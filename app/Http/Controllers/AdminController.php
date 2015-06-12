<?php
	
	namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	class AdminController extends Controller {

		public function index() {
			return view('admin.index');
		}




		public function users() {
			$data = [
				'users' => \App\User::get()
			];
			return view('admin.users', $data);
		}




		public function recipes() {
			$data = [
				'recipes' => \App\Recipe::join('users','users.id','=','recipes.recipe_author')
				->get([
					'recipes.recipe_title',
					'users.username',
					'recipes.created_at'
				]),
				'userCount' => \App\User::get()
			];
			return view('admin.recipes', $data);
		}




		
	}
