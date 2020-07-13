<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/css/archive-creators.css', false, NULL, 'all');
	wp_register_script( 'uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', false, NULL, false );
}
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

get_header(); 
get_sidebar();
$imgDirectory = get_stylesheet_directory_uri()."/en-us/img/creators/";
?>

<script>
	jQuery( document ).ready(function() {
		
		if( jQuery('#cookieLaw').length ){	
			jQuery('.cookieLawCloseBtn').click(
				function(){
					jQuery('.main').css("margin-top", jQuery(".header").height());
				}			
			);
		}
		
		
		fixPageMargin();	
		jQuery(window).resize(function() {
			fixPageMargin();
		}).resize();
	});

	function fixPageMargin(){
		if( jQuery('#cookieLaw').length ){		
			jQuery('.main').css("margin-top", jQuery(".header").height()); //-jQuery('#cookieLaw').height());
			
			
		} else {
			jQuery('.main').css("margin-top", jQuery(".header").height());
		}
	}
</script>

<?php 
require get_stylesheet_directory().'/en-us/creators/navigation.php';
?>

test