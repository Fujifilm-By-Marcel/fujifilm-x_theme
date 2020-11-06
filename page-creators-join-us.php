<?php
/*
Template Name: Page-creators-join-us
*/
function page_usa_styles(){
	wp_enqueue_style('materialize-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	wp_enqueue_style('creators-nav-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/creators/css/creators-nav.css',array(),'1.0.0');
	wp_enqueue_style('us-page-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/creators/css/creators-join-us.css',array(),'1.0.28');
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
 	echo '<div class="button">';
 	echo '<a href="'.$href.'" target="'.$target.'">';
 	echo '<div class="button-inner"><span class="text">'.$text.'</span></div>';
 	echo '</a>'; 
 	echo '</div>';	
	}
}

function my_transition(){
		$imgsrc = wp_get_attachment_image_src( get_sub_field('transition_image'), 'full' ); 
		if($imgsrc){
		?>					
		<img class="transition-image" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" style="z-index:1;<?php the_sub_field('transition_image_style') ?>">
		<?php }
}



 $imgDirectory = get_stylesheet_directory_uri()."/en-us/fnac-assets/creators/img/";

 ?>
<section class="main">	

	<?php 
	require get_stylesheet_directory().'/en-us/fnac-assets/creators/navigation.php';
	?>
	
	<!-- HEADER SECTION -->
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
		<section class="background-header" style="display:flex;position:relative;padding:100px 0;color:white;text-align:left;min-height:65vh;">		
			
			<!--body-->
			<div class="container" style="align-self:center;">
				<div class="row">
					<div class="col s12">

						<div style="max-width:500px;display:block;margin:auto;">

							<p><img style="display:inline;" src="<?php echo $logo[0]; ?>" width="<?php echo $logo[1]; ?>" height="<?php echo $logo[2]; ?>"></p>
							<h1 style="text-transform: uppercase;"><?php the_sub_field("header"); ?></h1>
							<p><span class="subheader"><?php the_sub_field("subheader"); ?></span></p>
							<p style="font-size:.75rem;line-height:normal;"><?php the_sub_field("text"); ?></p>
							<!--button-->
							<?php 			
							$button = get_sub_field('button');
							my_button( strval ( $button["href"] ), strval ( $button["target"] ), strval ( $button["text"] ) );					
							?>	
						</div>
					</div>
				</div>
			</div>

			<!--photocredit-->
			<span class="photo-credit"><?php the_sub_field("photocredit"); ?></span>

		</section>

		<?php my_transition();
	endwhile;
	endif;
	?>

	<!-- OTHER SECTIONS -->
	<?php 
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
					if( get_sub_field("mobile-only_section_style") ){
						the_sub_field("mobile-only_section_style");
					} ?>
				}
			}
		</style>
		<section id="<?php the_sub_field("section_id") ?>" class="background-<?php echo $i; ?> <?php if( get_sub_field('white_text') ) { echo "white-text"; } ?>" style="display:flex;position:relative;padding:50px 0;<?php the_sub_field('section_inline_style'); ?>">
			
			<!--body-->
			<div class="container"  style="align-self:center;">
				
				<div class="row">
					<div class="col s12" >
						<h2><?php the_sub_field("header"); ?></h2>
						<p style='font-family: "Fjalla One", sans-serif;font-size:1.25rem;color:#505050;line-height:normal;'><?php the_sub_field("subheader"); ?></p>
						<p><?php the_sub_field("text"); ?></p>

						<!-- image -->					
						<?php 
						$imgsrc = wp_get_attachment_image_src( get_sub_field('image'), 'full' ); 
						if($imgsrc){
						?>
						<img style="width:69px;margin-bottom:2rem;display:inline" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>">						
						<?php } ?>

						<!-- Bullets -->
						<?php 
						$bullets = get_sub_field('bullets');
						if( $bullets ):				    
					    //echo "<pre>";
					    //print_r($bullets);
					    //echo "</pre>";
					    ?>
						<div class="col s12" >		
							<div class="bullets-group">
								<h3><?php echo $bullets['header']; ?></h3>
								<p class="subheader"><?php echo $bullets['subheader']; ?></p>
								<ul>
									<?php 
									foreach($bullets['bullets'] as $bullet){ 
										echo "<li><p>".$bullet['text']."</p></li>";							
									} 
									?>
								</ul>
							</div>
						</div>
						<?php						
						endif;
						?>


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



						<!--iframe-->
						<?php if(get_sub_field("form_embed")){ ?>
							<div id="myform"><iframe src="<?php the_sub_field("form_embed"); ?>" style="width:100%;min-height:500px;"></iframe></div>
						<?php } ?>
					</div>

				</div>

				
			</div>

			<!--photocredit-->
			<span class="photo-credit"><?php the_sub_field("photocredit"); ?></span>


		</section>
		<?php my_transition();		
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