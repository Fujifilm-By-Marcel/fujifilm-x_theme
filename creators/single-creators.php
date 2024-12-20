<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', array(),'1.0.0');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.1.122');
	wp_enqueue_style('single-creators', get_stylesheet_directory_uri().'/en-us/creators/css/single-creators.css', array(),'1.0.41');
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css', array(),'1.0.6');
	wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');


	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.4',true); 
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.31',true); 
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




function printGearCarousel(){
	
	if( have_rows('gear') ):
		$creators_post = get_page_by_path( 'creators' );
		echo '<h2 style="text-align:center;">'.get_field("gear_header", $creators_post->ID).'</h2>';
	    echo '<h3 style="text-align:center;margin-bottom:3rem;">'.get_field("gear_subheader", $creators_post->ID).'</h3>';
	    //open carousel
	    echo '<div class="owl-carousel gear-carousel">';
	    while( have_rows('gear') ) : the_row();

	    	$post_id = get_sub_field('gear');

	    	//open carousel item
	    	echo '<div class="item">';
	        
	        
	        echo '<a href="'.get_field("button_href", $post_id).'" target="'.get_field("button_target", $post_id).'"><img src="'.get_field("image_url", $post_id).'" width="300" height="300" ></a>';
	        echo '<h3>'.get_field("subheader", $post_id).'</h3>';
	        echo '<h2 title="'.get_field("header", $post_id).'">'.get_field("header", $post_id).'</h2>';
	        //echo '<p class="subheader">'.get_field("subheader", $post_id).'</p>';
	        echo '<p class="subheader">'.get_field("text", $post_id).'</p>';

			echo '<div class="creator-btn-container">';
			echo '<a style="display:inline;" class="creator-btn" href="'.get_field("button_href", $post_id).'" target="'.get_field("button_target", $post_id).'">'.get_field("button_text", $post_id).'</a>';
			echo '</div>';
	        
	        //close carousel item
	        echo '</div>';


	    endwhile;
	    if ( is_user_logged_in() ) {
		    $ls = get_field("gear_last_slide", $creators_post->ID);		
	    
		    //open carousel item
	    	echo '<div class="item">';
	        
	        
	        echo '<a href="'.$ls['link'].'" ><img src="'.$ls['image'].'" width="300" height="300" ></a>';
	        echo '<h3>'.$ls['title'].'</h3>';
	        echo '<h2>'.$ls['heading'].'</h2>';
	        //echo '<p class="subheader">'.get_field("subheader", $post_id).'</p>';
	        echo '<p class="subheader">'.$ls['copy'].'</p>';

			echo '<div class="creator-btn-container">';
			echo '<a style="display:inline;" class="creator-btn" href="'.$ls['link'].'" >'.$ls['cta'].'</a>';
			echo '</div>';
	        
	        //close carousel item
	        echo '</div>';
	    }
	    //close carousel
	    echo '</div>';


    endif;
	
}



function printExposureCenterArticles($posts){
	$creators_post = get_page_by_path( 'creators' );
	//if ( is_user_logged_in() ) { 	
    if( $posts ):

	    //open container
		echo '<div class="ec-carousel-container">';
		//open carousel
		echo '<div class="owl-carousel ec-carousel">';
		foreach( $posts as $post ):
			

		    //echo "<pre>";
		    //print_r($post);
			//echo "</pre>";
			//echo "<br>";

			//open background div
			echo '<div class="ec-carousel-bg" style="background:url('.get_the_post_thumbnail_url($post->ID, 'large').') center/cover no-repeat #000;width: 15.625rem;height: 12.5rem;">';
			
			//link			
			echo '<a href="'.get_permalink($post->ID).'" target="_blank">';

			//open inner div
			echo '<div class="ec-carousel-inner">';

			echo '<div class="article-label"><span>Articles</span></div>';
			echo '<h3>'.$post->post_title.'</h3>';
			echo '<p>'.$post->post_excerpt.'</p>';
			echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">READ ARTICLE</span><i class="fas fa-caret-right"></i></div></div>';

			//close inner div
			echo '</div>';

			//close link
			echo '</a>';	
			
			//close background div
			echo '</div>';			
	    
			
		endforeach;


		$ls = get_field("articles_last_slide", $creators_post->ID);		
		
		//open background div
		echo '<div class="ec-carousel-bg" style="background:url('.$ls['image'].') center/cover no-repeat #000;width: 15.625rem;height: 12.5rem;">';
		
		//link
		echo '<a href="'.$ls['link'].'" target="_self">';

		//open inner div
		echo '<div class="ec-carousel-inner">';

		echo '<h3>'.$ls['header'].'</h3>';
		echo '<p>'.$ls['text'].'</p>';
		echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">'.$ls['cta'].'</span><i class="fas fa-caret-right"></i></div></div>';

		//close inner div
		echo '</div>';
		
		//close link
		echo '</a>';

		//close background div
		echo '</div>';					

		//close carousel
		echo '</div>';
		//close container
	    echo '</div>';
	    //wp_reset_postdata();
	endif;
	
	//}
}

