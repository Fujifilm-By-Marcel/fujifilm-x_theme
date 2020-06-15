<?php

function single_quickstart_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/css/jquery-slideshow.css',array(),'1'); 
}
function single_quickstart_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/js/jquery-slideshow.js', array(), '1',true); 
}

add_action( 'wp_enqueue_scripts', 'single_quickstart_styles' );
add_action( 'wp_enqueue_scripts', 'single_quickstart_scripts' );


  
?>
	
<?php get_header(); ?>
<?php get_sidebar(); ?>
<style>
.wp_content p{margin-bottom:20px;}
.wp_content h5{margin-bottom:20px;}
.wp_content{max-width:1000px;}
</style>

<section class="main">
	<div class="row">
		<img class="hero-banner desktop" src="<?php echo wp_get_attachment_image_url( get_field("header_image"), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_field("header_image"), 'full' ); ?>">
	</div>
	
	<section class="events__first lower__first" style="padding-top: 0;">
		<div class="inner">
			<h1 class="headline_underline headline_h1"><?php the_title(); ?></h1>
			<div class="tagline"><?php the_field("tagline") ?></div>
		</div>
	</section>

	<div class="inner">
		<div class="container">
			<div class="wp_content">
				<div class="row">
					<div class="col s12"><h2>Contents</h2></div>
				</div>				
				<div class="row">
					<div class="col s12">
						<?php			
						if( have_rows('contents') ):
							echo "<ul>";		
							$i = 0;				
							while ( have_rows('contents') ) : the_row();
								?>
								<li><a href="#content-<?php echo $i ?>"><?php the_sub_field('title'); ?></a></li>
								<?php
							$i++;
							endwhile;
							echo "</ul>";
						else :
						endif;

						?>
					</div>
				</div>
				<?php				
				//start contents repeater
				if( have_rows('contents') ):
					$i = 0;	
					while ( have_rows('contents') ) : the_row();
						?>
						
						<div id="content-<?php echo $i ?>" class="row">
							<div class="col s12">
								<h2><?php the_sub_field('title'); ?></h2>
							</div>
						</div>
						<?php

						//start flexible content
						if( have_rows('inner_contents') ):

							 
							while ( have_rows('inner_contents') ) : the_row();

								if( get_row_layout() == 'wysiwig_only' ):
									?>
									<div class="row">
										<div class="col s12">
											<?php the_sub_field('wysiwig'); ?>
										</div>
									</div>									
									<?php
								elseif( get_row_layout() == 'gallery_and_wysiwig' ): 
									?>
									<div class="row">
										<div class="col s12 m12 l6">
											<div class="my-slideshow">
												<div class="slides-container">
													
													<?php																	
													//start gallery slides
													if( have_rows('gallery') ):
														while ( have_rows('gallery') ) : the_row();
															?>
															<div class="mySlide">
																<img src="<?php echo wp_get_attachment_image_url( get_sub_field("image"), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field("image"), 'full' ); ?>" />
															</div>
															<?php
														endwhile;
													else :
													endif;
													//end gallery slides
													?>				
													
													<!-- Next and previous buttons -->
													<a class="myprev">&#10094;</a>
													<a class="mynext">&#10095;</a>
													<div class="myoverlay">
														<button class='myplaybutton'></button>
													</div>
													<div class="myprogressbar"><div class="myprogress"></div></div>
												</div>
												<br>
												<!-- The dots/circles -->
												<div class="slideshow-nav">											
													<?php																	
													//start gallery dots
													if( have_rows('gallery') ):
														$index = 0;
														while ( have_rows('gallery') ) : the_row();
															$index++;
															?>
															<span class="mydot"></span> 
															<?php
														endwhile;
													else :
													endif;
													//end gallery dots
													?>
												</div>
											</div>
										</div>
										<div class="col s12 m12 l6">
											<?php the_sub_field('wysiwig'); ?>
										</div>										
									</div>									
									<?php
								endif;

							endwhile;

						else :
						endif;
						//end flexible content
					$i++;	
					endwhile;
				else :
				endif;
				//end contents repeater
				?>
			</div>
		</div>
	</div>
</section>


<script>
jQuery( document ).ready(function() {
	jQuery(".my-slideshow").slideshow({				
		playbutton: true
	});
});
</script>
<?php get_footer(); ?>