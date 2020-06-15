<?php
/*
 Template Name: Page-xt30mockup
*/


function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1');
	//wp_enqueue_style('tabs', get_stylesheet_directory_uri().'/en-us/css/tabs.css',array(),'1.0.1'); 
	
}
function page_myfujifilmlegacy_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
	//wp_enqueue_script('tabs', get_stylesheet_directory_uri().'/en-us/js/tabs.js', array(), '1.0.0',true); 
}

add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );


get_header();

?>

<style>

h2 {
    margin: 0 0 20px 0 !important;
}

.wp_content{max-width:1140px;}

.camera-spec{
	float:left;
	margin-right:5px;
	margin-bottom:5px;
	border-radius:5px;
	overflow:hidden;
}
.camera-spec .camera-spec-title{
	background-color: #0c0c0c;
	color:#fff;
	text-align:center;
	padding:2px 10px;
}
.camera-spec .camera-spec-info{
    border-left:1px solid #e6e6e6;
	border-right:1px solid #e6e6e6;
	border-bottom:1px solid #e6e6e6;
    background-color: #ebebeb;
	padding: 2px 10px;
	text-align:center;
}
.camera-spec .camera-spec-info em{
	color: #222;
	font-weight:bold;
}

.special-site-banner{
	margin-bottom:20px;
}

.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.sidebar h3, .wp_content ul, .wp_content p{
	margin-bottom:20px;
}
.sidebar .row{
	margin-bottom:40px;
}


.color-swatches .swatch{
	width:23px;
	height:27px;
	border-radius:2px;
	display:inline-block;
	box-shadow:1px 1px 2px 0px #888888;
	cursor:pointer;
}


.additional-views .swatch-view{
	display:none;
}
.additional-views .swatch-view-image{
	float:left;
	cursor:pointer;
}

.camera-image{display:none;}

.featured-feature{
	margin-bottom:60px;
}

@media (min-width:601px){
	.center-vertically-parent{
		position:relative;
	}
	.center-vertically{
		position: absolute !important;
    	top: 50%;
    	transform: translate(0, -50%);
	}
}
@media (max-width:600px){
	.additional-views-col{
		position:unset;
	}
	.featured-feature img{
		margin-bottom:40px !important;
	}

}
</style>

