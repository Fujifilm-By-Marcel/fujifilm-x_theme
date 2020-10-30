<?php 
/*
Template Name: Page-creators-about
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/fnac-assets/creators/css/archive-creators.css', array(),'1.1.10');
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css', array(),'1.0.4');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.0',true);
}
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

get_header(); 
get_sidebar();
 
$imgDirectory = get_stylesheet_directory_uri()."/en-us/fnac-assets/creators/img/";
?>
<section class="main creators-about"> 
	<?php 
	require get_stylesheet_directory().'/en-us/fnac-assets/creators/navigation.php';
	?>

	<div class="container">
		<div class="row">
			<div class="col s12 m12 l6 infobox-col">
				<div class="infobox">
					<h2><?php the_field('header') ?></h2>
					<p class="tagline"><?php the_field('tagline') ?></p>
					<?php the_field('text') ?>
				</div>
			</div>
		</div>
	</div>
	<section class="grey-background" id="instructions">
		<div class="container">
			<div class="row about-tab-buttons">
				<div class="col s6">
					<a data-id="creators" class="tab-button active" onclick="showtab('creators');"><div>CREATORS</div></a>
				</div>
				<div class="col s6">
					<a data-id="x-photographers" class="tab-button" onclick="showtab('x-photographers');"><div>X&#8209;PHOTOGRAPHERS</div></a>
				</div>
			</div>
			<div class="row about-tab-sliders">
				<div class="col s12">
					<h2><?php the_field('instructions_header'); ?></h2>
				</div>
				<div class="col s12">				
					<?php if( have_rows('creator_instructions') ): ?>			    
					<div data-id="creators" class="my-slideshow creator-instructions">
						<div class="slides-container">
							<?php while ( have_rows('creator_instructions') ) : the_row(); ?>
							<div class="mySlide">
								<div class="row">
									<img src="<?php echo $imgDirectory ?>creator-badge.png" srcset="<?php echo $imgDirectory ?>creator-badge.png 1x, <?php echo $imgDirectory ?>creator-badge@2x.png 2x, <?php echo $imgDirectory ?>creator-badge@3x.png 3x">
									<h3><?php the_sub_field('header'); ?></h3>
									<?php the_sub_field('text'); ?>
								</div>
							</div>
							<?php endwhile; ?>
							<a class="myprev">
								<div class="arrow-left"></div>
							</a>
							<a class="mynext">
								<div class="arrow-right"></div>
							</a>
						</div>						
						<div class="slideshow-nav">
							<br>
							<?php while ( have_rows('creator_instructions') ) : the_row(); ?>
							<span class="mydot"></span> 
							<?php endwhile;	?>
						</div>
					</div>				
					<?php endif; ?>
					<?php if( have_rows('x-photographer_instructions') ): ?>			    
					<div data-id="x-photographers" class="my-slideshow creator-instructions" style="display:none;">
						<div class="slides-container">
							<?php while ( have_rows('x-photographer_instructions') ) : the_row(); ?>
							<div class="mySlide">
								<div class="row">
									<img src="<?php echo $imgDirectory ?>creator-badge.png" srcset="<?php echo $imgDirectory ?>creator-badge.png 1x, <?php echo $imgDirectory ?>creator-badge@2x.png 2x, <?php echo $imgDirectory ?>creator-badge@3x.png 3x">
									<h3><?php the_sub_field('header'); ?></h3>
									<?php the_sub_field('text'); ?>
								</div>
							</div>
							<?php endwhile; ?>
							<a class="myprev">
								<div class="arrow-left"></div>
							</a>
							<a class="mynext">
								<div class="arrow-right"></div>
							</a>
						</div>						
						<div class="slideshow-nav">
							<br>
							<?php while ( have_rows('x-photographer_instructions') ) : the_row(); ?>
							<span class="mydot"></span> 
							<?php endwhile;	?>
						</div>
					</div>				
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php $post_id = get_page_by_path( 'creators' ); ?>
	<?php if( have_rows('about', $post_id)  ): ?>
    <?php while( have_rows('about', $post_id) ): the_row(); ?>
	<section class="white-background">
		<div class="container ">
			<div class="row">
				<div class="col s12 information-block center">
					<div class="limit-width">
						<div class="red-left-border">
							<h2><?php the_sub_field( 'header', $post_id ); ?></h2>
							<div class="text"><?php the_sub_field( 'text', $post_id ); ?></div>
						</div>
						<div class="creator-btn-container">
							<a class="creator-btn" href="<?php the_sub_field( 'button_link', $post_id ); ?>" target="_blank"><?php the_sub_field( 'button_text', $post_id ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif;  ?>
</section>
<script>
	function showtab(tab){
		var instructions = jQuery(".creator-instructions");
		console.log();
		instructions.each(function( index, element ) {
			var myElement = jQuery(element)
			if(myElement.data('id') == tab){
				myElement.show();
			} else {
				myElement.hide();
			}
		});		
		var buttons = $(".tab-button");
		buttons.each(function( index, element ) {
			var myElement = jQuery(element)
			if(myElement.data('id') == tab){
				myElement.addClass("active");
			} else {
				myElement.removeClass("active");
			}
		});		
		
		return false;
	}
    (function ($, document) {
        $(document).ready(function () {
            jQuery(".my-slideshow").slideshow({				

			});
        });
    }(jQuery, document));
</script>


<?php get_footer();  ?>