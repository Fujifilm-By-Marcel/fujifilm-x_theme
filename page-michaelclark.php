<?php
/*
 Template Name: Page-MichaelClark
*/

function page_michaelclark_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1');
	wp_enqueue_style('slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/slideshow.css',array(),'1'); 
	wp_enqueue_style('michaelclark', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/page-michaelclark/style.css',array(),'1.0.2');
	
}
function page_michaelclark_scripts(){
	wp_enqueue_script('slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/slideshow.js', array(), '1',true); 
}

add_action( 'wp_enqueue_scripts', 'page_michaelclark_styles' );
add_action( 'wp_enqueue_scripts', 'page_michaelclark_scripts' );


get_header(); 
?>

<div id="container">
	<div class="top-banner">
		<h1 style="margin:0;">
			<img class="top-banner-img img-desktop" src="<?php echo wp_get_attachment_image_url( get_field('desktop_image'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_field('desktop_image'), 'full' ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
			<img class="top-banner-img img-mobile" src="<?php echo wp_get_attachment_image_url( get_field('mobile_image'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_field('mobile_image'), 'full' ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
		</h1>
	</div>

	<div id="content" role="main">	
	
		<div class="section">
			<div class="container">			
				<div class="row">
					<div class="col s12">
						<div class="headline">
							<h2 class="michaelGreen">Push Limits. Break Boundaries. Achieve More.</h2>							
						</div>
						<p>Learn the secrets behind Michael’s creative process, his advanced lighting techniques and how 
						he uses GFX 100 to reach new heights in his creating one of a kind images.</p>
						<p>This is a unique 3-day, hands-on portfolio build with very limited capacity. Each attendee will be issued 
						a personal GFX 100 to use for the duration of the portfolio build and they will also have access to 
						an assortment of lenses and on-site Fujifilm experts to ensure that every moment is spent learning 
						and capturing incredible imagery.<p>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6">
						<p><span class="strong-p">WHO SHOULD ATTEND:</span><br>
						Advanced Amateurs, Professionals</p>

						<p><span class="strong-p">WHAT YOU SHOULD KNOW:</span><br>
						Working knowledge of artificial lighting, digital workflow and manual mode on digital SLR or mirrorless camera.</p>

						<p><span class="strong-p">WHY THIS PORTFOLIO BUILD IS SPECIAL:</span><br>
						Each portfolio build will feature multiple shooting situations with multiple opportunities for attendees to create their own images. Each attendee will also be provided a FUJIFILM GFX 100 Large Format Mirrorless Digital Camera</p>
					</div>
					<div class="col s12 m6">		
						<p>to use for the duration of the portfolio build so that they may get first-hand experience in using the latest in imaging technology. Lighting equipment, additional lenses, and on-site technicians will also be available to students to use as well for the duration of the event.</p>
						<p><span class="strong-p">WHAT YOU SHOULD BRING:</span><br>
						Each attendee should bring high-speed SD memory cards, a laptop computer, and a notebook.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="section bg2">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="headline">
							<h2>What you’ll learn</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<h3 class="michaelRed" style="margin: 0;">Day 1</h3>
						<p>9am - 5pm</p>
					</div>
					<div class="col s12 m6">
						<p><span class="strong-p">Introduction to the GFX 100:</span> <br>
						Go over the main features of the GFX 100</p>						
						<p><span class="strong-p">Setting up the GFX 100:</span> <br>
						A detailed overview of how to set up the camera and how I set it up. Participants will follow along and can set up their GFX 100 as we go through the menus. This will set us up for the rest of the portfolio build.</p>						
					</div>					
					<div class="col s12 m6">
						<p><span class="strong-p">Lens Selection: </span> <br>
						A discussion of the various lenses and accessories. </p>						
						<p><span class="strong-p">Digital Workflow – Part 1</span><br>
						Setting up the camera and Color Management (most photographers have never heard 80% of this section)</p>
						<p><span class="strong-p">Studio Shoot: </span> <br>
						A half-day studio tethered shoot with an athlete using studio strobes.</p>
					</div>
					<div class="col s12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<h3 class="michaelRed" style="margin: 0;">Day 2</h3>
						<p>9am - 5pm</p>
					</div>
					<div class="col s12 m6">
						<p><span class="strong-p">Prepping images for Critique</span></p>
						<p><span class="strong-p">Image Critique from Studio Shoot</span></p>
						<p><span class="strong-p">Working with Advanced Lighting Techniques and the GFX 100:  </span> <br>
						Discuss HSS and HS strobe techniques</p>
					</div>
					<div class="col s12 m6">
						<p><span class="strong-p">Digital Workflow – Part 2</span><br>
						Working up the image in Capture One and Photoshop</p>
						<p><span class="strong-p">Location Shoot: </span> <br>
						A full-day on location shoot with extreme action talent.</p>
					</div>
					<div class="col s12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<h3 class="michaelRed" style="margin: 0;">Day 3</h3>
						<p>9am - 5pm</p>
					</div>
					<div class="col s12 m6">
						<p><span class="strong-p">Prepping images for Critique</span></p>
						<p><span class="strong-p">Image Critique from Studio Shoot
