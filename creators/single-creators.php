<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/css/archive-creators.css', false, NULL, 'all');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true);
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );
get_header(); 
get_sidebar();
$imgDirectory = get_stylesheet_directory_uri()."/en-us/img/creators/";
?>

<section class="main"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>
</section>
test