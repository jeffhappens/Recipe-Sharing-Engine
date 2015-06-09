@extends('layouts.master')

@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>Thanks for signing up!</h2>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p>Just one more thing to do before you are up and sharing.</p>
					<form action="" method="post" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<div class="form-group">
							<label for="password">Give yourself a Password</label>
							<input type="password" name="password" class="form-control" />
						</div>
						<div class="form-group">
							<button type="submit" name="refer_password" class="btn btn-primary">Set Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@stop