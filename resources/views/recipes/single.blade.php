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
			<div class="card">
				@if(!Auth::check())
				@else
					<div class="favorite-badge @if($sin->favorites_userid) active @endif">
						<a href="" data-href="/api/favorite/{{ $sin->id }}" data-recipeid="{{ $sin->id }}">
							<i class="fa fa-2x fa-star"></i>
						</a>
					</div>
				@endif

				@foreach($single as $sin)
					<div class="row">
						<div class="col-md-12">
							<img class="img-responsive" src="/uploads/{{ $sin->media_filename }}" />
						</div>
					</div>
					<div class="foo" style="padding: 10px 20px;">
						<div class="row">
							<div class="col-md-12">
								<p>
									<img src="http://www.gravatar.com/avatar/{{ md5($sin->username) }}?s=24" /> Author: {{ $sin->display_name }} |
									{{ \Carbon\Carbon::createFromTimeStamp(strtotime($sin->created_at))->diffForHumans() }}
								</p>
								<p>{{ $sin->recipe_description }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<h3>Ingredients</h3>
								{!! $sin->ingredient_name !!}
							</div>
							<div class="col-md-7">
								<h3>Instructions</h3>
								{!! $sin->instructions_name !!}
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								@if($sin->recipe_enable_comments)
									@include('includes.comments')
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@stop