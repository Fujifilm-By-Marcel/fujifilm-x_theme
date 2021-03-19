<?php
/*
Template Name: Page-capture-to-output
*/
function page_usa_styles(){
	//wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
	wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


 ?>
<style>

#newsletter-myBtn-container{
	z-index: 10;
}

:root{
	--red-color: #d8213b;
	--lightgrey-color: #f3f3f3;
	--accent-font: "Fjalla One", sans-serif;
}

.container{
	width: min(90%, 86em);
	margin:auto;
	overflow: hidden;
}

section{
	overflow:hidden;
}


.main p, .main h1, .main h2, .main h3, .main h4{line-height:normal;}

.main h2{
	font-family: var(--accent-font);
	font-size:1.75rem;
	margin-bottom:.5rem;
}
.main h3{
	font-family: var(--accent-font);
	font-size:1.5rem;
	margin-bottom:.5rem;
}

.main .button {
  background-color: var(--red-color);
  border: none;
  color: white;
  padding: .5em 1.25em;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1rem;
  cursor: pointer;
  font-family: var(--accent-font);
}
.center-text{
	text-align:center;	
}
.left-text{
	text-align:left;	
}
.right-text{
	text-align:right;	
}
.justify-text{
	text-align:justify;
}

.red-text{
	color: var(--red-color);	
}

.red-bg{
	background: var(--red-color);
	color:white;
}


.lightgrey-bg{
	background: var(--lightgrey-color);	
}
.black-bg{
	background: black;		
}



.text-white{
	color:white;
}

.vertical-padding-2{
	padding:2.875rem 0;
}

.vertical-padding-3{
	padding:3.125rem 0;
}

section.cto-navigation{
	background:black;
}

.cto-menu{
	float:right;
}
.cto-menu-item{
	background: var(--red-color);	
	color:white;
	text-transform: uppercase;
	font-family: var(--accent-font);
	display:inline-block;
	font-size:1rem;
    padding: 1.25em 1.25em;
    font-family: var(--accent-font);
  
}
.cto-menu-item.active{

}

.page-tagline{
	font-size:1.875rem;
	width: min(90%, 16ch);
	font-family: var(--accent-font);
	margin:auto;
	margin-bottom:2.375rem;

}


.center-vertically{
	display:flex;
	flex-direction: column;
    justify-content: center;
}

.owl-dots{
	position: absolute;
    bottom: 0;
    margin: auto;
    width: 100%;
    margin-bottom: 1rem;
}


.split{
	display: flex;
	flex-direction: column;

}
@media (min-width:50em) {
	.split{
		flex-direction:row;
	}
	
	.split > *{
		flex-basis: 100%;
	}
	.split > * + * {
		margin-left:2em;
	}
	
}


.testimonial-quote{
	font-size:1.5rem;
	font-family: var(--accent-font);
	max-width:17em;
	margin:auto;
}
.testimonial-signature{
	font-size:1rem;
	font-family: var(--accent-font);	
	font-weight: 700;
}
.testimonial-portrait{
	font-family: var(--accent-font);
}
.testimonial-portrait span{
	font-weight:700;
	font-size:1.125rem;
}
.testimonial-text p{
	font-size:1rem;
}
.testimonial-cta{
	font-size:1rem;
	font-weight:700;
}

.owl-carousel .owl-item img.portrait-thumbnail{
	width:46px !important;
	height:auto !important;
	transition: transform .25s;
}
.owl-carousel .owl-item img.portrait-thumbnail.active, .owl-carousel .owl-item img.portrait-thumbnail:hover{
	transform: scale(1.2);
	border:1.5px solid var(--red-color);
	border-radius:50px;
}

.t-owl-carousel{
	max-width:35em;
	margin:auto;
}

.t-owl-carousel-parent{
	padding:0 20px;
}

.t-owl-carousel .owl-stage-outer .owl-item{
	padding:10px;
	cursor:pointer;
}

.t-owl-carousel .owl-stage-outer .owl-item img{
	margin:auto;

}

.owl-prev {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    left: -20px;
    display: block !important;
}

.owl-next {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    right: -20px;
    display: block !important;
}
.owl-prev i, .owl-next i {
	font-size:28px; 
	color: var(--red-color);
}
.owl-theme .owl-nav [class*=owl-]:hover{
	background:none;
}

.contain-text-l{
	max-width:44ch;
	margin:auto;
}
.contain-text{
	max-width:40ch;
	margin:auto;
}
.contain-text-m{
	max-width:26ch;
	margin:auto;
}
.contain-text-s{
	max-width:10ch;
	margin:auto;
}

