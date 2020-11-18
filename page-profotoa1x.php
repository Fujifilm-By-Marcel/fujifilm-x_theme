<?php
/*
Template Name: Page-profotoa1x
*/
function page_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css',array(),'1.0.5'); 
	wp_enqueue_style('profoto-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/profoto.css',array(),'1.0.40');	
}
function page_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
	wp_enqueue_script('jquery-slideshow-profoto', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow-profoto.js', array(), '1.0.28',true); 
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.0',true); 
}
add_action( 'wp_enqueue_scripts', 'page_styles' );
add_action( 'wp_enqueue_scripts', 'page_scripts' );

get_header(); 
get_sidebar(); 
?>
<style>
.form-iframe{
    max-height:none;
    min-height:800px;
	width:100%;
}
@media (max-width:375px){	
	.form-iframe{
		min-height:900px;
	}
}
</style>
<div class="main">
	<?php if( have_rows('header_section') ): ?>
    <?php while( have_rows('header_section') ): the_row(); ?>
	<section class="section-1">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l6 push-l6">
					<div class="text-container">
						<p class="top-tagline"><?php the_sub_field('top_tagline') ?></p>
						<h1><?php the_sub_field('main_header') ?></h1>
						<p class="bottom-tagline"><?php the_sub_field('bottom_tagline') ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_2_new') ): ?>
    <?php while( have_rows('section_2_new') ): the_row(); ?>
	<div class="section-2-overlay"></div>
	<section class="section-2">	
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="text-container">
						<h2><?php the_sub_field('header') ?></h2>
						<?php the_sub_field('text') ?>
					</div>
				</div>
			</div>
		</div>		
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_3') ): ?>
    <?php while( have_rows('section_3') ): the_row(); ?>
	<div class="section-3-overlay"></div>
	<section class="section-3">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l8"> 
					<div class="text-container">
						<h2><?php the_sub_field('header') ?></h2>
						<?php the_sub_field('text') ?>
					</div>
					<div class="features">
						<?php
						$i=0;
						$count = count(get_sub_field("features"));
						if( have_rows('features') ):						
    					while ( have_rows('features') ) : the_row();
    					//every third item close and open row
    					//do not close if first row
    					if($i%3 == 0 && $i != 0){
    						echo '</div>';
    					}
    					if($i%3 == 0){
    						echo '<div class="row">';
    					}
						?>						
							<div class="col s4 m3 l4 xl3 icon-container">
								<?php 
									if (get_sub_field('image_override')){
										$imgsrc = wp_get_attachment_image_url( get_sub_field('image_override'), 'full' );
									}
									else{
										$imgsrc = get_sub_field('image_url');
									}
								?>
								<div class="svg-container"><img src="<?php echo $imgsrc ?>"  style="<?php the_sub_field('imgstyle') ?>"></div>
								<p><?php the_sub_field('text') ?></p>
							</div>						
						<?php
						$i++;
						if($i == $count){
							echo '</div>';
						}
					    endwhile;
						endif;
						?>
					</div>
					<div class="row button-container">
						<?php
						$button = get_sub_field('button_new');
						if( $button ):
						?>
						<a href="<?php echo $button['link'] ?>" target="<?php echo $button['target'] ?>"><div class="button"><?php echo $button['text'] ?></div></a>
						<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('videos') ): ?>
	<section class="section-4">
		<div class="container">
			<?php				
			$i = 0;
			$count = count(get_field("videos"));						
			while ( have_rows('videos') ) : the_row();		
	    	//every second item close and open row
			//do not close if first row
			if($i%2 == 0 && $i != 0){
				echo '</div>';
			}
			if($i%2 == 0){
				echo '<div class="row">';
			}		
			?>
				<div class="col s12 m6">
					<div class="text-container">
						<div class="video-opener" data-id="myModal-<?php echo $i ?>">
							<img class="play-icon" src="<?php echo get_stylesheet_directory_uri() ?>/en-us/fnac-assets/img/profoto/play.svg" >
							<img class="video-preview" src="<?php echo wp_get_attachment_image_url( get_sub_field('image'), 'full' ) ?>" >
						</div>
						<h3><?php the_sub_field('title') ?></h3>
						<p><?php the_sub_field('description') ?></p>
					</div>
				</div>
			<?php	
			$i++;			
			if($i == $count){
				echo '</div>';
			}				
		    endwhile;			
			?>
		</div>	
	</section>
	<?php endif; ?>

	<?php if( have_rows('section_5_new') ): ?>
    <?php while( have_rows('section_5_new') ): the_row(); ?>
	<section class="section-5">
		<div class="container">
			<div class="row flex-row">
				<div class="col s12 m6">					
					<div class="camera-combo">
						<img src="https://fujifilm-x.com/en-us/wp-content/uploads/sites/11/2019/12/A1X-GFX100_01.png">
						<div class="my-slideshow-autoplay">
							<div class="slides-container">
								<?php																	
								//start gallery slides
								if( have_rows('gallery') ):
								while ( have_rows('gallery') ) : the_row();
								?>				
								<div class="mySlide">
									<img src="<?php echo wp_get_attachment_image_url( get_sub_field("image"), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field("image"), 'full' ); ?>" />
									<div class="myslide-cta">
										<h2><?php the_sub_field('title') ?></h2>
										<a href="<?php the_sub_field('link') ?>" target="<?php the_sub_field('target') ?>"><div class="button"><?php the_sub_field('button_text') ?></div></a>
									</div>
								</div>
								<?php
								endwhile;
								endif;
								//end gallery slides
								?>
							</div>
							<div class="myprogressbar"><div class="myprogress"></div></div>
							<div class="slideshow-nav">	
								<?php
								//start gallery dots
								if( have_rows('gallery') ):
								while ( have_rows('gallery') ) : the_row();
								?>										
								<span class="mydot"></span>
								<?php
								endwhile;
								endif;
								//end gallery dots
								?>
							</div>
						</div>
					</div>					
				</div>
				<div class="col s12 m6">
					<div class="text-container">
						<h2><?php the_sub_field('header') ?></h2>
						<?php the_sub_field('text') ?>
					</div>
					<div class="features">
						<?php
						$i=0;
						$count = count(get_sub_field("features"));
						if( have_rows('features') ):						
    					while ( have_rows('features') ) : the_row();
    					//every third item close and open row
    					//do not close if first row
    					if($i%3 == 0 && $i != 0){
    						echo '</div>';
    					}
    					if($i%3 == 0){
    						echo '<div class="row">';
    					}
						?>						
							<div class="col s4 m12 l12 xl4 icon-container">

								<?php 
									if (get_sub_field('image_override')){
										$imgsrc = wp_get_attachment_image_url( get_sub_field('image_override'), 'full' );
									}
									else{
										$imgsrc = get_sub_field('image_url');
									}
								?>
								<div class="row">
									<div class="col s12 m4 l4 xl12">
										<div class="svg-container"><img src="<?php echo $imgsrc ?>"></div>
									</div>
									<div class="col s12 m8 l8 xl12">
										<?php the_sub_field('text') ?>
									</div>
								</div> 
							</div>						
						<?php
						$i++;
						if($i == $count){
							echo '</div>';
						}
					    endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>	
	</section>

	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_6') ): ?>
	<?php while( have_rows('section_6') ): the_row(); ?>
	<section class="section-6">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2><?php the_sub_field("header") ?></h2>
					<div class="my-slideshow">
						<div class="slides-container">
							
							<?php																	
							if( have_rows('gallery') ):
								while ( have_rows('gallery') ) : the_row();
									?>
									<div class="mySlide">
										<img src="<?php echo wp_get_attachment_image_url( get_sub_field("image"), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field("image"), 'full' ); ?>" />
										<p class="photograph-credit"><?php the_sub_field('photographer_credit') ?></p>
									</div>
									<?php
								endwhile;
							else :
							endif;
							?>
							<!-- Next and previous buttons - alt color - 979797 -->
							<a class="myprev">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 41 55">
    								<path fill="none" fill-rule="evenodd" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M37.564 3L3 29.865l34.564 22.326"/>
    							</svg>
    						</a>
							<a class="mynext">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 41 55">
								    <path fill="none" fill-rule="evenodd" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="5" d="M3 52.191l34.564-26.865L3 3"/>
								</svg>								
							</a>
						</div>						
						<div class="slideshow-nav">
							<br>
							<?php
							//start gallery dots
							if( have_rows('gallery') ):
								while ( have_rows('gallery') ) : the_row();
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
			</div>
		</div>
	</section>
	
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_7') ): ?>
	<?php while( have_rows('section_7') ): the_row(); ?>
	<section class="section-7">
		<div class="container">
			<div class="row">
				<div class="col s12 m4 l4 xl6">
					<h2 class="mobile-only"><?php the_sub_field("header") ?></h2>
					<img src="<?php the_sub_field("image") ?>" >
				</div>
				<div class="col s12 m8 l8 xl6">
					<h2 class="desktop-only"><?php the_sub_field("header") ?></h2>
					<?php the_sub_field("content") ?>
				</div>
			</div>
		</div>
	</section>
	
	<?php endwhile; ?>
	<?php endif; ?>

