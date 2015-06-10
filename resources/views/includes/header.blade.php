<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li><a href="/">Home</a></li>
					@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->display_name }} <img src="https://s.gravatar.com/avatar/{{ md5(Auth::user()->username) }}?s=36" />
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="/user/recipes">My Recipes</a></li>
								<li><a href="/user/favorites">My Favorites</a></li>
								<li><a href="/user/share">Share a Recipe</a></li>
								@if(Auth::user()->invites)
								<li><a href="/user/invite">Invite a Friend ({{ Auth::user()->invites }})</a></li>
								@endif
								<li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
							</ul>
						</li>
					@else
						<li><a href="/auth/login">Login</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</header>