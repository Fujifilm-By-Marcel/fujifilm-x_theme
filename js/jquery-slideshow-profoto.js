(function($) {
	$.fn.isInViewport = function () {
	    let elementTop = $(this).offset().top;
	    let elementBottom = elementTop + $(this).outerHeight();

	    let viewportTop = $(window).scrollTop();
	    let viewportBottom = viewportTop + $(window).height();

	    return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	
	$.fn.slideshowProfoto = function(options) {
	
		// options
		var settings = $.extend({
			
			playbutton: false,
			playslideduration: 3000,
			autoplay: false,
			pauseonhover: false,
			pauseonviewport: false,
			
		}, options );
		
		return this.each(function() {

			var myslideshow = $(this);
			var slideIndex = 1;	
			var slides = myslideshow.find(".mySlide");
			var dots = myslideshow.find(".mydot");
			var prev = myslideshow.find(".myprev");
			var next = myslideshow.find(".mynext");
			var slideshownav = myslideshow.find(".slideshow-nav");
			var playbutton = myslideshow.find(".myplaybutton");
			var overlay = myslideshow.find(".myoverlay");
			var progress = myslideshow.find(".myprogress");
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

			if(settings.autoplay){				
				//start progress animation
				progress.stop( true, true ).animate({
				  width: "100%"
				}, settings.playslideduration, function () { $(this).removeAttr('style'); });

				playSlideshow();
			}
			
			if(settings.autoplay && settings.pauseonhover){
				myslideshow.hover(function(){
					pauseSlideshow();

				}, function(){
					playSlideshow();					
				});
			}

			if(settings.autoplay && settings.pauseonviewport){
				$(window).scroll(function () {
				    if (myslideshow.isInViewport()) {
				        playSlideshow();
				    } else {
				        pauseSlideshow();
				    }
				});
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
					if($(slides[i]).is(":visible")){
						visibleIndex = i;
					}
				}

				if(typeof visibleIndex !== "undefined"){
					$(slides[visibleIndex]).fadeOut(250, function(){
						$(slides[slideIndex-1]).show(); 
						$(slides[slideIndex-1]).find(".myslide-cta").hide();
						$(slides[slideIndex-1]).find("img").css({
						    "opacity":"0",
						    "left": "-300px",
						    "position":"relative",
						}).animate({opacity:1,left:0}, 500, function(){
								$(slides[slideIndex-1]).find(".myslide-cta").css({
							    "opacity":"0",
							    "top": "-100px",
							    "position":"relative",
							}).show().animate({opacity:1,top:0}, 500)
						})
					});
				}
				else{				
					$(slides[slideIndex-1]).show(); 		
				}

			
				if ( dots.length>1 ){
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}				
					dots[slideIndex-1].className += " active";
				}
				
			}
			
			function playSlideshow(){				
				//start progress animation
				if(!playactive){

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