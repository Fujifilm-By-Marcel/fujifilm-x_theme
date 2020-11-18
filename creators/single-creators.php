<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', array(),'1.0.0');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.1.55');
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css', array(),'1.0.6');
	wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');


	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.4',true); 
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
	wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );
 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

get_header(); 
get_sidebar();
 
$imgDirectory = get_stylesheet_directory_uri()."/en-us/creators/img/";

$terms = get_the_terms(get_the_ID(), 'creator_category');
$term_name = trim ( $terms[0]->name );
$isCreator = true;
if( $term_name == "X‑Photographer" ){
	$badgecolClass = "s6";
	$badgecolHide = "";
	$isCreator = false;
} else {
	$badgecolClass = "s12";
	$badgecolHide = 'style="display:none;"';
}
?>
<style>

</style>
<section class="main creators-single"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>

	<div class="container"> 
		<div class="row">
			<div class="col s12 back-to-archive">
				<a href="<?php echo get_post_type_archive_link( 'creators' ); ?>"><span class="arrow-left"></span><span class="back-text">BACK TO CREATOR GALLERY</span></a>
			</div>
		</div>
	</div>

	<div class="container single-bio">
		<div class="row">
			<div class="col s12 m4 l4 xl3">
				<div class="portrait-badge-section">
					<div class="row">
						<div class="col s12">
							<?php 
							if( get_field("archive_portrait_2x") && get_field("archive_portrait_3x") ){
								$srcset = "srcset='";
								$srcset .= get_field("archive_portrait")." 1x, ";
								$srcset .= get_field("archive_portrait_2x")." 2x, ";
								$srcset .= get_field("archive_portrait_3x")." 3x, ";
								$srcset .= "'";
							} else {
								$srcset = "";
							}
							?>
							<img width="160" height="160" src="<?php the_field("archive_portrait"); ?>" <?php echo $srcset; ?> >
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<p class="website"><a href="<?php the_field("website_url") ?>" target="_blank"><?php the_field("website_text"); ?></a></p>
						</div>
					</div>
					<div class="row">
						<div class="col <?php echo $badgecolClass ?>"> 
							<div class="large-badge">
								<img src="<?php echo $imgDirectory ?>creator-badge.png" srcset="<?php echo $imgDirectory ?>creator-badge.png 1x, <?php echo $imgDirectory ?>creator-badge@2x.png 2x, <?php echo $imgDirectory ?>creator-badge@3x.png 3x">
								<p><span class="text-overflow-center">Creator Since</span><br><?php the_field('creator_dates') ?></p>
							</div>
						</div>
						<div class="col <?php echo $badgecolClass ?>" <?php echo $badgecolHide; ?> >
							<div class="large-badge">
								<img src="<?php echo $imgDirectory ?>x-photographer-badge.png" srcset="<?php echo $imgDirectory ?>x-photographer-badge.png 1x, <?php echo $imgDirectory ?>x-photographer-badge@2x.png 2x, <?php echo $imgDirectory ?>x-photographer-badge@3x.png 3x">
								<p><span class="text-overflow-center">X&#8209;Photographer</span><br><?php the_field('x-photographer_dates') ?></p>
							</div>
						</div>
					</div>				
				</div>
				<?php if( have_rows('social') ): ?>
   				<?php while( have_rows('social') ): the_row(); ?>
				<div class="social-icons lowres-only">
					<?php if(get_sub_field('youtube')){ ?><a target="_blank" href="<?php the_sub_field('youtube') ?>"><span><img src="<?php echo $imgDirectory ?>svg/youtube-icon.svg"></span></a><?php } ?>
					<?php if(get_sub_field('instagram')){ ?><a target="_blank" href="<?php the_sub_field('instagram') ?>"><span><img src="<?php echo $imgDirectory ?>svg/instagram-icon-black.svg"></span></a><?php } ?>
					<?php if(get_sub_field('twitter')){ ?><a target="_blank" href="<?php the_sub_field('twitter') ?>"><span><img src="<?php echo $imgDirectory ?>svg/twitter-icon.svg?v=2"></span></a><?php } ?>
					<?php if(get_sub_field('facebook')){ ?><a target="_blank" href="<?php the_sub_field('facebook') ?>"><span><img src="<?php echo $imgDirectory ?>svg/facebook-icon-black.svg"></span></a><?php } ?>
					<?php if(get_sub_field('vimeo')){ ?><a target="_blank" href="<?php the_sub_field('vimeo') ?>"><span><img src="<?php echo $imgDirectory ?>svg/vimeo-logo.svg"></span></a><?php } ?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col s12 m8 l8 xl9">	
				<div class="relative-container">				
					<?php if( have_rows('social') ): ?>
	   				<?php while( have_rows('social') ): the_row(); ?>
					<div class="social-icons highres-only">
						<?php if(get_sub_field('youtube')){ ?><a target="_blank" href="<?php the_sub_field('youtube') ?>"><span><img src="<?php echo $imgDirectory ?>svg/youtube-icon.svg"></span></a><?php } ?>
						<?php if(get_sub_field('instagram')){ ?><a target="_blank" href="<?php the_sub_field('instagram') ?>"><span><img src="<?php echo $imgDirectory ?>svg/instagram-icon-black.svg"></span></a><?php } ?>
						<?php if(get_sub_field('twitter')){ ?><a target="_blank" href="<?php the_sub_field('twitter') ?>"><span><img src="<?php echo $imgDirectory ?>svg/twitter-icon.svg?v=2"></span></a><?php } ?>
						<?php if(get_sub_field('facebook')){ ?><a target="_blank" href="<?php the_sub_field('facebook') ?>"><span><img src="<?php echo $imgDirectory ?>svg/facebook-icon-black.svg"></span></a><?php } ?>
						<?php if(get_sub_field('vimeo')){ ?><a target="_blank" href="<?php the_sub_field('vimeo') ?>"><span><img src="<?php echo $imgDirectory ?>svg/vimeo-logo.svg"></span></a><?php } ?>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>		
					<h3><?php echo $term_name ?></h3>
					<p class="creator-name"><?php the_title(); ?></p>
					<h3>ABOUT <?php the_field("first_name"); ?></h3>		
				</div>
				<div class="creator-desc">
					<?php the_field("long_bio"); ?>
				</div>
				<?php 
				if(get_field("button_text")){
					$button_text = get_field("button_text");								
				} else {
					$button_text = "visit website";
				}
				?>
				<div class="creator-btn-container">
					<a class="creator-btn" href="<?php the_field("website_url") ?>" target="_blank"><?php echo $button_text; ?></a>
				</div>
			</div>
		</div>
	</div> 

	<?php if( get_field('enable_projects') ): ?>    
	<?php if( have_rows('projects_slider') ): ?>    
	<div class="container" style="padding:3.25rem 0 2rem;">
		<div class="row">
			<div class="col s12">							
				<div class="my-slideshow">
					<div class="slides-container">
						<?php while ( have_rows('projects_slider') ) : the_row(); ?>
						<div class="mySlide flex-when-active reverse-desktop">

							<div class="col s12 xl6 information-block right" style="display: flex;flex-direction:column;">
								<h2><?php the_sub_field("header") ?></h2>
								<h3><?php the_sub_field("subheader") ?></h3>
								<div class="text"><?php the_sub_field("text") ?></div>
								<div class="creator-btn-container">
									<a class="creator-btn" href="<?php the_sub_field("button_link") ?>" target="<?php the_sub_field("button_target") ?>"><?php the_sub_field("button_text") ?></a>
								</div>
							</div>
							<div class="col s12 xl6" style="display: flex;align-items: center;justify-content: center;flex-direction:column;">
								<img class="monitor-border" src="<?php the_sub_field("image") ?>" />			
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
						<?php while ( have_rows('projects_slider') ) : the_row(); ?>
						<span class="mydot"></span> 
						<?php endwhile;	?>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>	
	<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('enable_projects_2') ): ?>
	<?php if( have_rows('projects_slider_2') ): ?>    
	<div class="container" style="padding:3.25rem 0;">
		<div class="row">
			<div class="col s12">							
				<div class="my-slideshow">
					<div class="slides-container">
						<?php while ( have_rows('projects_slider_2') ) : the_row(); ?>
						<div class="mySlide flex-when-active">

							<div class="col s12 xl6 information-block left" style="display: flex;flex-direction:column;">
								<h2><?php the_sub_field("header") ?></h2>
								<h3><?php the_sub_field("subheader") ?></h3>
								<div class="text"><?php the_sub_field("text") ?></div>
								<div class="creator-btn-container">
									<a class="creator-btn" href="<?php the_sub_field("button_link") ?>" target="<?php the_sub_field("button_target") ?>"><?php the_sub_field("button_text") ?></a>
								</div>
							</div>
							<div class="col s12 xl6" style="display: flex;align-items: center;justify-content: center;flex-direction:column;">
								<img class="monitor-border" src="<?php the_sub_field("image") ?>" />			
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
						<?php while ( have_rows('projects_slider') ) : the_row(); ?>
						<span class="mydot"></span> 
						<?php endwhile;	?>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>	
	<?php endif; ?>
	<?php endif; ?>

	
	<?php if(!$isCreator): ?>
	<?php if( have_rows('gallery') ): ?>
	<section class="gallery-container">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="gallery">
						<div class="gallery-pane">
							<?php 
							$i = 0;
							while( have_rows('gallery') ) : the_row(); 
							$i++;
							?>						
							<a class="modal-opener" data-modal="modal-<?php echo $i; ?>">
								<?php if( get_sub_field('video_src') ){ ?>
								<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
								<?php } 
								$imgsrc = wp_get_attachment_image_src( get_sub_field('thumbnail_image'), 'full' ); ?>
								<img class="lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
							</a>							
						 	<?php endwhile; ?> 
						</div>
					</div> 
				</div>
			</div>
		</div>
		<div class="expand-gallery-button mobile-only" onclick="toggleGalleryExpand(this, event);">
			<i class="arrow up"></i>
		</div>
	</section>
	<?php endif; ?>
	<?php else: ?>
	<?php if( have_rows('gallery') ): ?>
		<style>
			.owl-item{background:black;}
		</style>
	<section class="creators-owl-container">
		<div class="owl-carousel">
		 	<?php 
			$i = 0;
			while( have_rows('gallery') ) : the_row(); 
			$i++;
			?>						
			<a class="modal-opener" data-modal="modal-<?php echo $i; ?>">
				<?php if( get_sub_field('video_src') ){ ?>
				<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
				<?php } 
				$imgsrc = wp_get_attachment_image_src( get_sub_field('thumbnail_image'), 'full' ); ?>
				<img style="height:230px;width:auto;margin:auto;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
			</a>							
		 	<?php endwhile; ?> 
		</div>
	</section>
	<?php endif; ?>
	<?php endif; ?>
	<?php if( have_rows('gallery') ): ?>
		<?php 
		$i = 0;
		while( have_rows('gallery') ) : the_row(); 
		$i++;
		?>
		<div id="modal-<?php echo $i ?>" class="modal" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)">
		    <div class="modal-content">
		    	<div class="modal-prev" onclick="iterateModals(-1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		    	<div class="modal-next" onclick="iterateModals(1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		        <div class="close" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)">
		            <span class="cursor">&times;</span>
		        </div>		        
		        <div class="resp-container <?php echo ( get_sub_field('video_src') ? "youtube" : "image" ) ?>">
		        	<?php if( get_sub_field('video_src') ){ ?>		
		        	<iframe class="resp-inner" src="<?php the_sub_field('video_src') ?>" width="<?php the_sub_field('video_width') ?>" height="<?php the_sub_field('videoyoutube_height') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen;" allowfullscreen></iframe>
		        	<?php } else { 
		        	$imgsrc = wp_get_attachment_image_src( get_sub_field('fullsize_image'), 'full' ); 
		        	/*$isVertical = false;
		        	$verticalStyle = "style='max-height: 80vh;width: auto;'";
		        	$horizontalStyle = "style='max-height: 80vh;width: auto;'";
		        	if( $imgsrc[1]/$imgsrc[2] <= 1 ){
		        		$isVertical = true;
		        	}*/
		        	?>
		        	<img <?php //if($isVertical){echo $verticalStyle;}else{echo $horizontalStyle;} ?> class="normal-inner lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
		        	<?php } ?>
		    	</div>		    	
		    </div>
		</div>

		<?php endwhile; ?>
	<?php endif; ?>

	


	<?php //$post_id = get_page_by_path( 'creators' ); ?>
	<?php //if( have_rows('about', $post_id)  ): ?>
    <?php //while( have_rows('about', $post_id) ): the_row(); ?>
	<!--<section class="grey-background">
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
	</section>-->
	<?php //endwhile; ?>
	<?php //endif;  ?>
	<?php //if( have_rows('collaborate', $post_id) ): ?>
    <?php //while( have_rows('collaborate', $post_id) ): the_row(); ?>
	<!--<section class="black-background">
		<div class="container">
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
	</section>-->
	<?php //endwhile; ?>
	<?php //endif; ?>
