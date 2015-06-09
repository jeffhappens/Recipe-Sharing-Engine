$(function() {
	
	$('.alert').delay(3500).slideUp(200);


	$(window).scroll(function() {
		if($(this).scrollTop() > 250) {
			$('a.top').fadeIn();
		}
		else {
			$('a.top').fadeOut();
		}
	})

	// Back to top
	$('a.top').click(function () {
		$(document.body).animate({scrollTop: 0}, 500);
		return false;
	});






	$('.add-favorite-link').on('click', function(e) {
		e.preventDefault();
		var that = $(this);
		var href = that.data('href');
		var recipeid = that.data('recipeid');

		$.ajax({
			type: 'POST',
			url: href,
			data: {
				_token: $('meta[name=_token]').attr('content'),
				recipeid: recipeid
			},
			success: function(data) {
				if(data.success) {
					that.text('In my Favorites');
				}
			}

		})

	})

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
				$(that).closest('.card').slideUp();
			}
		});
	})


})