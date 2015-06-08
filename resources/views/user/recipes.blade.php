@extends('layouts.master')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>My Recipes</h2>

					@foreach($recipes as $recipe)
					<div class="card">
						<div class="row">
							@if($recipe->media_filename)
							<div class="col-md-4">
								<img class="img-responsive" src="/uploads/medium/{{ $recipe->media_filename }}" />
							</div>
							@endif
							<div class="col-md-8">
								<h3>{{ $recipe->recipe_title }}</h3>
								<p>{{ $recipe->recipe_description }}</p>
								<p><a class="btn btn-default" href="">View Recipe</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@stop