<?php
/*
Template Name: Page-fujifilm-flickr
*/
function page_usa_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.9');
	wp_enqueue_style('fps-css', get_stylesheet_directory_uri().'/en-us/css/fujifilm-flickr.css',array(),'1.0.44');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 	
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
				background-size:cover
			}

		</style>
		<section class="background-header" style="display:flex;position:relative;padding:50px 0;color:white;text-align:center;">		
			
			<!--body-->
			<div class="container" style="align-self:center;">
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
					background-size:contain;
					background-repeat:no-repeat;
					<?php if( get_sub_field("mobile_background_position") ) { ?>
						background-position: <?php the_sub_field("mobile_background_position"); ?>;												
					<?php }
					if( get_sub_field("mobile_background_color") ){ ?>
						background-color:<?php the_sub_field("mobile_background_color"); ?>;					
					<?php }
					if( get_sub_field("mobile_padding") ){
						the_sub_field("mobile_padding");
					} ?>
				}
			}
		</style>
		<section class="background-<?php echo $i; ?>" style="display:flex;position:relative;padding:50px 0;<?php the_sub_field('section_inline_style'); ?>">
			
			<!--body-->
			<div class="container"  style="align-self:center;">
				<div class="row">
					<div class="col <?php the_sub_field("row_class"); ?>" >
						<h2><?php the_sub_field("header"); ?></h2>
						<p><?php the_sub_field("text"); ?></p>
					</div>
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

				<?php 
				$repeaterrowclass = get_sub_field("repeater_row_class");
				$repeaterclass = get_sub_field("repeater_class");						
				if( have_rows('repeater') ):
				?>
				<!--Repeater-->
				<div class="row">
					<div class="col <?php echo $repeaterrowclass; ?>" >						
						<div class="row" style="display: flex;flex-wrap: wrap;margin-bottom: 0;">
						<?php 
						
						while( have_rows('repeater') ): the_row(); 
							$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' );
							?>						
							<div class="col <?php echo $repeaterclass; ?>" >
								<div class="repeater">
									<p><img style="display:inline;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" ></p>
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
				
				<?php 			
				$button = get_sub_field('button');
				if( $button["href"] != "" && $button["href"] ){
				?>
				<!--button-->
				<div class="row">
					<div class="col s12" >						
						<?php my_button( strval ( $button["href"] ), strval ( $button["target"] ), strval ( $button["text"] ) ); ?>
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
</script>
<?php get_footer(); ?>