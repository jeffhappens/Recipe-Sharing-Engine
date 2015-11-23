@extends('layouts.master')
@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fa fa-cutlery"></i> My Recipes</h2>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if(!$recipes->isEmpty())
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
									<p>Added on {{ date('m/d/Y', strtotime($recipe->created_at)) }}</p>
									<p>
										<a class="btn btn-xs btn-default" href="/recipes/{{ $recipe->id }}/{{ $recipe->recipe_slug }}">View Recipe</a>
										<a class="btn btn-xs btn-default" href="/recipes/{{ $recipe->id }}/{{ $recipe->recipe_slug }}">Edit Recipe</a>
									</p>
								</div>
							</div>
						</div>
						@endforeach
						<p><a class="top"><i class="fa fa-2x fa-arrow-circle-o-up"></i></a></p>
					@else
						<h3>You have not shared any recipes :(</h3>
						<p><a class="btn btn-default" href="/user/share">Share a Recipe</a></p>
					@endif
				</div>
			</div>
		</div>
	</section>
@stop