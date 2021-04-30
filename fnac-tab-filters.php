<?php
/*
Template Name: fnac-tab-filters
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
		--red-color: #FB0020;
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

	@media (min-width:40em){
		html{
			font-size:14px;
		}
	}
	@media (min-width:60em){
		html{
			font-size:16px;
		}
	}
	
	.main .button {
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
	.tabs{
		margin:2rem 0 0;
		display: flex;
		justify-content: center;
	}
	.tabs .button{
		text-transform: uppercase;
		background:var(--grey-color);
	}
	.tabs > * + * {
		margin-left:.625rem;
	}
	.tabs .button.active{
		background:var(--red-color);
	}
	/*.repeater{
		max-width: min(88em, 90%);
		margin:auto;
	}*/
</style>
<section class="main">
	<section class="hero-section"> 
		<div class="contain-hero-content">
			<h1><?php the_field('page_header') ?></h1>
			<p class="spotlight-text"><?php the_field('page_excerpt') ?></p>
			<p class="banner-credit"><?php the_field('banner_credit') ?></p>
		</div>
	</section>
	<?php if( have_rows('tabs') ): ?>
	<section class="tabs">
		<?php while( have_rows('tabs') ) : the_row(); ?>
		<a class="button tab-button" data-tab="<?php the_sub_field('tab_button_text'); ?>"><?php the_sub_field('tab_button_text'); ?></a>		
		<?php endwhile; ?>
	</section>
	<?php endif; ?>
	<?php if( have_rows('tabs') ): ?>
	<section class="repeater">	    
	    <?php while( have_rows('tabs') ) : the_row(); ?>
    	<div style="max-width:90%;margin:auto;display:none;" class="margin-bottom-2 mytab" data-tab="<?php the_sub_field('tab_button_text'); ?>">	        
			<section style="padding-top:0;" class="free__first lower__first">
				<div class="inner">
				  	<div class="wp_content">
						<?php the_sub_field('tab_content'); ?>
					</div>
				</div>
			</section>		    
	    </div>
	    <?php endwhile; ?>
	</section>
	<?php endif; ?>
</section>
<script>
	function showTab(tab){
		jQuery(".tabs > *").removeClass('active');
		jQuery(".repeater > *").hide();
		jQuery(".repeater > *[data-tab='"+tab+"'").show()
		jQuery(".tabs > *[data-tab='"+tab+"'").addClass('active');
	}

	jQuery(function($) {
		$( ".tab-button" ).click(function() {
			let tab = $(this).data('tab');
			showTab(tab);
		});
		$('.tabs .tab-button:first-child').click();
	});


	jQuery(window).ready(function(){
		
		//check anchor hash
	    var anchorHash = window.location.href.toString();
	    
	    //if it url contains hash
	    if( anchorHash.lastIndexOf('#') != -1 ) {
	    	
	    	//get hash
	        anchorHash = anchorHash.substr(anchorHash.lastIndexOf('#'));
	        
	        //find anchor element using hash
	        let myanchor = jQuery(anchorHash);

	        //if there is an anchor
	        if( myanchor.length > 0 ) {
	        
	        	//find and show the nearest tab
	            let mytab_string = jQuery(myanchor.closest('.mytab')).data("tab");
	            showTab(mytab_string);

	            //scroll to anchor after 1 second
				setTimeout(function(){			   
			        let mytop = myanchor.offset().top;
			    	window.scrollTo(0, mytop); 			        
			    }, 1000);				

	        }
	    }
	});
</script>
 <?php get_footer(); ?>