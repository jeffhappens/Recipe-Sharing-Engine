<?php namespace App\Http\Controllers;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	class AuthController extends Controller {		

		// Return the login view
		public function login() {
			return view('auth.login');
		}

		// Log the user in
		public function postLogin(Request $request) {
			$username = $request->username;
			$password = $request->password;
			// Attempt to log the user in
			if(\Auth::attempt(['username' => $username,'password' => $password])) {
				// Update the login count
				$user = \App\User::find(\Auth::user()->id);
				$user->increment('login_count');
				return \Redirect::intended();
			}
			// Login failed
			\Session::flash('error','Invalid credentials. Please try again.');
			return \Redirect::to('/auth/login');
		}

		// Log the user out
		public function logout() {
			\Auth::logout();
			return \Redirect::to('/auth/login');
		}

	}