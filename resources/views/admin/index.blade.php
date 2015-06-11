@extends('layouts.master')

@section('content')

<section class="heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-cogs"></i> Administration</h2>
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
			</div>
		</div>
	</div>
</section>

@stop