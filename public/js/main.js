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
			class: 'alert alert-'+type,
			html: '<div class="container"><p>'+text+'</p></div>'
		})
		.appendTo('body')
		.fadeIn(200);

		setTimeout(function() {
			$('.alert').slideUp(200, function() {
				$(this).remove();
			})
		}, 3000)
	}



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
				console.log(data);
				if(data.success) {
					sendAlert('info',data.recipe.recipe_title+' has been added to your favorites');
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
				sendAlert('info','Item has been removed from your favorites');
				$(that).closest('.card').slideUp(200);
			}
		});
	})


})