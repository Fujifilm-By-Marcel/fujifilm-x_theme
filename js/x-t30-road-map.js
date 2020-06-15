jQuery( document ).ready(function() {
	/* X-T30 Road Map */
	jQuery(document).on('click', '.road_map_explore_btn', function() {
		console.log('click');
		var id = jQuery(this).attr('id'); 
		console.log(id);
		
		if(!id.includes('hype-obj')){			
			jQuery('.story').hide();
			jQuery("."+id).show();
			$('html, body').animate(
				{
				  scrollTop: $("."+id).offset().top,
				},
				500,
				'linear'
			  )
		}
	});
	/* / X-T30 Road Map */
});