?>

<section class="main creators-single"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	$bioID =false;
	if(get_field('bio')){
		$bioID = get_field('bio');
	}
	?>

	<div class="container"> 
		<div class="row">
			<div class="col s12 back-to-archive">
				<a href="<?php echo get_post_type_archive_link( 'creators' ); ?>"><span class="arrow-left"></span><span class="back-text">BACK TO CREATOR GALLERY</span></a>
			</div>
		</div>
	</div>

	<div class="container single-bio" style="margin:0 auto 3rem;">
		<div class="row">
			<div class="col s12 m4 l4 xl3">
				<div class="portrait-badge-section">
					<div class="row">
						<div class="col s12">
							<?php 
							if( get_field("image_x2", $bioID) && get_field("image_x3", $bioID) ){
								$srcset = "srcset='";
								$srcset .= get_field("image_x1", $bioID)." 1x, ";
								$srcset .= get_field("image_x2", $bioID)." 2x, ";
								$srcset .= get_field("image_x3", $bioID)." 3x, ";
								$srcset .= "'";
							} else {
								$srcset = "";
							}
							?>
							<img width="160" height="160" src="<?php the_field("image_x1", $bioID); ?>" <?php echo $srcset; ?> >
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<p class="website"><a href="<?php the_field("website", $bioID) ?>" target="_blank"><?php the_field("website_text"); ?></a></p>
						</div>
					</div>
					<div class="row">
						<div class="col <?php echo $badgecolClass ?>"> 
							<div class="large-badge">
								<img src="<?php echo $imgDirectory ?>creator-badge.png" srcset="<?php echo $imgDirectory ?>creator-badge.png 1x, <?php echo $imgDirectory ?>creator-badge@2x.png 2x, <?php echo $imgDirectory ?>creator-badge@3x.png 3x">
								<p><span class="text-overflow-center">Creator Since</span><br><?php the_field('creator_dates', $bioID) ?></p>
							</div>
						</div>
						<div class="col <?php echo $badgecolClass ?>" <?php echo $badgecolHide; ?> >
							<div class="large-badge">
								<img src="<?php echo $imgDirectory ?>x-photographer-badge.png" srcset="<?php echo $imgDirectory ?>x-photographer-badge.png 1x, <?php echo $imgDirectory ?>x-photographer-badge@2x.png 2x, <?php echo $imgDirectory ?>x-photographer-badge@3x.png 3x">
								<p><span class="text-overflow-center">X&#8209;Photographer</span><br><?php the_field('x_photographer_dates', $bioID) ?></p>
							</div>
						</div>
					</div>				
				</div>
				<?php if( have_rows('social', $bioID) ): ?>
   				<?php while( have_rows('social', $bioID) ): the_row(); ?>
				<div class="social-icons lowres-only">
					<?php if(get_sub_field('youtube', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('youtube', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/youtube-icon.svg"></span></a><?php } ?>
					<?php if(get_sub_field('instagram', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('instagram', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/instagram-icon-black.svg"></span></a><?php } ?>
					<?php if(get_sub_field('twitter', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('twitter', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/twitter-icon.svg?v=2"></span></a><?php } ?>
					<?php if(get_sub_field('facebook', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('facebook', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/facebook-icon-black.svg"></span></a><?php } ?>
					<?php if(get_sub_field('vimeo', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('vimeo', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/vimeo-logo.svg"></span></a><?php } ?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col s12 m8 l8 xl9">	
				<div class="relative-container">				
					<?php if( have_rows('social', $bioID) ): ?>
	   				<?php while( have_rows('social', $bioID) ): the_row(); ?>
					<div class="social-icons highres-only">
						<?php if(get_sub_field('youtube', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('youtube', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/youtube-icon.svg"></span></a><?php } ?>
						<?php if(get_sub_field('instagram', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('instagram', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/instagram-icon-black.svg"></span></a><?php } ?>
						<?php if(get_sub_field('twitter', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('twitter', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/twitter-icon.svg?v=2"></span></a><?php } ?>
						<?php if(get_sub_field('facebook', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('facebook', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/facebook-icon-black.svg"></span></a><?php } ?>
						<?php if(get_sub_field('vimeo', $bioID)){ ?><a target="_blank" href="<?php the_sub_field('vimeo', $bioID) ?>"><span><img src="<?php echo $imgDirectory ?>svg/vimeo-logo.svg"></span></a><?php } ?>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>		
					<h3><?php echo $term_name ?></h3>
					<p class="creator-name"><?php the_title(); ?></p>
					<h3>ABOUT <?php the_field("first_name", $bioID); ?></h3>		
				</div>
				<div class="creator-desc">
					<?php the_field("biography", $bioID); ?>
				</div>
				<?php 
				if(get_field("button_text")){
					$button_text = get_field("button_text");								
				} else {
					$button_text = "visit website";
				}
				?>
				<div class="creator-btn-container">
					<a class="creator-btn" href="<?php the_field("website", $bioID ) ?>" target="_blank"><?php echo $button_text; ?></a>
				</div>
			</div>
		</div>
	</div> 

	<style>
		.add-monitor{position:relative;}
		.add-monitor .overlayed-image{position: absolute;left: 50%;top: 36%;transform: translate(-50%,-50%);width: 94.8%;}
	</style>

	<?php 
	for ($i=1;$i<=4;$i++){
		if ($i == 1){
			$field_extension = "";
		} else {
			$field_extension = "_".$i;
		}
		if ($i % 2 == 1) {
			$myslide_class = "reverse-desktop";
			$informationblock_class = "right";
		} else{
			$myslide_class = "";
			$informationblock_class = "left";
		}
	?>
	<?php if( get_field('enable_projects'.$field_extension) ): ?>    
	<?php if( have_rows('projects_slider'.$field_extension) ): ?>    
	<div class="container full-width-mobile" style="padding:0 0 3rem;">
		<div class="row">
			<div class="col s12">							
				<div class="my-slideshow">
					<div class="slides-container">
						<?php while ( have_rows('projects_slider'.$field_extension) ) : the_row(); ?>
						<div class="mySlide flex-when-active <?php echo $myslide_class; ?>">

							<div class="col s12 xl6 information-block right" style="display: flex;flex-direction:column;">
								<h2><?php the_sub_field("header") ?></h2>
								<h3><?php the_sub_field("subheader") ?></h3>
								<div class="text"><?php the_sub_field("text") ?></div>
								<div class="creator-btn-container">
									<a class="creator-btn" href="<?php the_sub_field("button_link") ?>" target="<?php the_sub_field("button_target") ?>"><?php the_sub_field("button_text") ?></a>
								</div>
							</div>
							<div class="col s12 xl6" style="display: flex;align-items: center;justify-content: center;flex-direction:column;">
								<div <?php if( get_sub_field("enable_monitor") ){ ?>class="add-monitor"<?php } ?>>
									<?php if( get_sub_field("enable_monitor") ){ ?><img src="http://fujifilm-x.com/en-us/wp-content/themes/fujifilm-x_jp/en-us/creators/img/computer-mockup.png?v=2" /><?php } ?>
									<?php if( get_sub_field("video") == "" ){ ?>
									<img <?php if( get_sub_field("enable_monitor") ){ ?>class="overlayed-image"<?php } ?> src="<?php the_sub_field("image") ?>" />
									<?php } else { ?>
										<div class="resp-container youtube overlayed-image">
											<?php the_sub_field("video") ?>
										</div>
									<?php } ?>
								</div>
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
	<?php 
	}
	?>

	

	
	
	
	
	
	<?php if(!$isCreator): ?>
	<?php if( have_rows('gallery') ): ?>
	<section class="gallery-container" style="margin: 0 0 3rem;">
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
								<div class="loader"></div>
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
	<section  class="contain-carousel-section" style="background-color: #e9e9e9;" >
		<div class="inner">
			<div class="row">
				<div class="col s12">
					<div class="creators-owl-container">
						<div class="owl-carousel main-carousel">
						 	<?php 
							$i = 0;
							while( have_rows('gallery') ) : the_row(); 
							$i++;
							?>						
							<a class="modal-opener" data-modal="modal-<?php echo $i; ?>">
								<div class="modal-opener-inner">
									<div class="loader"></div>
									<?php if( get_sub_field('video_src') ){ ?>
									<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
									<?php } 
									$imgsrc = wp_get_attachment_image_src( get_sub_field('thumbnail_image'), 'full' ); ?>
									<img class="lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
								</div>
							</a>							
						 	<?php endwhile; ?> 
						</div>
					</div>
				</div>
			</div>
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
		    	<div class="loader"></div>
		    	<div class="controls modal-prev" onclick="iterateModals(-1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		    	<div class="controls modal-next" onclick="iterateModals(1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		        <div class="controls close" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)">
		            <span class="cursor">&times;</span>
		        </div>		        
		        <div class="resp-container <?php echo ( get_sub_field('video_src') ? "youtube" : "image" ) ?>">
		        	<?php if( get_sub_field('video_src') ){ ?>		
		        	<iframe class="resp-inner" src="<?php the_sub_field('video_src') ?>" width="<?php the_sub_field('video_width') ?>" height="<?php the_sub_field('videoyoutube_height') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen;" allowfullscreen></iframe>
		        	<?php } else { 
		        	$imgsrc = wp_get_attachment_image_src( get_sub_field('fullsize_image'), 'full' ); 
		        	?>
		        	<img class="normal-inner lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
		        	<?php } ?>
		    	</div>		    	
		    </div>
		</div>

		<?php endwhile; ?>
	<?php endif; ?>
	<?php if(get_field('enable_gear_v2')){ ?>
	<div class="contain-carousel-section">
		<div class="inner">
			<div class="row">
				<div class="col s12">
					<div class="gear-carousel-container">
						<?php printGearCarousel(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php 
	$bioID =false;
	if(get_field('bio')){
		$bioID = get_field('bio');
	}
	
 	$posts = get_posts(array(
		'numberposts'	=> -1,
		'post_type'		=> 'exposure_center',
		'meta_key'		=> 'featured_biography',
		'meta_value'	=> $bioID,
	));
	if($posts): 
	?>
	<div class="contain-carousel-section">
		<div class="inner">
			<div class="row">
				<div class="col s12 m12 l3" style="margin-bottom:20px">
					<h2>Articles</h2>
					<h3>Featuring <?php the_field("first_name", $bioID); ?></h3>
					<p>Take some time to read some of the articles featuring <?php the_field("first_name", $bioID); ?> or explore some of our free educational content on Exposure Center.</p>
				</div>
				<div class="col s12 m12 l9">
					<?php printExposureCenterArticles($posts); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>


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

            $(".resp-container iframe").attr("allow","accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen;");
            $(".resp-container iframe").attr("allowfullscreen","");
            $(".resp-container iframe").attr("frameborder","0");

            jQuery(".my-slideshow").slideshow({				

			});
			jQuery('.owl-carousel.main-carousel, .owl-carousel.gear-carousel').owlCarousel({
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
			jQuery('.owl-carousel.ec-carousel').owlCarousel({
			    margin:10,
			    nav:true,
			    navText : ["<i class='fas fa-caret-left'></i>","<i class='fas fa-caret-right'></i>"],
			    responsive:{
			        0:{
			            items:1
			        },
			        720:{
  						items:2
			        },			        
			        1260:{
			        	items:3
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
			var images = document.querySelectorAll(".lazyload");
			lazyload(images, {
				after: function(image){
					var parent = $(image).closest('.modal-content');
					if(!parent.length){
						parent = $(image).closest('.modal-opener');			
					}
					parent.find('.loader').show();
				}
			});

			$(images).each(function(i, image){
				var modalContent = $(image).closest('.modal-content');
				var modalLoader = $(image).closest('.modal-opener');	
				if(modalContent.length){
					$(image).load(function() {
						modalContent.find('.loader').hide();
						modalContent.find('.controls').show();				
					});
				}
				else if(modalLoader.length){
					$(image).load(function() {
						modalLoader.find('.loader').hide();
					});
				}
				
			});


		});
    }(jQuery, document));

</script>

<?php get_footer();  ?>