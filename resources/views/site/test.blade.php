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
	<section class="content">
		<div class="container">
			@foreach($recipes as $recipe)
				<div class="row" data-recipeid="{{ $recipe->id }}" data-slug="{{ $recipe->recipe_slug }}" style="margin-bottom: 25px; background: url(/uploads/{{ $recipe->media_filename }}) center center no-repeat">
					<div class="card clearfix">
						<div class="col-md-4">
							<!-- image -->
							<img class="img-responsive" src="/uploads/medium/{{ $recipe->media_filename }}" />
						</div>
						<div class="col-md-8">
							<!-- info -->
							<h3>{{ $recipe->recipe_title }}</h3>
							<p><small><a href="/member/{{ $recipe->recipe_author }}"><img class="avatar" src="http://www.gravatar.com/avatar/{{ md5($recipe->username) }}?s=24" /></a> {{ $recipe->display_name }} | {{ \Carbon\Carbon::createFromTimeStamp(strtotime($recipe->created_at))->diffForHumans() }}</small></p>
							<p>{{ $recipe->recipe_description }}</p>							
						</div>
					</div>
				</div>
			@endforeach			
		</div>
	</section>
@stop