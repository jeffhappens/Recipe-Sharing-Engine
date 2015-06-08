@extends('layouts.master')
@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
						<h2>{{ $single->recipe_title }}</h2>
					</h2>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="card">
						@foreach($media as $m)
							<img class="img-responsive" src="/uploads/{{ $m->media_filename }}" />
						@endforeach
						{{-- <h2>{{ $single->recipe_title }}</h2> --}}
						<p><i class="fa fa-star"></i> <a href="/favorite/{{ $single->id }}">Add to Favorites</a></p>
						<p>{{ $single->recipe_description }}</p>
						<div class="row">
							<div class="col-md-4">
								<h4 class="bold">Ingredients</h4>
								@foreach($ingredients as $ingredient)
									{!! $ingredient->ingredient_name !!}
								@endforeach
							</div>
							<div class="col-md-8">
								<h4 class="bold">Instructions</h4>
								@foreach($instructions as $instruction)
									{!! $instruction->instructions_name !!}
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</section>
@stop