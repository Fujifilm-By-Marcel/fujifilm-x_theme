<?php
/*
Template Name: fnac-welcome-emails
*/
function page_usa_styles(){
	//wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	//wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	//wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
	//wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


 ?>
<style>
	html{
		font-size:12px;
	}
	:root{
		--grey-color: #ababab;
		--red-color: #e4022e;
		--accent-font: "Fjalla One", sans-serif;
	}
	h1{
		font-family: var(--accent-font);
  		font-size: 3.125rem;
  		line-height:normal;
	}	
	h3{
		font-family: var(--accent-font);
  		font-size: 1.875rem;
  		line-height:normal;
	}
	p{
		font-size:1rem;
		line-height:normal;
	}
	.margin-bottom-1{
		margin-bottom:1rem;
	}
	.margin-bottom-2{
		margin-bottom:2rem;
	}
	.hero-section{
		height:529px;
		background:url('<?php the_field('banner'); ?>');
		background-size: cover;
		background-position: center;
		display: flex;
		align-items: center;
		color:white;
		text-align:center;
		position:relative;
	}
	.contain-hero-content{
		max-width: min(42em,90%);
		margin:auto;
	}
	.spotlight-text{
		font-size: 1.313rem;
		line-height: 1.2;
	}
	.banner-credit{
		position: absolute;
		right:2rem;
		bottom:1.5rem;
		font-size: 1rem;
	}

	.repeater{
		padding:3rem 0.8rem;
		display:flex;
		flex-wrap:wrap;
	}
	.contain-text{
		padding:0 .5em;
		
		display: flex;
		flex-direction: column;
    	height: 100%;
	}
	.repeater > *{		
		padding:0 1rem;
		flex-basis:50%;

		display: flex;
    	flex-direction: column;
	}
	.clamp-2{
		-webkit-line-clamp: 2;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		overflow: hidden;
		height:58px;
	}
	@media (min-width:40em){
		html{
			font-size:14px;
		}
		.clamp-2{
			height:66px;
		}
		.repeater{
			max-width: 66em;
    		margin: auto;
    	}
		.repeater > *{	
			flex-basis:33%;	
		}
	}
	@media (min-width:60em){
		html{
			font-size:16px;
		}
		.clamp-2{
			height:74px;
		}
		.repeater{
			max-width: 88em;
    		margin: auto;
    	}
		.repeater > *{	
			flex-basis:25%;	
		}	
	}
	
	.main .button {
	  background-color: var(--red-color);
	  border: none;
	  color: white;
	  padding: .25em 1.25em;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 1rem;
	  cursor: pointer;
	  font-family: var(--accent-font);
	}
	.image-container{
		position:relative;
	}
	.promo-end{
		position:absolute;
		right:0.625rem;
		bottom:0.625em;
		font-size:0.875em;
		color:white;
	}
	.tags{
		margin:2rem 0 0;
		display: flex;
		justify-content: center;
	}
	.tags .button{
		text-transform: uppercase;
		background:var(--grey-color);
	}
	.tags > * + * {
		margin-left:.625rem;
	}
</style>
<section class="main">
	<section class="hero-section"> 
		<div class="contain-hero-content">
			<h1><?php the_field('page_header') ?></h1>
			<p class="spotlight-text"><?php the_field('page_excerpt') ?></p>
			<p class="banner-credit"><?php the_field('banner_credit') ?></p>
		</div>
	</section>

	<?php if( have_rows('tags') ): ?>
	<section class="tags">
		<?php while( have_rows('tags') ) : the_row(); ?>
		<a class="button tag-button" data-tag="<?php the_sub_field('tag'); ?>"><?php the_sub_field('tag'); ?></a>		
		<?php endwhile; ?>
		<a class="button tag-button" data-tag="all">all</a>		
	</section>
	<?php endif; ?>

	<?php if( have_rows('pages') ): ?>
	<section class="repeater">
	    
	    <?php while( have_rows('pages') ) : the_row(); ?>
    	<div class="margin-bottom-2" data-tags="<?php the_sub_field('tags'); ?>">		     
	        <div class="image-container margin-bottom-1">
	        	<img src="<?php the_sub_field('image'); ?>" >
	        	<p class="promo-end"><?php the_sub_field('end_date') ?></p>
	        </div>
	        <div class="contain-text">
		        <h3 class="margin-bottom-1 clamp-2" title="<?php the_sub_field('title'); ?>"><?php the_sub_field('title'); ?></h3>
		        <p class="margin-bottom-1"><?php the_sub_field('excerpt'); ?></p>
		        <div style="margin-top:auto"><a class="button" target="<?php the_sub_field('button_target'); ?>" href="<?php the_sub_field('button_href'); ?>"><?php the_sub_field('button_text'); ?></a></div>
		    </div>
		
	    </div>
	    <?php endwhile; ?>

	</section>
	<?php endif; ?>
</section>
<script>
	jQuery(function($) {
		$( ".tag-button" ).click(function() {
			let tag = $(this).data('tag');
			if(tag=="all"){
				$(".repeater > *").show();
			} else {
				$(".repeater > *").hide();
				$(".repeater > *[data-tags*='"+tag+"'").show();
			}	
		});
	});
</script>
 <?php get_footer(); ?>