</span></p>
						<p><span class="strong-p">Capturing 4K Motion Footage with the GFX 100</span></p>
					</div>
					<div class="col s12 m6">
						<p><span class="strong-p">Digital Workflow – Part 3</span><br>
						Hard Drives, Storage, Backing up, RAID Arrays and Arching your images</p>
						<p><span class="strong-p">Afternoon photo shoot: </span> <br>
						A half-day session in studio capturing a high-end portraiture and 4K video.</p>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<p><em>Please note that the exact talent is to be determined by the location.</em></p>
					</div>
				</div>
				
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="headline">
							<h2>Portfolio Build Locations</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6">
						<div class="location">
							<table>
								<tr>
									<th class="columnheader" colspan="2">NEW YORK, NY</td>
								</tr>
								<tr>
									<th class="rowheader">Dealer</td>
									<td class="rowinfo dealer">Foto Care</td>
								</tr>
								<tr>
									<th class="rowheader">Date</td>
									<td class="rowinfo">10/3 - 10/5</td>
								</tr>
								<tr>
									<th class="rowheader">Course Fee</td>
									<td class="rowinfo">$1500</td>
								</tr>
							</table>
							<a href="https://www.eventbrite.com/e/reach-new-heights-with-michael-clark-and-fujifilm-gfx-100-tickets-68056618177?aff=Fujifilm" target="_blank"><button class="michaelclark-button"  >REGISTER</button></a>
						</div>
					</div>
					<div class="col s12 m6">
						<div class="location">
							<table>
								<tr>
									<th class="columnheader" colspan="2">SALT LAKE CITY, UT</td>
								</tr>
								<tr>
									<th class="rowheader">Dealer</td>
									<td class="rowinfo dealer">Pictureline</td>
								</tr>
								<tr>
									<th class="rowheader">Date</td>
									<td class="rowinfo">10/31 - 11/2</td>
								</tr>
								<tr>
									<th class="rowheader">Course Fee</td>
									<td class="rowinfo">$1500</td>
								</tr>
							</table>
							<a href="https://www.pictureline.com/collections/events/products/gfx-100-event-with-michael-clark" target="_blank"><button class="michaelclark-button"  >REGISTER</button></a>
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div class="section bg2">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="headline">
							<h2>About Michael</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6">
						<img class="mugshot" src="<?php echo wp_get_attachment_image_url( 889, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 889, 'full' ); ?>" alt="Michael Clark" >
					</div>
					<div class="col s12 m6">
						<p>Michael Clark is an internationally published adventure photographer specializing in adventure sports, travel, and landscape photography. He produces intense, raw images of athletes pushing their sports to the limit and has risked life and limb on numerous assignments to bring back stunning images of rock climbers, mountaineers, kayakers, mountain bikers, big-wave surfers, sky divers and many other extreme sports athletes, often working in remote locations around the world. He uses unique angles, bold colors, strong graphics and cutting-edge, dramatic lighting techniques to capture fleeting moments of passion, gusto, flair and bravado in the outdoors. Balancing extreme action with subtle details, striking portraits and wild landscapes, he creates images for the editorial, advertising and stock markets worldwide.</p>
						<a href="https://www.michaelclarkphoto.com/ABOUT/BIO/1" target="_blank"><button class="michaelclark-button" >READ MORE</button></a>
					</div>
					<div class="col s12">
						<hr style="margin: 1em 0;">
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="headline">
							<h2>Gallery</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="slideshow-container">
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 898, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 898, 'full' ); ?>" alt="Michael Clark and GFX 100 1" />
							</div>	
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 899, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 899, 'full' ); ?>" alt="Michael Clark and GFX 100 2" />
							</div>
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 900, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 900, 'full' ); ?>" alt="Michael Clark and GFX 100 3"/>
							</div>
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 901, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 901, 'full' ); ?>" alt="Michael Clark and GFX 100 4"/>
							</div>
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 902, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 902, 'full' ); ?>" alt="Michael Clark and GFX 100 5" />
							</div>
							<div class="mySlides">
								<img src="<?php echo wp_get_attachment_image_url( 903, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 903, 'full' ); ?>" alt="Michael Clark and GFX 100 6" />
							</div>
							<!-- Next and previous buttons -->
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>
						</div>
						<br>
						<!-- The dots/circles -->
						<div class="slideshow-nav">
							<span class="dot" onclick="currentSlide(1)"></span> 
							<span class="dot" onclick="currentSlide(2)"></span> 
							<span class="dot" onclick="currentSlide(3)"></span> 
							<span class="dot" onclick="currentSlide(4)"></span> 
							<span class="dot" onclick="currentSlide(5)"></span> 
							<span class="dot" onclick="currentSlide(6)"></span> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bg2">
			<a href="#wrap" id="pagetop"></a>
		</div>
		
	</div><!-- #content -->
</div><!-- #container -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
