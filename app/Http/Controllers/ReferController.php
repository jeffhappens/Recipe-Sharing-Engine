<?php namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	class ReferController extends Controller {

		public function refer($email,$token) {

			$user = \App\User::where('username', $email)->get();

			if($user->isEmpty()) {
				return 'We cant seem to find your invite';
			}

			foreach($user as $u) {
				$u->invite_token = null;
				$u->save();
			}
			return view('refer.password');

		}

		public function complete($email,$token) {

			// just need to update password
			// this doesnt work

			$password = \Input::get('password');
			$user = \App\User::where('username', $email)->get();

			foreach($user as $u) {
				$u->password = bcrypt($password);
				$u->save();
			}

			return \Redirect::to('/auth/login');
		}


	}
