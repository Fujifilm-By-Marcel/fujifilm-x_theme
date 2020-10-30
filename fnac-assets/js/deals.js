function clearLeftRows(marker){			
	var dealRows = $(".deal-row");
	dealRows.each(function(){
		var dealRow = $(this);
		var cols = dealRow.find(".col");
		
		var activecols = [];
		cols.each(function(index){
			if($(this).css("display") != "none"){
				activecols.push(this);
			}
		});

		$(activecols).each(function(index){
			var col = $(this);
			if( index%marker == 0 ){
				col.css("clear","left");
			}
			else{
				col.attr("style","");
			}
		});
	});
}

jQuery( document ).ready(function() {
	(function($) {
		
		//initialize slideshows
		$(".my-slideshow").slideshow();

		//get vars
		var slideshownavs = $(".slideshow-nav");
		var tiles = $('.deal');
		
		//show swatches
		slideshownavs.each(function(){
			var nav = $(this);
			var mydots = nav.find(".mydot");
			var swatchactivecolor = nav.find(".swatch-active-color");		

			//hide nav if there are no colors
			if( mydots.length ){
				nav.show();
			}
			else{
				nav.hide();
			}

			//add function to color label
			swatchactivecolor.text(	$( mydots.get(0) ).attr("title") );
			mydots.each(function(){
				var mydot = $(this);
				mydot.click(function(){
					swatchactivecolor.text(	mydot.attr("title") );
				});
			});
		});				
		
		//add hover and click to each tile with href
		tiles.each(function(){
			var tile = $(this);

			var href = tile.attr("data-href");
			if (href.length){
				tile.css("cursor","pointer");
			}

			tile.click(function(event){
				var href = $(this).attr("data-href");
				if (href.length && !$(event.target).hasClass("myprev") && !$(event.target).hasClass("mynext") && !$(event.target).hasClass("mydot") ){
					window.open(href);
				}
			});

		});	
			
		//get the marker which indicates the number of columns for the screen size
		var marker = $(".window-size-marker").css("z-index");

		//take note of what this marker is currently
		var oldmarker = marker;

		//clear the rows based on the marker
		clearLeftRows(marker);

		$(window).resize(function(){

			//refresh the marker
			var marker = $(".window-size-marker").css("z-index");

			//if the marker has changed set up new row clears
			if(oldmarker != marker){
				oldmarker = marker;
				clearLeftRows(marker);
			}
		});

		//initialize sidepop button
		$( "#sidepop-container" ).css("right", $( '#sidepop-container' ).outerHeight()*-1);
		$( "#sidepop-container" ).show();
		$( "#sidepop-container" ).delay( 3000 ).animate({
			right: 0,
			opacity: 1
		}, 500, function() {
			// Animation complete.
		});

	})( jQuery );
});