</div>

<!--VIDEO LIGHTBOXES-->
<?php				
$i = 0;
if( have_rows('videos') ):				
while ( have_rows('videos') ) : the_row();				
?>			
<div id="myModal-<?php echo $i ?>" class="modal">
	<div class="modal-content">
		<div class="close" onclick="closeModal()">
			<span class="cursor">&times;</span>
		</div>
		<div class="resp-container">
			<iframe class="resp-iframe"  width="560" height="315" src="<?php echo get_sub_field('embed_url') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</div>
<?php	
$i++;							
endwhile;
endif;
?>

<!-- SCREEN SIZE MARKER -->
<div id="window-size-marker" class="window-size-marker" style="position:relative;"></div>	

<script>
	// Open the Modal
	function openModal(myElement) {
		jQuery("#"+myElement).css("display","block");
	}

	// Close the Modal
	function closeModal() {
		jQuery(".modal").css("display","none");
	}


	(function($) {

		//refresh the marker
		var marker = $(".window-size-marker").css("z-index");

		function equalizeOverlay(){
			$(".section-2-overlay").height($(".section-2").outerHeight());
			$(".section-3-overlay").height($(".section-3").outerHeight());
		}

		$(window).load(function() {
			equalizeOverlay();
		});

		$( window ).resize(function() {
		  	equalizeOverlay();
		});

		$(".video-opener").click(function(){
			openModal($(this).data('id'));
		});

	})( jQuery );


	jQuery( document ).ready(function() {
		jQuery(".my-slideshow-autoplay").slideshowProfoto({				
			"autoplay": true,
			"playslideduration": 5000,
			"pauseonhover": true,
			"pauseonviewport": true,
		});
		jQuery(".my-slideshow").slideshow({				

		});
	});

</script>



<?php get_footer(); ?>