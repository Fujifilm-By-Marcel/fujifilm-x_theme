$( document ).ready(function() {	
	fixPageMargin();	
	$(window).resize(function() {
		fixPageMargin();
	}).resize();
});

function fixPageMargin(){
		$('.main').css("margin-top", $(".header").height());
}