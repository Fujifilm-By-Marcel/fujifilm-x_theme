<?php 
/*
Template Name: Page-creators-home
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.1.125');
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css',array(),'1.0.22');
	wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');

	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.3',true); 
	wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 

} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

get_header();
get_sidebar();
 
$imgDirectory = get_stylesheet_directory_uri()."/en-us/creators/img/";

//get 5 random images from creator galleries
$args = array(
	'post_type' => 'creators',
	'post_status' => array('publish'),
	'orderby' => 'rand',
	'posts_per_page' => 5,
	'tax_query' => array(),
);

//iterate the query
$randomized_images = [];
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) : 
while ( $the_query->have_posts() ) : $the_query->the_post(); 	
	$randomized_gallery = get_field( 'gallery' );
	shuffle( $randomized_gallery );
	$myNode['name'] = get_the_title();
	$myNode['image'] = wp_get_attachment_image_src( $randomized_gallery[0]['fullsize_image'], 'large' );
	//echo "<script>console.log('height: ".$myNode['image'][2]." Con1: ".($myNode['image'][2] <= 550)." Con2: ".($myNode['image'][2] >= 650)."')</script>";
	while ( isset($myNode['image'][2]) && ($myNode['image'][2] <= 372 || $myNode['image'][2] >= 660) )
	{
		//echo "<script>console.log('shifting, height: ".$myNode['image'][2]." Con1: ".($myNode['image'][2] <= 550)." Con2: ".($myNode['image'][2] >= 650)."')</script>";		
		array_shift ( $randomized_gallery );
		$myNode['image'] = wp_get_attachment_image_src( $randomized_gallery[0]['fullsize_image'], 'large' );			
	}

	if( isset($myNode['image'][2]) ){
		array_push( $randomized_images, $myNode );
	}

endwhile;
endif; 
wp_reset_postdata(); 


//echo "<pre>";
//print_r($randomized_images);
//echo "</pre>";
?>


<section class="main creators-home" style="margin-top: 71px;"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>

	<section class="top-section">
		<img class="winslow-left" src="<?php echo $imgDirectory ?>winslow-camera-only.png" srcset="<?php echo $imgDirectory ?>winslow-camera-only.png 1x, <?php echo $imgDirectory ?>winslow-camera-only@2x.png 2x, <?php echo $imgDirectory ?>winslow-camera-only@3x.png 3x">
		<img class="winslow-right" src="<?php echo $imgDirectory ?>2-winslow.png" srcset="<?php echo $imgDirectory ?>2-winslow.png 1x, <?php echo $imgDirectory ?>2-winslow@2x.png 2x, <?php echo $imgDirectory ?>2-winslow@3x.png 3x">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l4">
					<h2 class="page-tagline"><?php the_field("tagline") ?></h2>
				</div>
				<div class="col s12 m12 l8">
					<div class="my-slideshow" style="width: 100%;">
						<div class="slides-container">
							<?php foreach ($randomized_images as $randomized_image ) { ?>
							<div class="mySlide">
								<div class="frame-square">
									<img src="<?php echo $randomized_image['image'][0] ?>" width="<?php echo $randomized_image['image'][1] ?>" height="<?php echo $randomized_image['image'][2] ?>" />									
								</div>
								<p class="photo-credit"><?php echo $randomized_image["name"] ?></p> 
							</div>							
							<?php } ?>
							<div class="myoverlay"><button class='myplaybutton'></button></div>
							<div class="myprogressbar"><div class="myprogress"></div></div>
						</div>						
						<div class="slideshow-nav">
							<?php foreach ($randomized_images as $randomized_image ) { ?>
							<span class="mydot"></span> 
							<?php }	?>
						</div>
					</div>
					<div class="col s12 information-block center">
						<div class="white-left-border">
							<h2><?php the_field('header'); ?></h2>
							<div class="text">
								<?php the_field('text'); ?>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="owl-section">
		<div class="creators-owl-container">
			<div class="creators owl-carousel">
				<?php				
			    //setup args
				$args = array(
					'post_type' => 'creators',
					'post_status' => array('publish'),
					'orderby' => 'rand',
					'posts_per_page' => -1,
				);		
				//iterate they query
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) : 
				while ( $the_query->have_posts() ) : $the_query->the_post();
				$bioID =false;
				if(get_field('bio', get_the_ID())){
					$bioID = get_field('bio', get_the_ID());
				}
				$terms = get_the_terms(get_the_ID(), 'creator_category');
				$term_name = $terms[0]->name;
			            ?>
				<div class="col creator">				
					<div class="creator-content"> 
						<div class="creator-portrait-container">
							<?php 
							if( get_field("image_x2", $bioID) && get_field("image_x3", $bioID) ){
								$srcset = "data-srcset='";
								$srcset .= get_field("image_x1", $bioID)." 1x, ";
								$srcset .= get_field("image_x2", $bioID)." 2x, ";
								$srcset .= get_field("image_x3", $bioID)." 3x, ";
								$srcset .= "'";
							} else {
								$srcset = "";
							}
							?>
							<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><img class="portrait lazyload" width="160" height="160" data-src="<?php the_field("image_x1", $bioID); ?>" <?php echo $srcset; ?> ></a>
							<?php if($term_name == "X‑Photographer") { ?>
							<img class="badge" width="34" height="34" src="<?php echo $imgDirectory ?>x-photographer-badge-small.png" srcset="<?php echo $imgDirectory ?>x-photographer-badge-small.png 1x, <?php echo $imgDirectory ?>x-photographer-badge-small@2x.png 2x, <?php echo $imgDirectory ?>x-photographer-badge-small@3x.png 3x">
							<?php } ?>
						</div>
						<h3><?php echo $term_name ?></h3>
						<p class="creator-name"><?php the_title(); ?></p>
						<h3>BIO</h3>
						<p class="creator-desc"><?php echo get_the_excerpt($bioID);  ?></p>
						<a class="creator-btn" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">view profile</a>
					</div>
				</div>
				<?php endwhile;	?>
				<?php endif; ?>				
			
			</div>
		</div>
		<p class="meet-creators" style="margin:0 1rem;display:inline-block;float:right;"><a href="<?php echo get_permalink( get_page_by_path( 'creators' ) ) ?>">Meet the rest of our creators <i class='fas fa-caret-right' style="vertical-align: middle;color:#eb022f"></i></p>
	</section>
</section>
<script>
	//onclick for video opener
    (function ($, document) {
    	$.fn.isInViewport = function () {
		    let elementTop = $(this).offset().top;
		    let elementBottom = elementTop + $(this).outerHeight();

		    let viewportTop = $(window).scrollTop();
		    let viewportBottom = viewportTop + $(window).height();

		    return elementBottom > viewportTop && elementTop < viewportBottom;
		};
        $(document).ready(function () {
            jQuery(".my-slideshow").slideshow({				
            	playbutton: true,
            	pauseonviewport: true,
            	autoplay: true,
			});
			jQuery('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:10,
			    nav:true,
			    navText : ["<i class='fas fa-caret-left'></i>","<i class='fas fa-caret-right'></i>"],
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        1120:{
			            items:3
			        },
			        1800:{
			        	items:4
			        }
			    }
			});			
			jQuery(".owl-prev span").text("");
			jQuery(".owl-next span").text("");
			jQuery(".creators").show();
			jQuery(".winslow-left").show();
			jQuery(".winslow-right").show();
			jQuery(".page-tagline").show();
			//$(".myplaybutton").click();

			lazyload();
        });

    }(jQuery, document));
</script>

<?php get_footer();  ?>