.surface{
	position:relative;
	max-width:208px;
	margin:auto;
	transition:top .25s;
	top:0;
}
.surface .overlay-container{
	position:relative;
}
.surface .overlay-container .overlay{
	position:absolute;
	top:0;	
	height:100%;
	padding:0 1.5em;
	background: rgba(0,0,0,.7);
	display:none;
}
.surface .overlay-container .overlay p{
	position:relative;
	top:50%;
	transform: translateY(-50%);
	font-size: 0.875rem;
	color:white;
}

.surface:hover .overlay-container .overlay{
	display:block;
}
.surface:hover{	
	top:-1rem;	
}



.margin-bottom-1{
	margin-bottom:1rem !important;
}
.margin-bottom-2{
	margin-bottom:2rem !important;
}

.tech-1, .tech-2, .tech-3{
	display: none;
	height: 25em;
    overflow-y: auto;
}
.tech-options{
	max-width:28ch;	
	text-align:center;
	display:flex;
	justify-content: space-between;
	margin:auto;
}
.tech-options > * + *{
	margin-left:1rem;
}
@media (min-width:50em) {
	.tech-options{
		margin:unset;
	}
}
.tech-options>div{
	max-width:90px;
	text-align:center;
	font-size:.75rem;
	display:inline-block;

}
.tech-images, .tech-options{
	display:none;
}
.tech-images>img{
	margin:auto;
	max-width:28ch !important;
	display:block;
}

.tech-options>div>*{
    cursor:pointer;
}

