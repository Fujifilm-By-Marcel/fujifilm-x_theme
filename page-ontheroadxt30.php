<?php
/*
Template Name: Page-OnTheRoadXT30
*/

function ontheroadwiththext30_styles(){
	wp_enqueue_style('on-the-road-with-the-x-t30', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/on-the-road-with-the-x-t30.css',array(),'1.0.4'); 
	wp_enqueue_style('slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/slideshow.css',array(),'1'); 
	wp_enqueue_style('x-t30-road-map', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/x-t30-road-map.css',array(),'1.1'); 
	wp_enqueue_style('tabs', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/tabs.css',array(),'1'); 
}
function ontheroadwiththext30_scripts(){
	wp_enqueue_script('tabs', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/tabs.js', array(), '1',true); 
	wp_enqueue_script('slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/slideshow.js', array(), '1',true); 
	wp_enqueue_script('x-t30-road-map', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/x-t30-road-map.js', array(), '1.22',true); 
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
}
add_action( 'wp_enqueue_scripts', 'ontheroadwiththext30_scripts' );
add_action( 'wp_enqueue_scripts', 'ontheroadwiththext30_styles' );

get_header(); 

?>


<div id="container">
	<div id="content" role="main">	
	
		<div class="events__first lower__first">
			<div class="inner">
				<?php the_title( '<h1 class="headline_underline headline_h1">', '</h1>' ); ?>
				<div class="wp_content max-1000" style="margin-bottom: 0;padding-bottom: 0;">

					<?php if( get_field('tagline') ): ?>
					<h2 class="xt30-tagline"><?php the_field('tagline'); ?></h2>
					<?php endif; ?>

					<div class="tab-filters tab">
						<ul>
							<li class="tablinks defaultOpen" onclick="openTab(event, '<?php the_field('first_tab_name') ?>')"><?php the_field('first_tab_name') ?></li>
							<li class="tablinks" onclick="openTab(event, '<?php the_field('second_tab_name') ?>')" ><?php the_field('second_tab_name') ?></li>
						</ul>
					</div>	
				</div>					
			</div>
		</div>
		

				
		<div id="<?php the_field('second_tab_name') ?>" class="tabcontent single-gear-chooser" >	
			<div class="xstoriespost__contents lower__contents">
				<div class="inner">
					<div class="wp_content max-1000">					
						<!-- Slideshow container -->
						<div class="slideshow-container">
							<!-- Full-width images with number and caption text -->							
							<?php												
							// check if the repeater field has rows of data
							if( have_rows('image_carousel') ):

							// loop through the rows of data
							while ( have_rows('image_carousel') ) : the_row();					

							// vars
							$image = get_sub_field('image');	

							if( $image ): ?>
							<div class="mySlides">
								<img class="lazyload" data-src="<?php echo wp_get_attachment_image_url( $image['image'], 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( $image['image'], 'full' ); ?>" >
								<?php if($image['caption']) : ?>
								<p><?php echo $image['caption']; ?></p>
								<?php endif; ?>
							</div>
							<?php endif;									
							endwhile;
							else :
							// no rows found
							endif;
							?>							

							<!-- Next and previous buttons -->
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>
						</div>
						<br>

						<!-- The dots/circles -->
						<div class="slideshow-nav">
							<?php
							$i = 0;
							// check if the repeater field has rows of data
							if( have_rows('image_carousel') ):

							// loop through the rows of data
							while ( have_rows('image_carousel') ) : the_row(); $i++; ?>
							<span class="dot" onclick="currentSlide(<?php echo $i ?>)"></span> 
							<?php
							endwhile;
							else :
							// no rows found
							endif; ?>
						</div>


						<?php if( get_field('specification_content') ): ?>
						<?php the_field('specification_content'); ?>
						<?php endif; ?>
					</div>				
				</div>
			</div>
		</div>
		
		

		<div id="<?php the_field('first_tab_name') ?>" class="tabcontent"  >

			<?php
			if ( get_field('hype_animation_shortcode') ) {
			echo do_shortcode( get_field('hype_animation_shortcode') );
			}

			$args = array(
			'post_type' => 'xstories',
			//'category__and' => get_field('category'),
			'post_status' => array('publish'),
			'tag' => get_field('post_tag'),
			'orderby' => 'publish_date',				
			'order' => 'DESC'
			);

			switch_to_blog( 1 );
			$the_query = new WP_Query( $args );
			$iteration = 0;
			if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post(); $iteration++;?>

			<div class="story <?php echo get_the_ID() ?>" style="display:none;">
				<section class="xstoriespost__first lower__first" >
					<div class="inner">


						<div class="xstoriespost__mainvisual">
						<img class="lazyload" data-src="<?php the_field('story_en-us_img'); ?>">
						</div>


						<div class="xstoriespost__titles">
						<small class="xstoriespost__titles_date" style="margin-top: 20px;">
						<?php 
						$post_time = get_post_time('m.d.y');
						echo $post_time;
						?>
						</small>
						<?php the_title('<h1 style="text-align:center;">', '</h1>'); ?>

						</div>	
					</div>
				</section>
				<section class="xstoriespost__contents lower__contents">
					<div class="inner">
						<div class="wp_content">
							<?php
							// check if the repeater field has rows of data
							if( have_rows('story_en-us_md') ):

							// loop through the rows of data
							while ( have_rows('story_en-us_md') ) : the_row();

							// display a sub field value
							the_sub_field('story_en-us_md_txt');
							
							?>
							<div class="wp-caption">
								<?php if( get_sub_field('story_en-us_md_img') ) {  ?>
									<img class="lazyload" data-src="<?php the_sub_field('story_en-us_md_img'); ?>">
								<?php } ?>
								<p class="wp-caption-text">
									<?php 
									if( get_sub_field('story_en-us_md_cap') ) { 
										the_sub_field('story_en-us_md_cap');  

									}
									?>
								</p>
							</div>
							<?php		
							endwhile;
							else :
							// no rows found
							endif;
							?>
						</div>
					</div>
				</section>
			</div>
			<?php
			endwhile; 
			else : 
			?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php 
			endif;	
			?>

			<!--
			<div class="xstoriespost__contents lower__contents">
				<div class="inner">
					<div class="wp_content max-1000">
					
						<h2 style="text-align:center;">Related Posts</h2>

						<?php
						$iteration = 0;
						if ( $the_query->have_posts() ) : 
						while ( $the_query->have_posts() ) : $the_query->the_post(); $iteration++;					

							//print_r($the_query->post->ID);
								
						?>


						<div class="xt30-row <?php if( $iteration == 1 ) echo "most-recent";?>">		
							<?php 
							if( get_field('story_en-us_img') ): 
								
								$imageid = attachment_url_to_postid( get_field('story_en-us_img') );
								$full = get_field('story_en-us_img');
								$thumb = wp_get_attachment_image_src( $imageid, "medium" );
								
								if( $iteration == 1 ){
									$imgsrc = $full;
								}
								else{
									$imgsrc = $thumb[0];	
								}
							?>
							<div class="featured-image">
								<a href="<?php the_permalink($the_query->post->ID); ?>">
									<img class="lazyload" data-src="<?php echo $imgsrc ?>">
								</a>
							</div>
							<?php endif; ?>
							<div class="xt30-preview">
								<a href="<?php the_permalink($the_query->post->ID); ?>" class="xt30-title">
									<?php the_title('<h3>', '</h3>'); ?>
								</a>
								<div class="xt30-synopsis">
									<p>
										<span lang="EN-US"><?php 
										if(get_field('excerpt')){
										the_field('excerpt'); 
										}
										else{
										the_field('description_en-us'); 
										}
										?></span>									
									</p>
								</div>
								<div class="xt30-publish-date">
									<p>
										<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php 
										$post_time = get_post_time('m.d.y');
										echo $post_time;
										?>
									</p>
								</div>
							</div>
						</div>					
						<?php							
						endwhile; 
						restore_current_blog();						
						else : 
						?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php 
						endif;	
						?>		

						
					</div>	
				</div>
			</div>
		-->
			
		</div>
		
		
	</div><!-- #content -->
</div><!-- #container -->
<script>
jQuery( document ).ready(function() {
	lazyload();
});

</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>