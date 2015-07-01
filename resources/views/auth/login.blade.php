@extends('layouts.master')

@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Sign in to Your Account</h2>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="/auth/login" method="POST" role="form" data-parsley-validate>
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="form-group">
							<label for="username">Email Address</label>
							<input type="text" name="username" class="form-control" placeholder="email@example.com" required data-parsley-error-message="* Please provide a username" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" required data-parsley-error-message="* Please provide a password" />
							<p>I forgot my password</p>
						</div>
						<div class="form-group">
							<button type="submit" name="submit_login" class="btn btn-default">Sign In</button>
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>

@stop