<?php
/*
 Template Name: Page-home-v2
*/

function page_home_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1');
	wp_enqueue_style('home-special', get_stylesheet_directory_uri().'/en-us/css/home.css',array(),'1.0.15');
}
function page_home_scripts(){
	//wp_enqueue_script('slideshow', get_stylesheet_directory_uri().'/en-us/js/slideshow.js', array(), '1',true); 
}

add_action( 'wp_enqueue_scripts', 'page_home_styles' );
//add_action( 'wp_enqueue_scripts', 'page_home_scripts' );


get_header(); 
?>


<div class="main">
	<div class="row">
		<?php
		$myclass = "tile-1";
		$tile = get_field('tile_1');
		if( $tile ): ?>
		<style>
			.<?php echo $myclass?>{ background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
			@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
			@media (max-width:768px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_768'], 'full' ) ?>'); } }
			@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
		</style>
		<div class="col s12 vh100 main-banner">					
			<a class="banner-link" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
				<div class="banner-img <?php echo $myclass?>" ></div>
				<div class="overlay">
					<div class="banner-title center-left">
						<p class="tagline"><?php echo $tile['tagline'] ?></p>
						<h2><?php echo $tile['header'] ?></h2>
						<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
					</div>
				</div>
			</a>					
		</div>
		<?php endif; ?>		
	</div>
	<div class="row two-columns">	
		<?php
		$myclass = "tile-2";
		$tile = get_field('tile_2');
		if( $tile ): ?>
		<style>
			.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
			@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
			@media (max-width:768px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_768'], 'full' ) ?>'); } }
			@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
		</style>
		<div class="col s12 l6 vh100">					
			<a class="banner-link" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
				<div class="banner-img <?php echo $myclass?>" ></div>
				<div class="overlay">
					<div class="banner-title reduced-font-size">
						<p class="tagline"><?php echo $tile['tagline'] ?></p>
						<h2><?php echo $tile['header'] ?></h2>
						<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
					</div>
				</div>
			</a>					
		</div>
		<?php endif; ?>
		<div class="col s12 l6">
			<div class="row">
				<?php
				$myclass = "tile-3";
				$tile = get_field('tile_3');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s12 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>"></div>
						<div class="overlay">
							<div class="banner-title reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
				<?php
				$myclass = "tile-4";
				$tile = get_field('tile_4');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?>{ background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s6 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>"></div>
						<div class="overlay">
							<div class="banner-title  reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
				<?php
				$myclass = "tile-5";
				$tile = get_field('tile_5');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s6 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>" ></div>
						<div class="overlay">
							<div class="banner-title reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row one-columns">
		<?php
		$myclass = "tile-6";
		$tile = get_field('tile_6');
		if( $tile ): ?>
		<style>
			.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
			@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
			@media (max-width:768px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_768'], 'full' ) ?>'); } }
			@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
		</style>
		<div class="col s12 vh100">
			<a class="banner-link" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
				<div class="banner-img <?php echo $myclass?>"></div>
				<div class="overlay">
					<div class="banner-title center-left">
						<p class="tagline"><?php echo $tile['tagline'] ?></p>
						<h2><?php echo $tile['header'] ?></h2>
						<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<div class="row two-columns">
		<div class="col s12 l6">
			<div class="row">
				<?php
				$myclass = "tile-7";
				$tile = get_field('tile_7');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s12 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>" ></div>
						<div class="overlay">
							<div class="banner-title reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
				<?php
				$myclass = "tile-8";
				$tile = get_field('tile_8');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s6 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>" ></div>
						<div class="overlay">
							<div class="banner-title reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
				<?php
				$myclass = "tile-9";
				$tile = get_field('tile_9');
				if( $tile ): ?>
				<style>
					.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
					@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
					@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
				</style>
				<div class="col s6 vh50">
					<a class="banner-link zoom-banner" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
						<div class="banner-img <?php echo $myclass?>" ></div>
						<div class="overlay">
							<div class="banner-title reduced-font-size">
								<p class="tagline"><?php echo $tile['tagline'] ?></p>
								<h2><?php echo $tile['header'] ?></h2>
								<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
							</div>
						</div>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
		$myclass = "tile-10";
		$tile = get_field('tile_10');
		if( $tile ): ?>
		<style>
			.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
			@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
			@media (max-width:768px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_768'], 'full' ) ?>'); } }
			@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
		</style>
		<div class="col s12 l6 vh100">
			<a class="banner-link" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
				<div class="banner-img <?php echo $myclass?>"></div>
				<div class="overlay">
					<div class="banner-title reduced-font-size">
						<p class="tagline"><?php echo $tile['tagline'] ?></p>
						<h2><?php echo $tile['header'] ?></h2>
						<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
					</div>
				</div>
			</a>
		</div>	
		<?php endif; ?>		
	</div>
	<div class="row one-columns">
		<?php
		$myclass = "tile-11";
		$tile = get_field('tile_11');
		if( $tile ): ?>
		<style>
			.<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image'], 'full' ) ?>'); }
			@media (max-width:1920px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_1920'], 'full' ) ?>'); } }
			@media (max-width:768px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_768'], 'full' ) ?>'); } }
			@media (max-width:480px){ .<?php echo $myclass?> { background-image:url('<?php echo wp_get_attachment_image_url( $tile['image_480'], 'full' ) ?>'); } }
		</style>
		<div class="col s12 vh100">
			<a class="banner-link" href="<?php echo $tile['link'] ?>" target="<?php echo $tile['target'] ?>">
				<div class="banner-img <?php echo $myclass?>"></div>
				<div class="overlay">
					<div class="banner-title center-left">
						<p class="tagline"><?php echo $tile['tagline'] ?></p>
						<h2><?php echo $tile['header'] ?></h2>
						<p class="call-to-action"><?php echo $tile['call_to_action'] ?> &#8250;</p>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>

<script>
	(function($) {
		$( document ).ready(function() {					
			
			if( $('#cookieLaw').length ){												
				$('.cookieLawCloseBtn').click( function(){
					$(".header").attr("style","");
					$('.main-banner').css("padding-top", $(".header").outerHeight());
				});
			}
			
			
			fixPageMargin();	
			$(window).resize(function() {
				fixPageMargin();
			}).resize();
		});


		function fixPageMargin(){
			if( $('#cookieLaw').length ){
				$(".header").css("margin-top",$('#cookieLaw').height());						
			} else {
				$(".header").attr("style","");
			}
			$('.main-banner').css("padding-top", $(".header").outerHeight());
		}
	})( jQuery );
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>