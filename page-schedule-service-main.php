<?php
/*
Template Name: Page-schedule-service-main
*/
function page_usa_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	wp_enqueue_style('fps-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/fujifilm-flickr.css',array(),'1.0.47');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
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
 ?>
 <style>
 	section.main section{
 		min-height:unset;
 	}
section.main h2 {
  font-size: 2.8rem;
}
section.main p{
	font-size:1.125rem;
}
section.main p a{
	text-decoration:underline;
}
section.main span.subheader, 
section.main div.subheader {
  font-size: 1.125rem;
  line-height: normal;
  max-width: 600px;
  margin: auto;
}
section.main h1{
	font-size:2.8rem;
}
section.main .repeater h3{
  font-size: 1.5rem;
  font-family: "Fjalla One", sans-serif;
  font-weight:normal;
}
section.main .repeater p {
  font-size: 1rem;
  
}
section.main a .button {
  padding: .8rem 2rem;
}
section.main a .button span.text {
  font-size: 1rem;  
}
section.main .button-notes p{
	font-size:.8rem;
}

 </style>
<section class="main">	
	
	<?php 
	if( have_rows('header-section') ):
	while( have_rows('header-section') ): the_row(); 
		$logo = wp_get_attachment_image_src( get_sub_field("logo"), 'full' );
		?>
		<style>			
			@media(min-width:992px){
				section.main section.background-header{
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
			@media(min-width:601px) and (max-width:991px){
				section.main section.background-header{
					background:url('<?php the_sub_field("tablet_background_image"); ?>');
					background-position: center;
					background-size:cover;
					<?php 
					if( get_sub_field("tablet-only_section_style") ){
						the_sub_field("tablet-only_section_style");
					} 
					?>
				}
			}
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
		</style>
		<section class="background-header" style="display:flex;position:relative;padding:50px 0;color:white;text-align:center;<?php the_sub_field('section_inline_style'); ?>">		
			
			<!--body-->
			<div class="container" style="align-self:center;">
				<div class="row">
					<div class="col s12" >

						<?php if( $logo ){ ?>
						<p><img style="display:inline;" src="<?php echo $logo[0]; ?>" width="<?php echo $logo[1]; ?>" height="<?php echo $logo[2]; ?>"></p>
						<?php } ?>

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
	    	@media(min-width:992px){
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
	    	@media(min-width:601px) and (max-width:991px) {
				section.main section.background-<?php echo $i; ?>{
					background:url('<?php the_sub_field("tablet_background_image"); ?>');
					background-position: center;
					background-size:cover;			
					<?php
					if( get_sub_field("tablet-only_section_style") ){
						the_sub_field("tablet-only_section_style");
					} 
					?>
				}
			}
			@media(max-width:600px){
				section.main section.background-<?php echo $i; ?>{
					background:url('<?php the_sub_field("mobile_background_image"); ?>');
					background-position: center;
					background-size:cover;		
					<?php
					if( get_sub_field("mobile-only_section_style") ){
						the_sub_field("mobile-only_section_style");
					} ?>
				}
			}
		</style>
		<section id="<?php the_sub_field("section_id") ?>" class="background-<?php echo $i; ?>" style="display:flex;position:relative;padding:100px 0;<?php the_sub_field('section_inline_style'); ?>">
			
			<!--body-->
			<div class="container"  style="align-self:center;">
				<div class="row">
					<div class="col <?php the_sub_field("row_class"); ?>" >
						<h2><?php the_sub_field("header"); ?></h2>
						<div class="subheader"><?php the_sub_field("text"); ?></div>

						<!--iframe-->
						<?php if(get_sub_field("form_embed")){ ?>
							<div id="myform"><?php the_sub_field("form_embed"); ?></div>
						<?php } ?>
					</div>

					<!--bottom right image desktop-->					
					<?php 
					$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' ); 
					if($imgsrc){
					?>
					<div class="col s12" >						
						<img src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">
					</div>					
					<?php } ?>

					<!--bottom right image mobile-->
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
				if( have_rows('repeater') ):
				?>				
				<div class="row">
					<div class="col <?php echo $repeaterrowclass; ?>" >						
						<div class="row" style="display: flex;flex-wrap: wrap;margin-bottom: 0;">
						<?php 
						
						while( have_rows('repeater') ): the_row(); 
							$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' );
							?>						
							<div class="repeater col <?php echo $repeaterclass; ?>" style="display: flex;flex-direction: column;" >	
								<?php if($imgsrc[0]) { ?><p><img style="display:inline;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" ></p><?php } ?>
								<h3 style=""><?php the_sub_field("header"); ?></h3>
								<div style=""><?php the_sub_field("text"); ?></div>								
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

				<!-- button notes -->
				<?php if( get_sub_field('button_notes') ){ ?>				
				<div class="row">
					<div class="col s12" >						
						<div class="button-notes"><?php the_sub_field('button_notes'); ?></div>
					</div>
				</div>				
				<?php } ?>
			</div>

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
<?php get_footer(); ?>