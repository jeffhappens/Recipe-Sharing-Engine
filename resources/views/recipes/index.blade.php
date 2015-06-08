@extends('layouts.master')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Browse Recipes</h2>
					@foreach($recipes as $recipe)
						<div class="card">
							<img class="img-responsive" src="/uploads/{{ $recipe->media_filename }}" />
							<h3>{{ $recipe->recipe_title }}</h3>
							<p><i class="fa fa-star"></i> <a href="/favorite/{{ $recipe->id }}">Add to Favorites</a></p>
							<p>{{ $recipe->recipe_description }}</p>
							<p><a class="btn btn-primary" href="/recipes/{{ $recipe->id }}/{{ $recipe->recipe_slug }}">View Recipe</a></p>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@stop