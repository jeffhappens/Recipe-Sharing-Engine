@extends('layouts.master')
@section('content')
	<section class="heading">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@foreach($single as $sin)
					<h2>{{ $sin->recipe_title }}</h2>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						@foreach($media as $m)
							<img class="img-responsive" src="/uploads/{{ $m->media_filename }}" />
						@endforeach

						<br/>

						@foreach($single as $sin)
							<p>
								<img src="https://s.gravatar.com/avatar/{{ md5($sin->username) }}?s=24" />
								By {{ $sin->display_name }} on {{ date('m/d/Y', strtotime($sin->created_at)) }}
							</p>
							<p>
								<i class="fa fa-heart"></i>
								<a
									class="add-favorite-link"
									data-recipeid="{{ $sin->id }}"
									data-href="/api/favorite/{{ $sin->id }}"
									href="#"
								>Add to Favorites</a>
							</p>

						<p class="description">
							{{ $sin->recipe_description }}
						</p>
						@endforeach
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

						@foreach($single as $sin)

						@if($sin->recipe_enable_comments)
						@include('includes.comments')
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@stop