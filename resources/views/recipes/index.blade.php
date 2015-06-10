@extends('layouts.master')

@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-cutlery"></i> Browse Recipes</h2>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@foreach($recipes as $recipe)
						<div class="card">
							<img class="img-responsive" src="/uploads/{{ $recipe->media_filename }}" />
							<h3>{{ $recipe->recipe_title }}</h3>
							<p>
								<img src="https://s.gravatar.com/avatar/{{ md5($recipe->username) }}?s=24" />
								By {{ $recipe->display_name }} on {{ date('m/d/Y', strtotime($recipe->created_at)) }}
							</p>
							<p>
								<i class="fa fa-heart"></i>
								<a
									class="add-favorite-link"
									data-recipeid="{{ $recipe->id }}"
									data-href="/api/favorite/{{ $recipe->id }}"
									href="#"
								>Add to Favorites</a>
							</p>
							<p>{{ $recipe->recipe_description }}</p>
							<p><a class="btn btn-primary" href="/recipes/{{ $recipe->id }}/{{ $recipe->recipe_slug }}">View Recipe</a></p>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@stop