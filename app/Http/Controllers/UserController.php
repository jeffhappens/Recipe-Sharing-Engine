<?php

	namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;


	class UserController extends Controller {

		public function recipes() {
			$data = [
				'recipes' => \App\Recipe::leftJoin('media', function($leftJoin) {
					$leftJoin->on('media.media_recipeid','=','recipes.id');
				})
				->where('recipe_author', \Auth::user()->id)
				->get([
					'recipes.id',
					'recipes.recipe_title',
					'recipes.created_at',
					'recipes.recipe_slug',
					'recipes.recipe_description',
					'media.media_filename'
				])
			];
			
			return view('user.recipes', $data);
		
		}





		public function favorites() {
			$data = [
				'favorites' => \App\Favorite::join('recipes','recipes.id','=','favorites.favorites_recipeid')
				->leftJoin('media', function($leftJoin) {
					$leftJoin->on('media.media_recipeid','=','recipes.id');
				})
				->where('favorites.favorites_userid', \Auth::user()->id)
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
			return view('user.favorites', $data);
		}





		public function addFavorite($recipeid) {

			$checkFavorite = \App\Favorite::where('favorites.favorites_recipeid', $recipeid)
			->where('favorites.favorites_userid', \Auth::user()->id)
			->get(['favorites.id']);

			// Make sure not already favorited
			if($checkFavorite->isEmpty()) {
				$favorite = new \App\Favorite;
				$favorite->favorites_userid = \Auth::user()->id;
				$favorite->favorites_recipeid = $recipeid;
				$favorite->save();
				\Session::flash('success','Added to Favorites');
				return \Redirect::to('/recipes');
			}
			else {
				\Session::flash('error','You have already favorited this recipe');
				return \Redirect::to('/recipes');
			}			

		}




		public function invite() {

			return view('user.invite');

		}





		public function postInvite() {

			$data = [
				'first_name' => \Input::get('first_name'),
				'last_name' => \Input::get('last_name'),
				'email' => \Input::get('email'),
				'invite_token' => \Input::get('_inviteToken'),
				'inviter' => \Auth::user()->display_name
			];

			$email = \App\User::where('username', $data['email'])
			->get();

			if(!$email->isEmpty()) {
				\Session::flash('error','That user already exists in our system');
				return \Redirect::to('/user/invite');
			}

			// Write the new profile to the DB
			$invitee = new \App\User;
			$invitee->username = $data['email'];
			$invitee->first_name = $data['first_name'];
			$invitee->last_name = $data['last_name'];
			$invitee->display_name = $data['first_name'].' '.$data['last_name'];
			$invitee->invite_token = $data['invite_token'];
			$invitee->role = 'user';
			$invitee->save();

			// Decrement inviters invite count
			$user = \App\User::find(\Auth::user()->id);
			$user->decrement('invites');
			$user->save();

			// Send the invite
			\Mail::send('emails.invite', $data, function($message) use ($data) {
				$message->to($data['email'], $data['first_name'].' '.$data['last_name'])->subject('Welcome!');
			});

			// Flash a response the the next request
			\Session::flash('success','Great! We just sent '.$data['first_name'].' an email letting them know.');

			return \Redirect::to('/user/invite');
		}





		public function share() {
			$data = [
				'categories' => \App\Category::get(['id','category_title'])
			];
			return view('user.share', $data);
		}




		public function postShare() {

			//return \Response::json(\Input::get());
			
			$replaceChars = [" "];

			$recipe = new \App\Recipe;
			$recipe->recipe_title = \Input::get('recipe_title');
			$recipe->recipe_slug = str_replace($replaceChars,'-', strtolower(\Input::get('recipe_title')));
			$recipe->recipe_description = \Input::get('recipe_description');
			$recipe->recipe_author = \Auth::user()->id;
			$recipe->recipe_categoryid = \Input::get('recipe_categoryid');
			if(\Input::get('enable_comments')[0] === "on") {
				$recipe->recipe_enable_comments = 1;

			}
			$recipe->save();

			$ingredients = new \App\Ingredient;
			$ingredients->ingredient_name = \Input::get('recipe_ingredients');
			$ingredients->ingredient_recipeid = $recipe->id;
			$ingredients->save();

			$instructions = new \App\Instruction;
			$instructions->instructions_name = \Input::get('recipe_instructions');
			$instructions->instructions_recipeid = $recipe->id;
			$instructions->save();

			if(\Request::hasFile('recipe_image')) {

				$file = \Input::file('recipe_image');
				$filename = $file->getClientOriginalName();

				// Fire up Intervention Image
				// Widescreen
				$image = \Image::make($file)
				->resize(1440, null, function($constraint) {
					$constraint->aspectRatio();
				})
				// Also crop this one
				->crop(1440,500)
				->save(base_path().'/public/uploads/'.$filename);

				// 500x500
				$image = \Image::make($file)
				->resize(500, 500, function($constraint) {
					$constraint->aspectRatio();
				})
				->save(base_path().'/public/uploads/medium/'.$filename);

				// 250x250
				$image = \Image::make($file)
				->resize(250, 250, function($constraint) {
					$constraint->aspectRatio();
				})
				->save(base_path().'/public/uploads/small/'.$filename);

				// 36x36
				$image = \Image::make($file)
				->resize(36, 36, function($constraint) {
					$constraint->aspectRatio();
				})
				->save(base_path().'/public/uploads/xs/'.$filename);

				// Write the record to the DB
				$media = new \App\Media;
				$media->media_filename = $filename;
				$media->media_recipeid = $recipe->id;
				$media->save();
			}

			// Update sharecount and reward an invite
			$user = \App\User::find(\Auth::user()->id);
			$user->increment('sharecount');
			$user->increment('invites');
			$user->save();

			return \Redirect::to('/user/recipes');
		}

	}