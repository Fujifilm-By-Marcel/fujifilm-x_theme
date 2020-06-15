<?php
/*
 Template Name: Page-simpleHTMLContent
*/



function page_simpleHTMLContent_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1');
	//wp_enqueue_style('simpleHTMLContent', get_stylesheet_directory_uri().'/en-us/css/page-simpleHTMLContent/simpleHTMLContent.css',array(),'1.0.0');
	
}
function page_simpleHTMLContent_scripts(){
	//wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
	//wp_enqueue_script('simpleHTMLContent', get_stylesheet_directory_uri().'/en-us/js/page-simpleHTMLContent/script.js', array(), '1.0.0', true); 
}
add_action( 'wp_enqueue_scripts', 'page_simpleHTMLContent_styles' );
//add_action( 'wp_enqueue_scripts', 'page_simpleHTMLContent_scripts' );

get_header();

?>

<style>
.credits{
	max-width: 800px;
	margin: 0 auto;
	position: relative;
	top: -30px;
	color: #fff;
	z-index: 2;
	padding: 0 20px 0 0;
	text-align:right;
}
<?php echo get_field('css'); ?>
</style>



<div class="main">

	
	<section class="xstoriespost__first lower__first"> 
		<div class="inner">
			<?php if( get_field('header_image_active') == "1" ) {?>
			<div class="xstoriespost__mainvisual" style="z-index:1;">
				<div class="xstoriespost__mainvisual_bg" style="background-image:url(<?php echo wp_get_attachment_image_url( get_field('header_image'), 'full' ) ?>);"></div>
				<img src="<?php echo wp_get_attachment_image_url( get_field('header_image'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_field('header_image'), 'full' ); ?>">
				<p class="credits"><?php echo get_field('header_image_copyright_text'); ?></p>
			</div>
			<?php } ?>
		</div>
	</section>
	
	<div style="text-align:center;">
		<h1 class="headline_underline headline_h1"><?php the_title() ?></h1>
		<div class="tagline"><?php the_field('tagline'); ?></div>
	</div>


	<div class="container">			
		<div class="row">
			<div class="col s12">					
				<?php echo get_field("html_content"); ?>
			</div>
		</div>
	</div>	
</div>

<script>
<?php echo get_field('js'); ?>
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
