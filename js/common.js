$( document ).ready(function() {
	
	if( $('#cookieLaw').length ){	
		$('.cookieLawCloseBtn').click(
			function(){
				$('.main').css("margin-top", $(".header").height());
			}			
		);
	}
	
	
	fixPageMargin();	
	$(window).resize(function() {
		fixPageMargin();
	}).resize();
});

function fixPageMargin(){
	if( $('#cookieLaw').length ){		
		$('.main').css("margin-top", $(".header").height()-$('#cookieLaw').height());
		
		
	} else {
		$('.main').css("margin-top", $(".header").height());
	}
}

