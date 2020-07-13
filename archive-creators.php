<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/css/archive-creators.css', false, NULL, 'all');
	wp_register_script( 'uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', false, NULL, false );
}
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

get_header(); 
get_sidebar();
$imgDirectory = get_stylesheet_directory_uri()."/en-us/img/creators/";
?>

<script>
jQuery( document ).ready(function() {
	console.log("uscommon executed");
	if( jQuery('#cookieLaw').length ){	
		jQuery('.cookieLawCloseBtn').click(
			function(){
				jQuery('.main').css("margin-top", jQuery(".header").height());
			}			
		);
	}	
	fixPageMargin();	
	jQuery(window).resize(function() {
		fixPageMargin();
	}).resize();
});

function fixPageMargin(){
	if( jQuery('#cookieLaw').length ){		
		jQuery('.main').css("margin-top", jQuery(".header").height());//-jQuery('#cookieLaw').height());		
	} else {
		jQuery('.main').css("margin-top", jQuery(".header").height());
	}
}
</script>

<section class="main"> 
	<section class="creators-navigation creators-desktop-nav">
		<div class="container-fluid">
			<div class="row">
				<div class="col s8 m4">
					<img alt="Fujifilm X | GFX Creators" width="267" height="43" class="creators-logo" src="<?php echo $imgDirectory ?>logo.png" srcset="<?php echo $imgDirectory ?>logo.png 1x, <?php echo $imgDirectory ?>logo@2x.png 2x, <?php echo $imgDirectory ?>logo@3x.png 3x">
				</div>
				<div class="col s4 m8">
					<div class="creators-navigation-list">
						<ul>
							<li><a href="#">home</a></li>
							<li><a href="#">about</a></li>
							<li><a class="active" href="#">creators</a></li>
							<li><a href="#">gallery</a></li>
						</ul>
						<a href="javascript:void(0);" class="hamburger-menu-icon" onclick="openMenu()">
					    	<i class="fa fa-bars"></i>
					    </a>
					</div>					
				</div>
			</div>
		</div>
	</section>
	<section class="creators-navigation creators-mobile-nav"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col s12">
					<div class="creators-navigation-list">
						<ul>
							<li><a href="#">home</a></li>
							<li><a href="#">about</a></li>
							<li><a class="active" href="#">creators</a></li>
							<li><a href="#">gallery</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

</section>


<script>
function openMenu() {
	var x = jQuery(".creators-mobile-nav");
	if (x.css("display") === "block") {
		x.hide();
	} else {
		x.show();
	}
}
</script>