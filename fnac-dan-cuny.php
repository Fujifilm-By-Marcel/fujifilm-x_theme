<?php
/*
Template Name: fnac-dan-cuny
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


 function printCameras(){
 	
    ob_start();

	if( have_rows('cameras') ):
		echo "<div class='cameras'>";
	    while( have_rows('cameras') ) : the_row();
	    	echo "<div>";
	        the_sub_field('content');
	        echo "</div>";
	    endwhile;
	    echo "</div>";
	endif;

	return ob_get_clean();
 }

 function printLenses(){

 	ob_start();


 	if( have_rows('lenses') ):
		echo "<div  class='lenses'>";
	    while( have_rows('lenses') ) : the_row();
	        echo "<div>";
	        the_sub_field('content');
	        echo "</div>";
	    endwhile;
	    echo "</div>";
	endif;

	return ob_get_clean();
 }

  function printCameras_select(){    
  	ob_start();

	$select = get_field('cameras_select');
	if( $select ): ?>
	    <div  class='cameras'>
	    <?php foreach( $select as $post ):  ?>
	        <div>
	        	<div style="max-width:237px;margin:auto;margin-bottom:1rem;"><img src="<?php the_field('image_url', $post->ID ) ?>" class="alignnone size-full wp-image-52513 aligncenter"></div>
	        	<h4 style="text-align:center;"><?php the_field('header', $post->ID ) ?></h4>
	        	<p><?php the_field('text', $post->ID ) ?></p>
	            <p style="text-align: center;margin-top:auto;"><a href="<?php the_field('button_href', $post->ID ) ?>" class="cta" target="<?php the_field('button_target', $post->ID ) ?>"><?php the_field('button_text', $post->ID ) ?> ></a></p>

	        </div>
	    <?php endforeach; ?>
	    </div>
	<?php endif;

	return ob_get_clean();
 }

 function printLenses_select(){

 	ob_start();

	$select = get_field('lenses_select');
	if( $select ): ?>
	    <div  class='lenses'>
	    <?php foreach( $select as $post ):  ?>
	        <div>
	        	<div style="max-width:237px;margin:auto;margin-bottom:1rem;"><img src="<?php the_field('image_url', $post->ID ) ?>" class="alignnone size-full wp-image-52513 aligncenter"></div>
	        	<h5 style="text-align:center;"><?php the_field('header', $post->ID ) ?></h5>
	        	<!--<p><?php the_field('text', $post->ID ) ?></p>-->
	            <p style="text-align: center;margin-top:auto;"><a href="<?php the_field('button_href', $post->ID ) ?>" class="cta" target="<?php the_field('button_target', $post->ID ) ?>"><?php the_field('button_text', $post->ID ) ?> ></a></p>

	        </div>
	    <?php endforeach; ?>
	    </div>
	<?php endif;

	return ob_get_clean();
 }

add_shortcode( 'cameras', 'printCameras' );
add_shortcode( 'lenses', 'printLenses' );
add_shortcode( 'cameras_select', 'printCameras_select' );
add_shortcode( 'lenses_select', 'printLenses_select' );
?>
<style>
	:root{
		--grey-color: #e9e9e9;
		--red-color: #fc0019;
		--green-color: #409d27;		
		--accent-font: "Fjalla One", sans-serif;
	}
	.content img{
		width:auto !important;
		display: inline-block;
	}

	/* fonts */
	.main h2{
		font-family: var(--accent-font);
		font-size: 1.75rem;
		margin-bottom: .5rem;
		line-height: normal;
	}
	.main h3{
		font-family: var(--accent-font);
		 font-size: 1rem;
		 margin-bottom: 1rem;
		 color: var(--red-color);
		 line-height: normal;
	}
	.main .page-content h3{
		margin-bottom: 2rem;
	}
	.main h4{
		font-family: var(--accent-font);
		font-size: 1.375rem;
		margin-bottom: 1rem;
		line-height: normal;
	}
	.main h5{
		font-family: var(--accent-font);
		font-size: 1.25rem;
		margin-bottom: .5rem;
		line-height: normal;
	}
	.main p{
		margin-bottom:1rem;
		line-height:normal;
		font-size:1rem;
		line-height: normal;
	}
	html{
		font-size:14px;
	}

	/*layout*/
	.tab{
		padding-top:2.75rem;
		padding-bottom:2.75rem;
	}
	.row{
		max-width: min(680px,90%);
		margin: auto;
	}
	.split{
		display: flex;
		flex-direction: column;
	}
	.split > *{
		margin-bottom: 1rem;
	}
	.lower__first .inner{
		padding-top:0;
	}
	.wp_content{
		margin-bottom:0;
		padding-bottom:1.8rem !important;
	}
	.content .tab:first-child{
		padding-top: 90px;
	}
	.wp_content table {
	    margin-bottom: 0 !important;
	}
	.container{
		max-width: min(90%, 80em);
		margin: auto;
	}
	
	/* components */
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
		line-height:normal;
		margin-bottom: 1rem;
	}

	.main .button.white-bg{
		background: white;
		color: black;
	}

	/* helper claseses*/
	.fjalla{
		font-family:var(--accent-font);	
	}
	.desktop-only{
		display: none;
	}

	/*page specific*/
	.banner p{
		font-size: 0.875rem;
	}

	/* repeaters */
	.cameras, .lenses{
		margin-bottom: 2rem;
	}
	.cameras img, .lenses img{
		display: block;
		margin: auto;
	}
	.cameras > *{
		background: var(--grey-color);
		padding: 1.5rem 2.875rem;
	}

	.cameras > *, .lenses > *{
		margin-bottom: 2rem;
	}

	.cameras p{
		font-size: .75rem;
	}
	.cameras .cta, .lenses .cta{
		font-size: .875rem;
		color: var(--red-color);
		cursor: pointer;
	}
	
	.lenses{
		display: grid;
		grid-template-columns: auto auto;
		row-gap: 2em;
		column-gap: 3em;
	}


	/* responsive desktop*/
	@media (min-width:50em) {
		.split{
			flex-direction:row;
		}
		
		.split > *{
			flex-basis: 100%;
		}
		.split > * + * {
			margin-left:2em;
		}
		html{
			font-size:16px;
		}
		.desktop-only{
			display:block;
		}
		.mobile-only{
			display:none;
		}

		/* repeaters */
		.cameras{
			display: grid;
			grid-template-columns: auto auto;
			row-gap: 2em;
			column-gap: 3em;
			
		}
		.cameras > *, .lenses > *{
			margin-bottom: 0;
			display: flex;
    		flex-direction: column;
		}
		.lenses{
			display: grid;
			grid-template-columns: auto auto auto auto auto;
			gap: 1.75em;
		}

	}



</style>
<section class="main">
	<section class="content">

		<section class="banner" style="background-image: url('<?php the_field('banner_background') ?>');background-size: cover;color:white;min-height:630px;display:flex;padding:3em 0;">
			 
			<div class="container">
				<div class="split" style="max-width: 60em;margin: auto;align-items:center;">
					<div>	
						<img src="<?php the_field('portrait') ?>" alt="" class="portrait">
					</div>
					<div>
						<?php the_field('banner_text') ?>
					</div>
				</div>
			</div>
		</section>
		<section class="container page-content" style="padding: 3em 0;">
			<?php the_field('page_content') ?>
		</section>
	</section>
</section>

<script>

jQuery(function($) {


});
</script>
<?php get_footer(); ?>