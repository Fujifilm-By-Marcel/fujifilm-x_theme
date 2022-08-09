<?php
/*
Template Name: Page-fujifilm-flickr
*/
function page_usa_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	wp_enqueue_style('fps-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/fujifilm-flickr.css',array(),'1.0.56');

	if( get_field('article_tags') ){
		wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
		wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');
	}
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
	if( get_field('article_tags') ){
		wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 
	}
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

 function my_button($href, $target, $text){ 	
 	if( $href != "" && $target != "" && $text != "" ){
	 	echo '<a href="'.$href.'" target="'.$target.'">';
	 	echo '<div class="button"><span class="text">'.$text.'</span></div>';
	 	echo '</a>'; 	
 	}
 }

 function printExposureCenterArticles(){
	
	$term = get_field('article_tags');
	if( $term ):
	 	$posts = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'exposure_center',
			'tax_query' => array(
		      array(
		        'taxonomy' => 'ec_tags',
		        'field' => 'term_id',
		        'terms'    => $term,	        
		      )
		   )		
		)); 	
		
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
				echo '<div class="ec-carousel-bg" style="background:url('.get_the_post_thumbnail_url($post->ID, 'large').') center/cover no-repeat #000;/*width: 20.875rem;height: 14.875rem;*/">';
				
				//link			
				echo '<a href="'.get_permalink($post->ID).'" target="_blank">';

				//open inner div
				echo '<div class="ec-carousel-inner">';
				echo '<div class="content">';
				echo '<div class="article-label"><span>Articles</span></div>';
				echo '<h3>'.$post->post_title.'</h3>';
				echo '<p>'.$post->post_excerpt.'</p>';
				echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">READ MORE</span><i class="fas fa-caret-right"></i></div></div>';
				echo '</div>';
				echo '<div class="ec-overlay"></div>';
				//close inner div
				echo '</div>';

				//close link
				echo '</a>';	
				
				//close background div
				echo '</div>';			
		    
				
			endforeach;


			//$ls = get_field("articles_last_slide");		
			
			//open background div
			//echo '<div class="ec-carousel-bg" style="background:url('.$ls['image'].') center/cover no-repeat #000;width: 15.625rem;height: 12.5rem;">';
			
			//link
			//echo '<a href="'.$ls['link'].'" target="_self">';

			//open inner div
			//echo '<div class="ec-carousel-inner">';

			//echo '<h3>'.$ls['header'].'</h3>';
			//echo '<p>'.$ls['text'].'</p>';
			//echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">'.$ls['cta'].'</span><i class="fas fa-caret-right"></i></div></div>';

			//close inner div
			//echo '</div>';
			
			//close link
			//echo '</a>';

			//close background div
			//echo '</div>';					

			//close carousel
			echo '</div>';
			//close container
		    echo '</div>';
		    //wp_reset_postdata();
		endif;
		
		//}

	endif;
}
?>
<?php if( get_field('article_tags') ){ ?>
<style>
/* Owl Carousel */
:root{
	--grey-color: #e9e9e9;
	--grey-color-dark: #c4c4c4;		
	--red-color: #e4032f;
	--green-color: #409d27;		
	--accent-font: "Fjalla One", sans-serif;
}
.exposure-center{
	margin: 2em;
}
section.main .exposure-center p{
	font-size: .875rem;
}
.ec-carousel-container{
	padding: 0 3em;
}
.ec-carousel .owl-stage{
	display:block;
}
.ec-carousel .owl-item{
	text-align:center;
	background:none;
	flex-grow: 1;
	display: inline-block;
	vertical-align: middle;
	float:none;
}
.ec-carousel a{
	display:block;
	overflow:hidden;
	text-decoration: none;
}
.ec-carousel .ec-carousel-bg{		
	color: white;
	overflow: hidden;
	/*height: 0;*/
	position:relative;
	margin:auto;
}
.ec-carousel .ec-carousel-inner{
	text-align:left;
	padding: 1.25em 1.875em;
	display: flex;
	flex-direction: column;
}
.ec-carousel .content{
	z-index: 2;
	display: flex;
	flex-direction: column;
	height: 15em;
}
.ec-carousel .ec-overlay{
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	background:rgba(0,0,0,.3);	
	z-index: 1;
}
.ec-carousel .owl-item:hover .ec-overlay{
	background:rgba(0,0,0,.2);
}
.ec-carousel .article-label span{
	line-height:normal;
	border-bottom:1px solid #eb022f;
	font-family: 'Fjalla One', sans-serif;
	text-transform: uppercase;
}
.ec-carousel h3{
	line-height:normal;
	color:white;
	font-size:1.25rem;
	font-family: 'Fjalla One', sans-serif;
	margin-bottom: .25em;
	margin-top:auto;
	text-overflow: ellipsis;
   overflow: hidden;
   white-space: nowrap;
}
section.main .ec-carousel p{
	font-size: 1em;
	margin-bottom: .5em;
	overflow: hidden;
	-webkit-line-clamp: 3;
	display: -webkit-box;
	-webkit-box-orient: vertical;
}
.ec-carousel .ec-cta-inner{
	float:right;
   display: flex;
   align-items: center;
   display:inline-block;
}
.ec-carousel .cta-label{
	line-height:normal;
	font-family: 'Fjalla One', sans-serif;font-size:.625rem;
	border-bottom:1px solid #eb022f;
	margin-right:.425rem;
}
.ec-carousel i{
	vertical-align: middle;
	color: var(--red-color);
}
.ec-carousel .owl-dots{
	display: none;
}

.owl-prev {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    left: -2em;
    display: block !important;
}

.owl-next {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    right: -2em;
    display: block !important;
}
.owl-next.disabled, .owl-prev.disabled{
	display: none !important;
}
.owl-prev i, .owl-next i {
	font-size:28px;
}
@media (max-width:600px){
	.ec-carousel-container{
		margin-top: 2em;
	}
}
</style>
<?php } ?>
<section class="main">	
	
	<?php 
	if( have_rows('header-section') ):
	while( have_rows('header-section') ): the_row(); 
		$logo = wp_get_attachment_image_src( get_sub_field("logo"), 'full' );
		?>
		<style>			
			section.main section.background-header{
				background:url('<?php the_sub_field("background_image"); ?>');
				background-position: center;
				background-size:cover;
				<?php
					if( get_sub_field("section_style") ){
						the_sub_field("section_style");
					} 
				?>
			}
			<?php if ( get_sub_field("mobile_background_image") ){ ?>
			@media(max-width:600px){
				section.main section.background-header{
					background:url('<?php the_sub_field("mobile_background_image"); ?>');
					background-position: center;
					background-size:cover;
					<?php
						if( get_sub_field("mobile-only_section_style") ){
							the_sub_field("mobile-only_section_style");
						} 
					?>
				}
			}
			<?php } ?>
		</style>
		<section class="background-header" style="display:flex;position:relative;padding:50px 0;color:white;text-align:center;align-items: center;<?php the_sub_field('section_inline_styles'); ?>">		
			
			<!--body-->
			<div class="container">
				<div class="row">
					<div class="col s12" >

						<p><img style="display:inline;" src="<?php echo $logo[0]; ?>" width="<?php echo $logo[1]; ?>" height="<?php echo $logo[2]; ?>"></p>
						<h1><?php the_sub_field("header"); ?></h1>
						<p><span class="subheader"><?php the_sub_field("subheader"); ?></span></p>
						
						<!--button-->
						<?php 			
						$button = get_sub_field('button');
						my_button( strval ( $button["href"] ), strval ( $button["target"] ), strval ( $button["text"] ) );					
						?>	
					</div>
				</div>
			</div>

			<!--photocredit-->
			<span class="photo-credit"><?php the_sub_field("photocredit"); ?></span>

		</section>

		<?php 
	endwhile;
	endif; 
	$i=0; 
	if( have_rows('section') ):
    while( have_rows('section') ): the_row(); 
	    $i++; //starts at 1
	    ?>
	    <style>
	    	@media(min-width:601px){
				section.main section.background-<?php echo $i; ?>{
					background:url('<?php the_sub_field("background_image"); ?>');
					background-position: center;
					background-size:cover;			
					<?php
					if( get_sub_field("desktop-only_section_style") ){
						the_sub_field("desktop-only_section_style");
					} 
					?>
				}
			}
			@media(max-width:600px){
				section.main section.background-<?php echo $i; ?>{
					background:url('<?php the_sub_field("mobile_background_image"); ?>');
					background-size:cover;
					background-repeat:no-repeat;
					<?php if( get_sub_field("mobile_background_position") ) { ?>
						background-position: <?php the_sub_field("mobile_background_position"); ?>;												
					<?php }
					if( get_sub_field("mobile_background_color") ){ ?>
						background-color:<?php the_sub_field("mobile_background_color"); ?>;					
					<?php }
					if( get_sub_field("mobile-only_section_style") ){
						the_sub_field("mobile-only_section_style");
					} ?>
				}
			}
		</style>
		<section id="<?php the_sub_field("section_id") ?>" class="background-<?php echo $i; ?>" style="display:flex;position:relative;padding:50px 0;align-items:center;<?php the_sub_field('section_inline_style'); ?>">

			<!--video iframe-->
			<?php if(get_sub_field("video_embed")){ ?>
				<div class="myvideo"><?php the_sub_field("video_embed"); ?></div>
			<?php } else { ?>
			
			<!--body-->
			<div class="container"  >
				<div class="row">
					<div class="col <?php the_sub_field("row_class"); ?>" >
						<h2><?php the_sub_field("header"); ?></h2>
						<p><?php the_sub_field("text"); ?></p>

						<!--form iframe-->
						<?php if(get_sub_field("form_embed")){ ?>
							<div id="myform"><?php the_sub_field("form_embed"); ?></div>
						<?php } ?>
					</div>

					<!--image desktop-->					
					<?php 
					$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' ); 
					if($imgsrc){
					?>
					<div class="desktop-only col s12" >						
						<img src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
					</div>					
					<?php } ?>

					<!--image mobile-->					
					<?php 
					$imgsrc = wp_get_attachment_image_src( get_sub_field('mobile_image'), 'full' ); 
					if($imgsrc){
					?>
					<div class="mobile-only col s12" >						
						<img src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
					</div>					
					<?php } ?>

					<!--bottom right image (mobile)-->
					<?php 
					$imgsrc = wp_get_attachment_image_src( get_sub_field('bottom_right_image'), 'full' ); 
					if($imgsrc){
					?>
					<div class="col s12 mobile-only" >						
						<p style="text-align:right;"><img style="display:inline;width:200px;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" ></p>
					</div>					
					<?php } ?>

				</div>

				
				<!--Repeater-->
				<?php 
				$repeaterrowclass = get_sub_field("repeater_row_class");
				$repeaterclass = get_sub_field("repeater_class");		
				$repeatersectionclass = get_sub_field('repeater_section_class');			
				if( have_rows('repeater') ):
				?>				
				<div class="row <?php echo $repeatersectionclass ?>">
					<div class="col <?php echo $repeaterrowclass; ?>" >						
						<div class="row" style="display: flex;flex-wrap: wrap;margin-bottom: 0;">
						<?php 
						
						while( have_rows('repeater') ): the_row(); 
							$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' );
							?>						
							<div class="col <?php echo $repeaterclass; ?>" >
								<div class="repeater">
									<?php if(get_sub_field('image')){ ?>
									<p><img style="display:inline;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" ></p>
									<?php } ?>
									<h3><?php the_sub_field("header"); ?></h3>
									<p><?php the_sub_field("text"); ?></p>
								</div>
							</div>
							<?php
						endwhile;						
						?>
						</div>
					</div>
				</div>
				<?php endif; ?>				
				
				<!--button-->
				<?php 			
				$button = get_sub_field('button');
				if( $button["href"] != "" && $button["href"] ){
				?>				
				<div class="row">
					<div class="col s12" >						
						<?php my_button( strval ( $button["href"] ), strval ( $button["target"] ), strval ( $button["text"] ) ); ?>
					</div>
				</div>
				<?php } ?>				

			</div>

			<?php } ?>

			<!--photocredit-->
			<span class="photo-credit"><?php the_sub_field("photocredit"); ?></span>

			<!--bottom right image desktop-->
			<?php 
			$imgsrc = wp_get_attachment_image_src( get_sub_field('bottom_right_image'), 'full' );
			if($imgsrc){
			?>
			<img class="bottom-right-image desktop-only" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
			<?php } ?>

		</section>
		
		<?php
	endwhile;
	endif; 
	?>

	<?php if( get_field('article_tags') ){ ?>
	<section class="exposure-center" style="min-height: unset;">
		
		<div class="row">
			<div class="col s12">
				<h4 style="text-align:center;"><?php the_field('ec_header') ?></h4>	
			</div>				
		</div>
		<div class="row">
			<div class="col s12 l4">
				<div class="content">
					<?php the_field('ec_content'); ?>
				</div>
			</div>
			<div class="col s12 l8">					
				<div>
					<?php printExposureCenterArticles($posts); ?>
				</div>
			</div>
		</div>
	
	</section>
	<?php } ?>

</section>
<script>
	var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
	var eventer = window[eventMethod];
	var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

	// Listen to message from child window
	eventer(messageEvent,function(e) {
	    var key = e.message ? "message" : "data";
	    var data = e[key];
	    console.log(data);
	    jQuery("#myform").height(data);
	},false);
</script>

<?php if( get_field('article_tags') ){ ?>
<script>
jQuery(function($) {
	jQuery(".owl-carousel.ec-carousel").owlCarousel({
	   margin:10,
	   nav:true,
	   navText : ["<i class='fas fa-caret-left'></i>","<i class='fas fa-caret-right'></i>"],
	   autoplay : true,
	   autoplayHoverPause : true,
	   responsive:{
	        0:{
	        	items:1
	        },
	        600:{
	        	items:2
	        },
	        1600:{
	        	items:3
	        },
	    }
	});

});
</script>
<?php } ?>


<?php get_footer(); ?>