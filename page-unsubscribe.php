<?php
/*
Template Name: Page-unsubscribe
*/
function nofollownoindexhead(){
	echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}
function page_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.0');	
}
function page_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 	
}
add_action('wp_head', 'nofollownoindexhead');
add_action( 'wp_enqueue_scripts', 'page_styles' );
add_action( 'wp_enqueue_scripts', 'page_scripts' );

get_header(); 
get_sidebar(); 
?>

<style>
	.section-1{
		background:url('<?php echo get_field('image_desktop') ?>');
		padding: 25% 0;
		background-color:#000;
		background-repeat: no-repeat;
		background-position: center;
		background-size: auto 100%;
		color:#fff;
		text-align:center;
		font-family: "Fjalla One", sans-serif;
	}

	.main-header{
		font-size:6em;
		line-height: normal;
	}
	.tagline{
		font-size:1.5em;
		line-height: 1.3em;
	}

	@media (max-width:1200px){
		.main-header{
			font-size:5em;
		}
		.tagline{
			font-size:1.25em;
		}
	}

	@media (max-width:600px){
		.section-1{
			background-image:url('<?php echo get_field('image_mobile') ?>');
			background-size: 100%;
			padding: 10% 0 120% 0;
		}		
		.main-header{
			font-size:4em;
		}
		.tagline{
			font-size:1em;
		}
	}

	#pagetop{
		margin: auto !important;
	    position: absolute !important;
	    left: 50% !important;
	    transform: translate(-50%, -30px) !important;
	    top: unset !important;
	}
	.footer{margin-top: 0 !important;}
</style>

<div class="main">
	<section class="section-1">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l6">
					<h1 class="main-header"><?php the_field('main_header') ?></h1>
					<p class="tagline"><?php the_field('tagline') ?></p>
				</div>
			</div>
		</div>
	</section>
</div>



<?php get_footer(); ?>