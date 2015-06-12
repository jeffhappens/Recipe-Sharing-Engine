$(function() {

	// Animate alert windows off the screen	
	$('.alert').delay(3500).slideUp(200);



	// Back to Top button animation
	$(window).scroll(function() {
		if($(this).scrollTop() > 250) {
			$('a.top').fadeIn();
		}
		else {
			$('a.top').fadeOut();
		}
	})

	// Back to Top button handler
	$('a.top').click(function () {
		$(document.body).animate({scrollTop: 0}, 500);
		return false;
	});



	function sendAlert(type,text) {

		$('<div/>', {
			class: 'alert alert-' + type,
			html: '<div class="container">' + text + '</div>'
		})
		.appendTo('body')
		.fadeIn(200);

		// Remove the alert
		setTimeout(function() {
			$('.alert').fadeOut(200, function() {
				$(this).remove();
				$('.overlay').fadeOut(200, function() {
					$(this).remove();
				});
			})
		}, 3000)
	}




	// This needs work

	$('.favorite-badge a').on('click', function(e) {
		e.preventDefault();


		var that = $(this);
		var href = that.data('href');
		var f = href.indexOf('/favorite') !=-1;
		var u = href.indexOf('/unfavorite') !=-1;

		console.log('f:'+f+' u:'+u);

		if(f) { href = href.replace('/favorite','/unfavorite'); }
		if(u) { href = href.replace('/unfavorite','/favorite'); }

		var recipeid = that.data('recipeid');

		var strings = {
			added: 'Recipe added to Favorites',
			removed: 'Recipe removed from Favorites'
		};

		$.ajax({
			type: 'POST',
			url: href,
			data: {
				_token: $('meta[name=_token]').attr('content'),
				recipeid: recipeid
			},
			success: function(data) {
				console.log(data);
				if(data.success) {
					that.closest('.favorite-badge').toggleClass('active');
					sendAlert('info', strings.added)
				}
				else {
					that.closest('.favorite-badge').toggleClass('active');
					sendAlert('info', strings.removed)
				}
			}
		});
	});


	$('.unfavorite').on('click', function(e) {
		e.preventDefault();
		var that = $(this);
		var recipeid = $(this).data('recipeid');
		var csrftoken = $('meta[name=_token]').attr('content');

		$.ajax({
			type: 'POST',
			url: '/api/unfavorite',
			data: {
				_token: csrftoken,
				recipeid: recipeid
			},
			success: function(data) {

				var placeholder = '<div class="row"><div class="col-md-12"><h3>You have not favorited any recipes :(</h3><p><a class="btn btn-default" href="/recipes">Browse Recipes</a></p></div></div>';

				sendAlert('info','Item has been removed from your favorites');

				$(that).closest('.card').slideUp(200, function() {

					$(that).closest('.card').remove();

					if( $('.card').length === 0) {

						$('<div/>', {
							class: 'container',
							html: placeholder
						}).appendTo('.main');

					}
				});
			}
		});
	})


})