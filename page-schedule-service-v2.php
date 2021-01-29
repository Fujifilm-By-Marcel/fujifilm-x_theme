<?php
/*
Template Name: Page-schedule-service
*/
function page_usa_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('event-registration-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/event-registration.css',array(),'1.0.9');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 
 ?>

<style>

	@media screen and (max-width: 767px), print{
		img {
		    width: initial;
		    display: initial;
		}
	}
	h1{
		font-size:4.25em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	h1.main-header{
		position: absolute;
    	left: 50%;
	    top: 50%;
	    transform: translate(-50%,-50%);
	    color: white;
	    text-align: center;
	    text-transform: unset;
	}
	h1 img{
		position: relative;
    	top: -16px;
	}


	h2{
		font-size:2.8125em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	h2 img{
		position: relative;
    	top: -8px;
	}
	
	h3{
		font-size:1.6em;		
		line-height:normal;
		margin-bottom: 16px;
		font-weight:bold;
	}
	h4{
		font-size:1.4em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	p{
		margin-bottom:16px;
		line-height: normal;
	}


	.section-2{
		padding:45px 0;
	}

	.section-2 h2{
		color:#e4032f;
	}


	.instructions-container{
		display: flex;
		flex: 1;
	}

	.instruction-repeater{
		text-align: center;
    	width: 33%;
    	margin: 0 auto;
    	display: flex;
        flex-direction: column;
	}
	.instruction-repeater .red-text{
		text-transform: uppercase;
	    font-size: 1.25rem;
	    font-family: "Fjalla One", sans-serif;
	    color:#e4032f
	}
	.instruction-repeater .instruction-header{
		text-align:center;
	}
	.instruction-repeater .instruction{
		font-size:1em;
    	max-width: 17em;
    	margin: 0 auto;
	}
	.instruction-repeater .image-container{
		height:56px;
		margin-bottom:8px;
	}

	@media (max-width:992px){
		.instructions-container{
			flex-direction:column;
		}
		.instructions-container .instruction-repeater{
			width:100%;
			margin-bottom:3rem;
		}
	}
	@media (min-width:601px){
		.main{font-size:16px;}
	}
	@media (max-width:600px){
		.main{font-size:14px;}
	}
</style>
<section class="main">

	<section class="header-image">
		<div class="row" style="position:relative;">
			<?php
			$imgsrc_desktop = wp_get_attachment_image_src( get_field('desktop_banner'), 'full' );
			$imgsrcset_desktop = wp_get_attachment_image_srcset( get_field('desktop_banner'), 'full' );
			$imgsrc_mobile = wp_get_attachment_image_src( get_field('mobile_banner'), 'full' );
			$imgsrcset_mobile = wp_get_attachment_image_srcset( get_field('mobile_banner'), 'full' );
			?>
			<img class="hero-banner desktop" src="<?php echo $imgsrc_desktop[0]; ?>" width="<?php echo $imgsrc_desktop[1]; ?>" height="<?php echo $imgsrc_desktop[2]; ?>" srcset="<?php echo $imgsrcset_desktop; ?>">
			<img class="hero-banner mobile" src="<?php echo $imgsrc_mobile[0]; ?>" width="<?php echo $imgsrc_mobile[1]; ?>" height="<?php echo $imgsrc_mobile[2]; ?>" srcset="<?php echo $imgsrcset_mobile; ?>">
			<h1 class="main-header"><?php the_field('header'); ?></h1>
		</div>	
	</section>


	<?php if( have_rows('red_strip') ): ?>
    <?php while( have_rows('red_strip') ): the_row(); ?>
	<section class="red-strip">
		<div class="container">
			<div class="row">
				<p class="text line-1"><?php the_sub_field('line_1') ?></p>
				<p class="text line-2"><?php the_sub_field('line_2') ?></p>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('instructions_section') ): ?>
    <?php while( have_rows('instructions_section') ): the_row(); ?>
	<section class="section-2">
		<div class="container">
			<div class="row">
				<div class="instructions-container">					
				<?php if( have_rows('instructions') ): ?>
				<?php while( have_rows('instructions') ): the_row(); ?>
					<div class="instruction-repeater">
						<div class="image-container">
							<img src="<?php the_sub_field('image') ?>">
						</div>
						<p class="red-text"><span><?php the_sub_field('red_text') ?></span></p>
						<h3 class="instruction-header"><span><?php the_sub_field('header') ?></span></h3>
						<p class="instruction"><?php the_sub_field('instructions') ?></p>	
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('intro_section') ): ?>
    <?php while( have_rows('intro_section') ): the_row(); ?>

    <style>	
    	.videoWrapper {
		  position: relative;
		  padding-bottom: 56.25%; /* 16:9 */
		  height: 0;
		}
		.videoWrapper iframe {
		  position: absolute;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		}
    	.intro-section{
    		background: linear-gradient(to bottom, <?php the_sub_field('color_1') ?> 65%, <?php the_sub_field('color_2') ?> 50%);
    	}
    	.intro-section .btn{
    		display: inline-block;
    		margin-bottom:4rem;
    		font-family: "Fjalla One", sans-serif;
    	}
    	.intro-section .btn a{
			background-color: #e4032f;
    		padding: .5em 4em;
    		display: inline-block;
    		font-size:1.25rem;
    	}
    	.intro-section .cta{
    		font-family: "Fjalla One", sans-serif;
    		font-size: 2.5rem;
    		line-height: normal;
    		margin-bottom:.25em;
    	}
    </style>

	<section class="intro-section" style="padding:3rem 0;">
		<div class="container">
			<div class="row">
				<div class="col s12" style="color:white;text-align:center;">					
					<p class="cta"><?php the_sub_field('text_line_1'); ?></p>
					<p style="margin-bottom:1.5em;"><?php the_sub_field('text_line_2'); ?></p>					
					<div class="btn"><a href="<?php echo get_sub_field('button')['href']; ?>" target="<?php echo get_sub_field('button')['target']; ?>"><?php echo get_sub_field('button')['text']; ?></a></div>					
					<div style="max-width:50rem;margin:auto;"><div class="videoWrapper"><iframe width="560" height="315" src="<?php the_sub_field('video'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>




</section>
<script>
	jQuery(document).ready(function( $ ) {


	});
</script>
<?php get_footer(); ?>