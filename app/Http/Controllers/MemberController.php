<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MemberController extends Controller {

	public function index() {

	}

	public function profile() {
		return view('members.profile');
	}

}
