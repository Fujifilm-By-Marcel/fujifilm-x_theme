<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', array(),'1.0.0');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.0.19'); 
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/css/jquery-slideshow.css', array(),'1.0.4');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/js/jquery-slideshow.js', array(), '1.0.0',true); 
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/js/lazyload.js', array(), '1.22',true); 
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
if( $term_name == "X‑Photographer" ){
	$badgecolClass = "s6";
	$badgecolHide = "";
} else {
	$badgecolClass = "s12";
	$badgecolHide = 'style="display:none;"';
}
?>
<style>

</style>
<section class="main"> 
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
							<a href="#" class="modal-opener" data-modal="modal-<?php echo $i; ?>">
								<?php if( get_sub_field('youtube_id') ){ ?>
								<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
								<?php } 
								$imgsrc = wp_get_attachment_image_src( get_sub_field('thumbnail_image'), full ); ?>
								<img class="lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
							</a>							
						 	<?php endwhile; ?> 
						</div>
					</div> 
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if( have_rows('gallery') ): ?>
		<?php 
		$i = 0;
		while( have_rows('gallery') ) : the_row(); 
		$i++;
		?>
		<div id="modal-<?php echo $i ?>" class="modal">
		    <div class="modal-content">
		        <div class="close" onclick="closeModal(<?php echo ( get_sub_field('youtube_id') ? "true" : "false" ) ?>)">
		            <span class="cursor">&times;</span>
		        </div>		        
		        <div class="resp-container <?php echo ( get_sub_field('youtube_id') ? "youtube" : "image" ) ?>">
		        	<?php if( get_sub_field('youtube_id') ){ ?>		
		        	<iframe class="resp-inner" src="https://www.youtube.com/embed/<?php the_sub_field('youtube_id') ?>" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		        	<?php } else { 
		        	$imgsrc = wp_get_attachment_image_src( get_sub_field('fullsize_image'), large ); ?>
		        	<img class="normal-inner lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
		        	<?php } ?>
		    	</div>		    	
		    </div>
		</div>

		<?php endwhile; ?>
	<?php endif; ?>

	
	<?php if( have_rows('projects') ): ?>
    <?php while( have_rows('projects') ): the_row(); ?>
    <?php if( get_sub_field('header') ): ?>
	<div class="container">
		<div class="row flex-row">
			<div class="col s12 m6 flex-col">					
				<?php if( have_rows('projects_slider') ): ?>
				<div class="my-slideshow">
					<div class="slides-container">
						<?php while ( have_rows('projects_slider') ) : the_row(); ?>
						<div class="mySlide">
							<img src="<?php the_sub_field("image") ?>" />									
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
				<?php endif; ?>
			</div>
			<div class="col s12 m6 flex-col information-block right">
				<h2><?php the_sub_field("header") ?></h2>
				<h3><?php the_sub_field("subheader") ?></h3>
				<div class="text"><?php the_sub_field("text") ?></div>
				<div class="creator-btn-container">
					<a class="creator-btn" href="<?php the_sub_field("button_link") ?>" target="_blank"><?php the_sub_field("button_text") ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('gear') ): ?>
    <?php while( have_rows('gear') ): the_row(); ?>
    <?php if( get_sub_field('header') ): ?>
	<div class="container">
		<div class="row flex-row">
			<div class="col s12 m6 flex-col information-block left">
				<h2><?php the_sub_field("header") ?></h2>
				<h3><?php the_sub_field("subheader") ?></h3>
				<div class="text"><?php the_sub_field("text") ?></div>
				<div class="creator-btn-container">
					<a class="creator-btn" href="<?php the_sub_field("button_link") ?>" target="_blank"><?php the_sub_field("button_text") ?></a>
				</div>
			</div>
			<div class="col s12 m6 flex-col">					
				<?php if( have_rows('projects_slider') ): ?>
				<div class="my-slideshow">
					<div class="slides-container">
						<?php while ( have_rows('projects_slider') ) : the_row(); ?>
						<div class="mySlide">
							<img src="<?php the_sub_field("image") ?>" />									
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
				<?php endif; ?>
			</div>			
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php $post_id = get_page_by_path( 'creators' ); ?>
	<?php if( have_rows('about', $post_id)  ): ?>
    <?php while( have_rows('about', $post_id) ): the_row(); ?>
	<section class="grey-background">
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
	</section>
	<?php endwhile; ?>
	<?php endif;  ?>
	<?php if( have_rows('collaborate', $post_id) ): ?>
    <?php while( have_rows('collaborate', $post_id) ): the_row(); ?>
	<section class="black-background">
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
		<?php endwhile; ?>
		<?php endif; ?>
	</section>
</section>
<script>
    // Open the Modal
    function openModal(myElement) {
        jQuery("#"+myElement).css("display","block");
    }
    // Close the Modal
    function closeModal(isVideo) {
        (function($) {
            $(".modal").css("display","none");
            if(isVideo){  
                $('.resp-inner').each(function(){
                    this.src = this.src;
                });       
            }
        })( jQuery );
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

        });
        $( window ).ready(function() {
			lazyload();
		});
    }(jQuery, document));

</script>

<?php get_footer();  ?>