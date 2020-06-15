(function($) {
	
	$.fn.slideshow = function(options) {	
	
		// options
		var settings = $.extend({
			
			playbutton: false,
			playslideduration: 3000,
			
		}, options );
		
		return this.each(function() {


			var slideIndex = 1;	
			var slides = $(this).find(".mySlide");
			var dots = $(this).find(".mydot");
			var prev = $(this).find(".myprev");
			var next = $(this).find(".mynext");
			var slideshownav = $(this).find(".slideshow-nav");
			var playbutton = $(this).find(".myplaybutton");
			var overlay = $(this).find(".myoverlay");
			var progress = $(this).find(".myprogress");
			var playactive = false;
			var playtimer;

			//set first dot as active
			$(dots.get(0)).addClass('active');
			
			//if there is more than one slide, enable the slideshow controls
			if(slides.length > 1){
				
				slideshownav.show();
				prev.show();
				next.show();
				overlay.show();
				progress.show();

				//dots click
				dots.each(function(index){					
					$(this).click(function(event){
						event.preventDefault();
						currentSlide(index+1);
						pauseSlideshow();
						return false;
					});				
				});
				
				//play click
				overlay.click(function(event){
					event.preventDefault();
					toggleSlideshow();
					return false;					
				});
				
				//prev click
				prev.click(function(event){
					event.preventDefault();
					plusSlides(-1);
					return false;
				});
				
				//next click
				next.click(function(event){
					event.preventDefault();
					plusSlides(1);
					return false;
				});		

			}
			else{
				slideshownav.hide();
				prev.hide();
				next.hide();
				overlay.hide();
				progress.hide();
			}
			
			//show controls according to settings
			if(!settings.playbutton){
				overlay.hide();			
				progress.hide();
			}
			else{			
				prev.hide();
				next.hide();				
			}
			
			
			function plusSlides(n) {
				showSlides(slideIndex += n);
			}
			
			function currentSlide(n) {
				showSlides(slideIndex = n);
			}
				
			function showSlides(n) {
				var i;
				if (n > slides.length) {slideIndex = 1} 
				if (n < 1) {slideIndex = slides.length}
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none"; 
				}
				slides[slideIndex-1].style.display = "block"; 
				
				if ( dots.length>1 ){
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}				
					dots[slideIndex-1].className += " active";
				}
			}
			
			function playSlideshow(){
				if(!playactive){
					//start progress animation
					progress.stop( true, true ).animate({
					  width: "100%"
					}, settings.playslideduration, function () { $(this).removeAttr('style'); });							
				
					playtimer = setInterval(function(){
						plusSlides(1);
						
						//restart progress animation
						progress.stop( true, true ).animate({
						  width: "100%"
						}, settings.playslideduration, function () { $(this).removeAttr('style'); });
						
					}, settings.playslideduration);
					playbutton.toggleClass("paused");
					playactive = true;
				}
			}
			
			function pauseSlideshow(){
				if(playactive){
					clearTimeout(playtimer);
					progress.stop( true, true ).removeAttr('style');
					playbutton.toggleClass("paused");
					playactive = false;
				}				
			}
			
			function toggleSlideshow(){
				if(!playactive){
					playSlideshow();				
				}
				else{
					pauseSlideshow();				
				}
			}

			showSlides(slideIndex);
			
		});
	};

})( jQuery );