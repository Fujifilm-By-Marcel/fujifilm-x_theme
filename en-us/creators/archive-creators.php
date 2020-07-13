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
<!-- noto-sans-condensed -->
<!--<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">-->
<script>
	jQuery( document ).ready(function() {
		
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
			jQuery('.main').css("margin-top", jQuery(".header").height()); //-jQuery('#cookieLaw').height());
			
			
		} else {
			jQuery('.main').css("margin-top", jQuery(".header").height());
		}
	}
</script>

<section class="main"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 infobox-col">
				<div class="infobox">
					<h2>MEET OUR CREATORS</h2>
					<p class="tagline">PHOTOGRAPHY AND VIDEO</p>
					<p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultric.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col s12 creator-filters">
				<div class="row">
					<div class="filters">
						<div class="col s12 m8 filter-container">						
							<p>
								<span class="filter-instructions">FILTER BY ></span>
								<span class="filter-option active"><a href="#">ALL</a></span>
								<span class="filter-option"><a href="#">CREATORS</a></span>
								<span class="filter-option"><a href="#">X&#8209;PHOTOGRAPHERS</a></span>
							</p>						
						</div>
						<div class="col s12 m4 search-box-container">
							<div class="search-box">
								<input type="text" size="13" placeholder="SEARCH CREATORS" id="search-box">
								<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container creators">
		<div class="creator">
			<div class="creator-content">
				<img src="">
				<h3>CREATOR</h3>
				<p class="creator-name">Reggie Ballesteros</p>
				<h3>BIO</h3>
				<p class="creator-desc">I identify as a Fujifilm wedding photographer as well as an educator that is an active member of the Fujifilm community who serves to teach all to see and think like photographers.</p>
				<a class="creator-btn" href="#">view profile</a>
			</div>
		</div>

		<div class="creator">
			<div class="creator-content">
				<img src="">
				<h3>CREATOR</h3>
				<p class="creator-name">Reggie Ballesteros</p>
				<h3>BIO</h3>
				<p class="creator-desc">My work aims to diversify the traditional canon of photography by using images to spark culturally relevant conversations. Studying literature, in particular historical fiction, widened my perspective.</p>
				<a class="creator-btn" href="#">view profile</a>
			</div>
		</div>

		<div class="creator">
			<div class="creator-content">
				<img src="">
				<h3>CREATOR</h3>
				<p class="creator-name">Reggie Ballesteros</p>
				<h3>BIO</h3>
				<p class="creator-desc">Due to my childhood and being raised over seas in a 3rd world country I have a unique perspective on culture and the differences in relationships.</p>
				<a class="creator-btn" href="#">view profile</a>
			</div>
		</div>	
	</div>

</section>