.tech-options .active img{
	border:2px solid var(--red-color);
	border-radius:75px;
}
.tech-options img:hover{
	filter: invert(100%);
	border-color:#27dec4;
}
.tech-copy{
	margin:auto;
}
#pagetop{
	display: none;
}
.footer{
	margin-top:0;
}
.tech-option-3{
	margin-right:0;
}
@media (min-width:50em) {
	.tech-images img{
		float:right;
	}
	.tech-copy{
		margin-left:0;
	}
	.tech-options{
		text-align:left;
	}
}
.fixed {
    position: fixed;
    top:0; left:0;
    width: 100%; 
    z-index: 11;
}
</style>
<section class="main page-cto">
	<?php if( get_field('tagline_section')['button_text'] ): ?>
	<section class="cto-navigation sticky">
		<div class="container">
			<!-- todo: insert logo -->
			<img style="width:81px;margin:.9rem;display:inline;" src="<?php the_field('logo'); ?>">
			<ul class="cto-menu">
				<li class="cto-menu-item active"><a href="<?php echo get_field('tagline_section')['button_link'] ?>" target="<?php echo get_field('tagline_section')['button_target'] ?>"><?php echo get_field('tagline_section')['button_text'] ?></a></li>
			</ul>
		</div>
	</section>
	<?php endif; ?>
	<section>

		<div class="container split">
			<?php if( get_field('tagline_section')['tagline'] ): ?>
			<div class="center-vertically">
				<div class="center-text vertical-padding-3">
					<p class="page-tagline"><?php echo get_field('tagline_section')['tagline'] ?></p>
					<a href="<?php echo get_field('tagline_section')['button_link'] ?>" class="button" target="<?php echo get_field('tagline_section')['button_target'] ?>"><?php echo get_field('tagline_section')['button_text'] ?></a>
				</div>
			</div>
			<?php endif; ?>
			<?php if( have_rows('carousel') ): ?>
			<div style="min-width:0;">
				<div class="m-owl-carousel owl-carousel owl-theme" style="max-width:450px; margin:auto;">
					<?php while( have_rows('carousel') ) : the_row(); ?>
					<div><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('alt');  ?>"></div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

	</section>
	<?php if( get_field('red_section')['header'] ):  ?>
	<section class="red-bg">
		<div class="container">
			<div class="center-text vertical-padding-3 contain-text">
				<h2><?php echo get_field('red_section')['header'] ?></h2>
				<p><?php echo get_field('red_section')['text'] ?></p>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if( have_rows('testimonials') ): $i=0;  ?>
	<section class="vertical-padding-2">
		<div class="container">
		<?php while( have_rows('testimonials') ) : the_row(); $i++; ?>	
			<div class="testimonial-<?php echo $i ?> testimonial split" style="display: none;">
				<div class="vertical-padding-2 center-text">
					<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('image_alt'); ?>" class="testimonial-image margin-bottom-1">
					<p class="testimonial-quote"><?php the_sub_field('quote'); ?></p>
					<p class="testimonial-signature">-<?php the_sub_field('name'); ?></p>
				</div>
				<div class="vertical-padding-2">
					<p class="margin-bottom-1 testimonial-portrait right-text"><img src="<?php the_sub_field('portrait'); ?>" alt="portrait" width="112" height="112" style="width: 112px;display: inline;"><span><?php the_sub_field('name'); ?></span></p>
					<div class="margin-bottom-1 testimonial-text justify-text">
						<?php the_sub_field('testimonial'); ?>
					</div>
					<p class="testimonial-cta"><a href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>"><?php the_sub_field('cta'); ?></a></p>
				</div>
			</div>			
		<?php endwhile; ?>
			<p style="font-size: 1.125rem;font-family:var(--accent-font);text-transform: uppercase;color:var(--red-color);text-align:center;margin-bottom:1rem;">See more Testimonials</p>
			<div class="t-owl-carousel-parent">
				<div class="t-owl-carousel owl-carousel owl-theme">
					<?php $i=0; while( have_rows('testimonials') ) : the_row(); $i++; ?>
						<div><img data-testimonial="<?php echo $i; ?>" class="portrait-thumbnail" src="<?php the_sub_field('portrait_thumbnail'); ?>" alt="portrait thumbnail"></div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<script>
		jQuery(function($) {			
			$( ".portrait-thumbnail" ).click(function() {
				$(".portrait-thumbnail").removeClass('active');
				$( this ).addClass('active');
				$(".testimonial").hide();
				var t = ".testimonial-"+$( this ).data('testimonial');
			  	$(t).show();
			});
			$(".portrait-thumbnail[data-testimonial='1']").click();
		});
	</script>
	<?php endif; ?>
	<?php if( get_field('photo_paper')['header'] ): $photo_paper = get_field('photo_paper'); ?>
	<style>
		.black-white-bg{
			background: linear-gradient(to bottom, black 0%,black <?php echo $photo_paper['background_gradient_percentage_mobile'] ?>,#000000 <?php echo $photo_paper['background_gradient_percentage_mobile'] ?>,white <?php echo $photo_paper['background_gradient_percentage_mobile'] ?>,white 100%); /* W3C */
		}
		@media (min-width:50em) {
			.split{
				flex-direction:row;
			}
			
			.split > *{
				flex-basis: 100%;
			}
			.split > * + * {
				margin-left:2em;
			}

			.black-white-bg{
				background: linear-gradient(to bottom, black 0%,black <?php echo $photo_paper['background_gradient_percentage_desktop'] ?>,#000000 <?php echo $photo_paper['background_gradient_percentage_desktop'] ?>,white <?php echo $photo_paper['background_gradient_percentage_desktop'] ?>,white 100%); /* W3C */
			}
			
		}

	</style>
	<section class="black-white-bg vertical-padding-2">
		<div class="container center-text">
			<div class="contain-text-l  margin-bottom-2">
				<img src="<?php echo $photo_paper["logo"] ?>" style="margin:auto;display:block;width:unset;" class="margin-bottom-1">
				<h2 class="text-white"><?php echo $photo_paper['header'] ?></h2>
				<p class="text-white margin-bottom-2"><?php echo $photo_paper['text'] ?></p>
				<div class="split">
					<div>
						<div class="surface  margin-bottom-1">
							<div class="overlay-container margin-bottom-1">
								<img src="<?php echo $photo_paper['image_1'] ?>" alt="<?php echo $photo_paper['name_1'] ?>">
								<div class="overlay">
									<p><?php echo $photo_paper['overlay_text_1'] ?></p>
								</div>
							</div>
							<p><?php echo $photo_paper['name_1'] ?></p>						
						</div>
					</div>
					<div>
						<div class="surface  margin-bottom-1">
							<div class="overlay-container margin-bottom-1">
								<img src="<?php echo $photo_paper['image_2'] ?>" alt="<?php echo $photo_paper['name_2'] ?>">
								<div class="overlay">
									<p><?php echo $photo_paper['overlay_text_2'] ?></p>
								</div>
							</div>
							<p><?php echo $photo_paper['name_2'] ?></p>						
						</div>
					</div>
					<div>
						<div class="surface  margin-bottom-1">
							<div class="overlay-container margin-bottom-1">
								<img src="<?php echo $photo_paper['image_3'] ?>" alt="<?php echo $photo_paper['name_3'] ?>">
								<div class="overlay">
									<p><?php echo $photo_paper['overlay_text_3'] ?></p>
								</div>
							</div>
							<p><?php echo $photo_paper['name_3'] ?></p>						
						</div>
					</div>
				</div>
			</div>
			<a href="<?php echo $photo_paper['button_link'] ?>" target="<?php echo $photo_paper['button_target'] ?>" class="button margin-bottom-1"><?php echo $photo_paper['button_text'] ?></a>
			<p class="button-notes" style="font-size:.75rem;"><?php echo $photo_paper['button_notes'] ?></p>			
		</div>
	</section>
	<?php endif; ?>
	<?php 
	if( get_field('technology')['header'] ): 
		$tech = get_field('technology'); 
		$tech_1 = $tech['tech_1']; 
		$tech_2 = $tech['tech_2']; 
		$tech_3 = $tech['tech_3']; 
	?>
	<section class="lightgrey-bg">
		<div class="container vertical-padding-2">
			<h2 class="center-text margin-bottom-2"><?php echo $tech['header']; ?></h2>
			<div class="split">
				<div class="tech-images margin-bottom-1">
					<img src="<?php echo $tech_1['image'] ?>" alt="<?php echo $tech_1['image_alt'] ?>" class="tech-1">
					<img src="<?php echo $tech_2['image'] ?>" alt="<?php echo $tech_2['image_alt'] ?>" class="tech-2">
					<img src="<?php echo $tech_3['image'] ?>" alt="<?php echo $tech_3['image_alt'] ?>" class="tech-3">
				</div>
				<div>
					<div class="tech-copy margin-bottom-1" style="max-width: 28ch;">
						<div class="tech-1">
							<h3 class="red-text"><?php echo $tech_1['name'] ?></h3>
							<p class="margin-bottom-2"><?php echo $tech_1['text'] ?></p>
						</div>
						<div class="tech-2">
							<h3 class="red-text"><?php echo $tech_2['name'] ?></h3>
							<p class="margin-bottom-2"><?php echo $tech_2['text'] ?></p>
						</div>
						<div class="tech-3">
							<h3 class="red-text"><?php echo $tech_3['name'] ?></h3>
							<p class="margin-bottom-2"><?php echo $tech_3['text'] ?></p>
						</div>
					</div>
					<div class="tech-options">
						<div class="tech-1-option">
							<img class="margin-bottom-1" src="<?php echo $tech_1['thumbnail'] ?>" alt="technology thumbnail">
							<p><?php echo $tech_1['name'] ?></p>
						</div>
						<div class="tech-2-option">
							<img  class="margin-bottom-1" src="<?php echo $tech_2['thumbnail'] ?>" alt="technology thumbnail">
							<p><?php echo $tech_2['name'] ?></p>
						</div>
						<div class="tech-3-option">
							<img  class="margin-bottom-1" src="<?php echo $tech_3['thumbnail'] ?>" alt="technology thumbnail">
							<p><?php echo $tech_3['name'] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
</section>

<script>	
	jQuery(function($) {
		

		$( ".tech-1-option" ).click(function() {
			$('.tech-options>div').removeClass('active');
			$('.tech-2').hide();
			$('.tech-3').hide();
			$('.tech-1').show();
			$(this).addClass('active');
		});
		$( ".tech-2-option" ).click(function() {
			$('.tech-options>div').removeClass('active');
			$('.tech-1').hide();
			$('.tech-3').hide();
			$('.tech-2').show();
			$(this).addClass('active');
		});
		$( ".tech-3-option" ).click(function() {
			$('.tech-options>div').removeClass('active');
			$('.tech-2').hide();
			$('.tech-1').hide();
			$('.tech-3').show();
			$(this).addClass('active');
		});

		$( ".tech-1-option" ).click();
		$(".tech-images").show();
		$(".tech-options").css("display","flex");

		$(window).scroll(function(){
		  var sticky = $('.sticky'),
		      scroll = $(window).scrollTop();

		  if (scroll >= 100) sticky.addClass('fixed');
		  else sticky.removeClass('fixed');
		});

		var mowl = jQuery('.m-owl-carousel');
		mowl.owlCarousel({
		    items:1,
		    loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:4000,
		    autoplayHoverPause:true,
		    dots:true,
		});
		var towl = jQuery('.t-owl-carousel');
		towl.owlCarousel({
		    items:5,
		    loop:false,
		    margin:10,
		    autoplay:false,
		    dots:false,
		    nav:true,
		    navText : ["<i class='fas fa-caret-left'></i>","<i class='fas fa-caret-right'></i>"],
		    responsive : {
			    // breakpoint from 0 up
			    0 : {
			        items:3,
			    },
			    // breakpoint from 480 up
			    400 : {
			        items:4,
			    },	
			    600 : {
			        items:5,
			    },			
			    
			}
		});
	});
</script>
<?php get_footer(); ?>