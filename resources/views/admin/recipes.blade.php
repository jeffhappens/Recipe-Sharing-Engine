@extends('layouts.master')

@section('content')

<section class="heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-cogs"></i> Administration::Recipes</h2>
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
						<span class="badge">{{ count($userCount) }}</span>
						Users
					</a>
					<a href="/admin/recipes" class="list-group-item">
						<span class="badge">{{ count($recipes) }}</span>
						Recipes
					</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Recipe Title</th>
						<th>Author</th>
						<th>Date Added</th>
					</tr>
					@foreach($recipes as $recipe)
						<tr>
							<td>{{ $recipe->recipe_title }}</td>
							<td>{{ $recipe->username }}</td>
							<td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($recipe->created_at))->diffForHumans() }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			</div>
		</div>
	</div>
</section>

@stop