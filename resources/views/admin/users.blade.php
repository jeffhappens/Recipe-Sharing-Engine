@extends('layouts.master')

@section('content')

<section class="heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-cogs"></i> Administration::Users</h2>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="/admin/users" class="list-group-item">
						<span class="badge">2</span>
						Users
					</a>
					<a href="/admin/recipes" class="list-group-item">
						<span class="badge">6</span>
						Recipes
					</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Username</th>
						<th>Display Name</th>
						<th>Joined On</th>
						<th>Logins</th>
					</tr>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->username }}</td>
							<td>{{ $user->display_name }}</td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->login_count }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			</div>
		</div>
	</div>
</section>

@stop