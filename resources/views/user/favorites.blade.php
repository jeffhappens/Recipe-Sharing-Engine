@extends('layouts.master')

@section('content')
<section class="heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-star"></i> My Favorites</h2>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@foreach($favorites as $favorite)
					<div class="card">
						<a class="unfavorite" data-recipeid="{{ $favorite->id }}" data-csrftoken="{{ csrf_token() }}" href=""><i class="fa fa-2x fa-close"></i></a>
						<div class="row">
							<div class="col-md-4">
								@if($favorite->media_filename)
								<img class="img-responsive" src="/uploads/medium/{{ $favorite->media_filename }}" />
								@else
								<img class="img-responsive" src="/img/no-image.jpg" />
								@endif
							</div>							
							<div class="col-md-8">
								<h3>{{ $favorite->recipe_title }}</h3>
								<p><img src="https://s.gravatar.com/avatar/{{ md5($favorite->username) }}?s=24" /> By {{ $favorite->display_name }} on {{ date('m/d/Y', strtotime($favorite->created_at)) }}</p>
								<p>{{ $favorite->recipe_description }}</p>
								<p><a class="btn btn-default" href="/recipes/{{ $favorite->id }}/{{ $favorite->recipe_slug }}">View Recipe</a></p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@stop