</section>
<script>
	function toggleGalleryExpand(obj, e){
		(function($, obj, e) {
			myArrow = $(obj).find(".arrow");
			if(myArrow.hasClass("down")){
				$(".gallery").prop("style","");
				myArrow.removeClass("down").addClass("up");
			}
			else if(myArrow.hasClass("up")){
				$(".gallery").css("max-height","30vh");
				myArrow.removeClass("up").addClass("down");
			}		
		})( jQuery, obj, e);
	}

    // Open the Modal
    function openModal(myElement) {
        jQuery("#"+myElement).css("display","block");
    }
    // Close the Modal
    function closeModal(isVideo, e) {
        (function($) {
        	if ( $(e.target).hasClass("close") || $(e.target).hasClass("modal") || $(e.target).hasClass("cursor") || e == "iterate" ){	           
        		$(".modal").css("display","none");
	            if(isVideo){  
	                $('.resp-inner').each(function(){
	                    this.src = this.src;
	                });       
	            }
            }
        })( jQuery );
    }
    function iterateModals(direction, dataModal, isVideo){
    	var myModal = $( ".modal-opener[data-modal='"+dataModal+"']" );
    	closeModal(isVideo, "iterate");
    	var myOwl = myModal.closest(".owl-item");    	
    	if(direction == 1){
    		if( myOwl.length ){
    			if( myOwl.next().length ){
    				openModal(myOwl.next().find(".modal-opener").data('modal'));	    			
    			} else {
    				openModal($(".owl-item").first().find(".modal-opener").data('modal'));
    			}
    		}
    		else{
    			if( myModal.next().length ){
    				openModal(myModal.next().data('modal'));    			
    			} else {
    				openModal($(".modal-opener").first().data('modal'));    			
    			}
    		}
    	} else if (direction == -1){
    		if( myOwl.length ){
    			if( myOwl.prev().length ){
    				openModal(myOwl.prev().find(".modal-opener").data('modal'));    			
    			} else {
					openModal($(".owl-item").last().find(".modal-opener").data('modal'));
    			}
    		}
    		else{
    			if( myModal.prev().length ){
    				openModal(myModal.prev().data('modal'));    			
    			} else {
    				openModal($(".modal-opener").last().data('modal'));    			
    			}
    		}
    	}
    }


    //onclick for video opener
    (function ($, document) {
        $(document).ready(function () {
            $(".modal-opener").click(function(){
            	var myModal = $(this).data('modal');
                if( myModal != undefined ){
                    openModal(myModal);
                }
                return false;
            });
            jQuery(".my-slideshow").slideshow({				

			});
			jQuery('.owl-carousel').owlCarousel({
			    margin:10,
			    nav:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        800:{
  						items:3
			        },
			        1120:{
			            items:4
			        },
			        1800:{
			        	items:5
			        }
			    }
			});			
			jQuery(".owl-prev span").text("");
			jQuery(".owl-next span").text("");
			$(document).on('contextmenu', 'img', function() {
			    return false;
			})

        });
        $( window ).ready(function() {
			lazyload();
		});
    }(jQuery, document));

</script>

<?php get_footer();  ?>