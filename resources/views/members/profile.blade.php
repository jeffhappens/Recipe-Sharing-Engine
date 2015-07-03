@extends('layouts.master')

@section('content')
<section class="heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>{{ str_possessive($member->display_name) }} profile</h3>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="img-responsive" src="http://gravatar.com/avatar/{{ md5($member->username) }}?s=256" />
			</div>
			<div class="col-md-9">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</section>

@stop