@extends('layouts.master')
@section('content')
<section>
	<div class="container">
		<div class="row">
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
					</div>
					<div class="form-group">
						<button type="submit" name="submit_login" class="btn btn-default">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@stop