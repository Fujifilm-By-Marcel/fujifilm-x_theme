<?php 
/*
Template Name: Page-creator-resources
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('creator-resources', get_stylesheet_directory_uri().'/en-us/css/creator-resources.css', array(), '1.0.28');	
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true);
	//wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/js/lazyload.js', array(), '1.22',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

get_header(); 
get_sidebar();

$imgDirectory = get_stylesheet_directory_uri()."/en-us/creators/img/";

function printTile($tile, $tallest_px)
{
	$imgsrc = wp_get_attachment_image_src( $tile->image, 'full' );
    ?>
	<div class="col s12 m6 l6 xl4 tile">
		<a class="tile-link" href="<?php echo $tile->href; ?>" target="<?php echo $tile->target; ?>">
			<div class="tile-inner">
				<div class="icon-wrapper" style="min-height:<?php echo $tallest_px; ?>;">
					<img style="display:inline;" class="icon" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
				</div>
				<h3 class="title"><span><?php echo $tile->title; ?></span></h3>
				<p class="cta"><span ><?php echo $tile->cta; ?></span></p>
			</div>
		</a>
	</div>
	<?php
}

$tallest_px = get_field("tallest_button_image");

?>

<section class="main"> 		
	<section class="creators-navigation">
		<section class="creators-desktop-nav">
			<div class="container-fluid">
				<div class="row">
					<div class="col s8 m4">
						<img alt="Fujifilm X | GFX Creators" width="267" height="43" class="creators-logo" src="<?php echo $imgDirectory ?>logo.png" srcset="<?php echo $imgDirectory ?>logo.png 1x, <?php echo $imgDirectory ?>logo@2x.png 2x, <?php echo $imgDirectory ?>logo@3x.png 3x">
					</div>
					<div class="col s4 m8">
						<div class="creators-navigation-list">
							<a href="javascript:void(0);" class="hamburger-menu-icon" onclick="openMenu()">
						    	<i class="fa fa-bars"></i>
						    </a>
						</div>					
					</div>
				</div>
			</div>
		</section>
		<section class="creators-mobile-nav"> 
			<div class="container-fluid">
				<div class="row">
					<div class="col s12">
						<div class="creators-navigation-list">
							<ul>
								<li><a <?php echo $home_active ?> href="<?php echo get_permalink( get_page_by_path( 'home-creators' ) ) ?>">home</a></li>
								<!--<li><a <?php echo $about_active ?> href="<?php echo get_permalink( get_page_by_path( 'about-creators' ) ) ?>">about</a></li>-->
								<li><a <?php echo $creators_active ?> href="<?php echo get_post_type_archive_link( 'creators' ) ?>">creators</a></li>
								<li><a <?php echo $gallery_active ?> href="<?php echo get_permalink( get_page_by_path( 'gallery-creators' ) ) ?>">gallery</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l3">

			</div>
			<div class="col s12 m12 l9">
				
				<h1>CREATORS RESOURCES</h1>
				<p class="tagline">HERE YOU WILL FIND XXXXXXX</p>
				<p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultric.</p>
				<br><br>
				<!-- tiles -->
				<?php if( have_rows('buttons') ): ?>
				<div class="row tiles">
					<?php 
					while( have_rows('buttons') ): the_row();					
						$tile = new stdClass();
						$tile->title = get_sub_field("title");
						$tile->cta = get_sub_field("cta");
						$tile->image = get_sub_field("image");
						$tile->href = get_sub_field("href");
						$tile->target = get_sub_field("target");
						printTile($tile, $tallest_px); 
					endwhile;
					?>
				</div>
				<?php endif; ?>
				

			</div>
		</div>
	</div>
</section>
<?php get_footer();  ?>