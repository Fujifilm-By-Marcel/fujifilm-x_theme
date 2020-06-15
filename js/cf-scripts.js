dataLayer = [];

$(function(){
	$("#signup_form").click(function(){
		sendGA('Create Forever', 'Click', 'Send Me Updates' );
	}) 

	$("#submit").click(function(){
		sendGA('Create Forever', 'Click', 'Submit Newsletter' );
	})

	$(".events").each(function(){
		var event = $(this);
		var title = event.find(".event_title").text();
		event.find(".book_button").click(function(){
			sendGA('Create Forever', 'Click', 'Book Now '+title.trim() );
		});
	});


	$(".connect_button").each(function(){
		var button = $(this);
		if (button.text().trim().toLowerCase() == 'share your story'){
			button.click(function(){
				sendGA('Create Forever', 'Click', button.text().trim() );
			});
		}
	});

	$('#upload[type=submit]').click(function(){
		sendGA('Create Forever', 'Click', 'Submit Create Forever Form' );
	});


	function sendGA(eventCategory, eventAction, eventLabel){
		dataLayer.push({
		    'CFCategory': eventCategory,
		    'CFAction': eventAction,
		    'CFLabel': eventLabel
		});

		console.log("Datalayer Pushed: "+eventCategory+", "+eventAction+", "+eventLabel);
	}

});