<div class="main">

	<section class="events__first lower__first" style="padding-top: 0;">
		<div class="inner">
			<h1 class="headline_underline headline_h1"><?php the_title(); ?></h1>
		</div>
	</section>
		
	<section>
		<div class="inner">
			<div class="container">				
				<div class="wp_content">	
					<div class="row">
						<div class="col s12">
							<div class="camera-images">
								<img class="camera-image default-camera-image" src="<?php echo wp_get_attachment_image_url( 15692, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15692, 'full' ); ?>" data-view="front-back" data-color="Silver">
								<img class="camera-image" src="<?php echo wp_get_attachment_image_url( 15693, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15693, 'full' ); ?>" data-view="back" data-color="Silver">
								<img class="camera-image" src="<?php echo wp_get_attachment_image_url( 15694, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15694, 'full' ); ?>" data-view="front-back" data-color="Charcoal Silver">
								<img class="camera-image" src="<?php echo wp_get_attachment_image_url( 15695, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15695, 'full' ); ?>" data-view="back" data-color="Charcoal Silver">
								<img class="camera-image" src="<?php echo wp_get_attachment_image_url( 15696, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15696, 'full' ); ?>" data-view="front-back" data-color="Black">
								<img class="camera-image" src="<?php echo wp_get_attachment_image_url( 15697, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15697, 'full' ); ?>" data-view="back" data-color="Black">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m8">
							<span>Color: </span><span id="color-swatch-text"></span><br>
							<div class="color-swatches">
								<div class="swatch" data-hex="#c9c9c9" data-color="Silver" title="Silver"></div>
								<div class="swatch" data-hex="#a0a0a0" data-color="Charcoal Silver" title="Charcoal Silver"></div>
								<div class="swatch" data-hex="#000000" data-color="Black" title="Black"></div>
							</div>
							<span>Additional Views</span>
							<div class="additional-views">
								<div class="swatch-view default-swatch-view" data-color="Silver">
									<div class="swatch-view-image" data-view="front-back">
										<img src="<?php echo wp_get_attachment_image_url( 15698, 'full' ) ?>">
									</div>
									<div class="swatch-view-image" data-view="back">
										<img src="<?php echo wp_get_attachment_image_url( 15699, 'full' ) ?>">
									</div>								
								</div>
								<div class="swatch-view" data-color="Charcoal Silver">
									<div class="swatch-view-image" data-view="front-back">
										<img src="<?php echo wp_get_attachment_image_url( 15700, 'full' ) ?>">
									</div>
									<div class="swatch-view-image" data-view="back">
										<img src="<?php echo wp_get_attachment_image_url( 15689, 'full' ) ?>">
									</div>
								</div>
								<div class="swatch-view" data-color="Black">
									<div class="swatch-view-image" data-view="front-back">
										<img src="<?php echo wp_get_attachment_image_url( 15690, 'full' ) ?>">
									</div>
									<div class="swatch-view-image" data-view="back">
										<img src="<?php echo wp_get_attachment_image_url( 15691, 'full' ) ?>">
									</div>							
								</div>
							</div>
							<div style="clear:both;height:20px;"></div>
							<ul>
								<li>26.1MP BSI APS-C X-Trans CMOS 4</li>
								<li>X-Processor 4 Quad-Core CPU</li>
								<li>100% Phase Detect AF Across the Frame</li>
								<li>Strong Face and Eye Detection AF with New Face Selection Option</li>
								<li>30fps Blackout Free Shooting</li>
								<li>Monochrome Adjustment</li>
								<li>Advanced SR Auto</li>
							</ul>
							<div class="camera-spec">
								<div class="camera-spec-title">Sensor</div>
								<div class="camera-spec-info">APS-C <em>"X-Trans CMOS 4"</em></div>
							</div>
							<div class="camera-spec">
								<div class="camera-spec-title">Effective Pixels</div>
								<div class="camera-spec-info"><em>26M</em></div>
							</div>
							<div class="camera-spec">
								<div class="camera-spec-title">LCD Monitor</div>
								<div class="camera-spec-info"><em>3.0</em>-inch tilting LCD screen (1,040K-dot)</div>
							</div>
							<div class="camera-spec">
								<div class="camera-spec-title">Sensitivity</div>
								<div class="camera-spec-info"><em>ISO 51200***</em></div>
							</div>
							<div style="clear:both;"></div>
							<p></p>
							<p><a href="https://www.fujifilm.com/products/digital_cameras/brochures/#h2-1" target="_blank">Brochure Library</a><br>
							Read more about our products in these downloadable PDF format brochures.</p>
							<p></p>
						</div>
						<div class="col s12 m4 sidebar">
							<div class="row">
								<div class="col s12">
									<div class="videoWrapper">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/JWEh3LTOdwE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col s12">
									<h3>News Releases</h3>
									<ul>
									<li><a href="/press/news/display_news?newsID=881588">FUJIFILM X-T30</a></li>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<h3>Special Sites</h3>
									<div class="special-site-banner"> 
										<a href="#" target="_blank"><img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15478, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15478, 'full' ); ?>" ></a>
										<ul>
										<li><a href="#" target="_blank">FUJIFILM X-T30 special website</a></li>
										</ul>
									</div>
									<div class="special-site-banner"> 
										<a href="#" target="_blank"><img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15477, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15477, 'full' ); ?>" ></a>
										<ul>
										<li><a href="#" target="_blank">X-Photographers</a></li>
										</ul>
									</div>
								</div>
							</div>
								
						</div>
					</div>


					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6 push-m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15683, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15683, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 pull-m6 center-vertically">
							<div class="center-vertically">
								<h2>Advanced Image Sensor Technology</h2>
								<p>The 26.1MP BSI APS-C X-Trans CMOS 4 image sensor uses a unique color filter array to produce its stunning skin tones and colors and extremely low moire, all without the need for an optical low pass filter.</p>
							</div>
						</div>						
					</div>
					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15684, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15684, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 push-m6 center-vertically">
							<div class="center-vertically">
								<h2>Accurate Auto-Focus Tracking and Face Detection</h2>
								<p>The new X-Processor 4 Quad Core-CPU offers fast and accurate face-detection for moving people when capturing either high-resolution stills or recording 4K Video. Additionally, eye-detection AF now works in AF-C mode, which results in accurate focus-tracking for moving portrait subjects. The low-light limit for phase detection AF has been expanded even more from the conventional +0.5EV to -3EV, to allow for operation in a wide range of lighting scenarios.</p>
							</div>	
						</div>						
					</div>
					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6 push-m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15685, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15685, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 pull-m6 center-vertically">
							<div class="center-vertically">
								<h2>Superior Video and Image Effects</h2>
								<p>The X-T30 offers the ability to record 4K video at 30 frames per second or capture of 120 frames per second at 1080p to create super slow motion effects. Filmmakers needing extreme color fidelity can record 10-bit, 4:2:2 color through the camera’s HDMI port. Leveraging Fujifilm’s advanced color reproduction technology, users are able to record video in Film Simulation modes. The X-T30 also incorporates numerous shooting functions, such as “monochrome adjustments” available for ACROS and Monochrome, and “Color Chrome” that produces deep colors and gradation in subjects with highly saturated colors, which are notoriously difficult to photograph.</p>
							</div>	
						</div>						
					</div>
					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15686, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15686, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 push-m6 center-vertically">
							<div class="center-vertically">
								<h2>Legacy in Color Reproduction</h2>
								<p>The X-T30 takes advantage of FUJIFILM's legacy in manufacturing photographic film by beautifully reproducing colors accurately and vividly. ETERNA, a new FILM SIMULATION, is now also available for use in capturing both stills and video.</p>
							</div>	
						</div>						
					</div>
					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6 push-m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15687, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15687, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 pull-m6 center-vertically">
							<div class="center-vertically">
								<h2>Intuitive Design with Comfortable Controls</h2>
								<p>Offers 3.0-inch touch LCD with 2-way tilting and improved touch screen to capture images efficiently in challenging situations. Provides Advanced SR Auto mode - easily activated with a lever - to automatically choose the optimum shooting settings for a given scene out of 58 presets.</p>
							</div>	
						</div>						
					</div>
					<div class="row featured-feature center-vertically-parent">
						<div class="col s12 m6">
							<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( 15688, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15688, 'full' ); ?>" >
						</div>
						<div class="col s12 m6 push-m6 center-vertically">
							<div class="center-vertically">
								<h2>Next-Gen Wireless Connectivity</h2>
								<p>Built-in Wi-Fi® and Bluetooth V.4.2 offers digital communication with the free FUJIFILM Camera Remote app to wirelessly control the camera or share images to smart devices.</p>
							</div>	
						</div>						
					</div>
				</div>
			</div>
		</div>		
	</section>


</div>
<script>
(function($){	

	var swatches = $(".color-swatches .swatch");
	var views = $(".additional-views .swatch-view");
	var swatchviewimages = $(".swatch-view-image");
	var cameraimages = $(".camera-image");

	swatches.each(function(){
		var swatch = $(this);
		swatch.css("background-color", swatch.data("hex"));
		swatch.click(function(){
			views.each(function(){
				var view = $(this);
				$("#color-swatch-text").text(swatch.data("color"));
				if(view.data("color") == swatch.data("color")){
					view.show();
				}
				else{
					view.hide();
				}
			});
		});
	});	

	swatchviewimages.each(function(){
		var swatchviewimage = $(this);
		swatchviewimage.click(function(){			
			cameraimages.each(function(){
				var cameraimage = $(this);
				if( swatchviewimage.data("view") == cameraimage.data("view") && swatchviewimage.parent().data("color") == cameraimage.data("color") ){
					cameraimage.show();
				}
				else{
					cameraimage.hide();
				}
			});
		});
	});

	

	$(".default-swatch-view").show();
	$(".default-camera-image").show();
	$("#color-swatch-text").text($(".default-camera-image").data("color"));

})(jQuery);
</script>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
