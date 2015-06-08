@extends('layouts.master')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Invite a Friend</h2>
				<div class="card">
				<form action="/user/invite" method="post" role="form" data-parsley-validate>
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="_inviteToken" value="{{ str_random(48) }}" />

					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" class="form-control" required data-parsley-error-message="* Please provide a first name" />
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" class="form-control" required data-parsley-error-message="* Please provide a last name"/>
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" required data-parsley-error-message="* Please provide an email address"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default" name="invite_submit">Invite Friend</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</section>
@stop