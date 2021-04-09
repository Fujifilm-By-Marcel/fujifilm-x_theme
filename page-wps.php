<?php
/*
Template Name: Page-wps
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
	/*z-index: 10;*/
}

@media screen and (max-width: 767px), print{
	img {
		width:auto;
	}
}

:root{
	--red-color: #e4022e;
	--wine-color: #D01663;
	--grey-color: #efefef;
	--darkgrey-color: #d8d8d8;
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

.margin-bottom-0{
	margin-bottom:0 !important;
}
.margin-bottom-1{
	margin-bottom:1rem !important;
}
.margin-bottom-2{
	margin-bottom:2rem !important;
}

.main p, .main h1, .main h2, .main h3, .main h4, .main h5{
	line-height:normal;
	margin-bottom:1rem;
}
.main h1, .main h2, .main h3, .main h4, .main h5{
	font-family: var(--accent-font);
}
.main h2{
	font-size:2.125rem;
}
.main h3{
	font-size:1.375rem;
}
.main h4{
	font-size:1.125rem;
	text-transform: uppercase;
}
.main h5{
	font-size:.925rem;
	text-transform: uppercase;
}
.main .expander h3{
	font-size: 1.125rem;
}
.main .print-options-section p{
	font-size:.875rem;
}
.main p.emphasize{
	font-size:1.125rem;
}
.main p.small{
	font-size:.875rem;
}
.main .promo-text{
	font-size:1rem;
	margin:.25rem auto;
}
.main .button {
  background-color: var(--red-color);
  border: none;
  color: white;
  padding: .25em 1.25em;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1rem;
  cursor: pointer;
  font-family: var(--accent-font);
}

.desktop-only{
	display:none;
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

@media (min-width:50em) {
	.main h2{
		font-size:3.25rem;
	}
	.main h3{
		font-size:1.8rem;
	}
	.main h4{
		font-size:1.35rem;
	}
	.main h5{
		font-size:1.3rem;
	}
	.main .expander h3{
		font-size:1.575rem;
	}
	.main .print-options-section p{
		font-size:1.35rem;
	}
	.main .expander p{
		font-size:1.3rem;
	}
	.main p.emphasize{
		font-size:1.35rem;
	}
	.main p.small{
		font-size:.9rem;
	}
	.main .promo-text{
		font-size:1.35rem;
	}
	.main .button.emphasize-desktop {
		font-size:1.35rem;
	}
	.desktop-only{
		display:block !important;
	}
	.mobile-only{
		display:none !important;
	}
	.desktop-left-text{
		text-align:left;
	}
	.desktop-right-text{
		text-align:right;
	}
}

.red-text{
	color: var(--red-color);
}
.wine-text{
	color: var(--wine-color);
}

.red-bg{
	background: var(--red-color);
	color:white;
}
.wine-bg{
	background: var(--wine-color);
	color:white;
}
.wine-bg .option-button.active{
	color: var(--wine-color);
}
.wine-bg .red-text{
	color: white;
}
.wine-bg .button{
	background: black;
}
.white-bg .option-button.active{
	background: var(--grey-color);
}

.grey-bg{
	background: var(--grey-color);	
}

.contain-text-s{
	max-width:15ch;
	margin:auto;
}
.contain-text-m{
	max-width:26ch;
	margin:auto;
}
.contain-text-l{
	max-width:30ch;
	margin:auto;
}

.vertical-padding-2{
	padding:2.875rem 0;
}

.vertical-padding-3{
	padding:3.125rem 0;
}

.center-vertically{
	display:flex;
	flex-direction: column;
    justify-content: center;
}

.split{
	display: flex;
	flex-direction: column;
	align-items:center;
}

@media (min-width:50em) {
	.split{
		flex-direction:row;
	}
	.split.reverse{
		flex-direction:row-reverse;
	}
	
	.split > *{
		flex-basis: 100%;
	}
	.split > * + * {
		margin-left:2em;
	}
	.split.reverse > * + * {
		margin-left:0;
		margin-right:2em;
	}	
}

.owl-carousel-parent{
	padding:0 20px;
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
	color: white;
}

#pagetop{
	display: none;
}
.footer{
	margin-top:0;
}
.fixed {
    position: fixed;
    top:0; left:0;
    width: 100%; 
    z-index: 11;
}
.expander-button{
	cursor:pointer;
}
.expander-button i{
	font-size: 2rem;
    padding: 0 .2em;
    vertical-align: middle;
    position: relative;
    top: -3px;
}


.options{
	display:flex;
	justify-content:center;
}
.option-button{
	font-size:1rem;
	line-height:1;
	max-width:50%;
	text-align:center;
	padding:.375em .5em;
	display: flex;
	align-items: center;
	justify-content:center;
	flex-basis:0;
	min-width:7ch;
	text-transform: uppercase;
	cursor:pointer;
}
.options > * + * {
	margin-left:1em;
}
.option-button.active{
	background:white;
	border-radius: 3px;
	font-weight:bold;

}
.print-options-section img{
	margin:auto;
	display: block;
}

.wps-logo{
	max-width: min(350px, 100%);
	margin:auto
}
.main p>a{text-decoration: underline;}
</style>
<section class="main">

	<?php if( get_field('promo_text') ) : ?>
	<section class="red-bg sticky center-text">
		<div class="container">
			<p class="promo-text"><?php the_field('promo_text'); ?></p>
		</div>
	</section>
	<?php endif; ?>


	<?php if( get_field('wps_logo') ) : ?>
	<section class="vertical-padding-2 center-text">
		<div class="container">
			<img class="wps-logo margin-bottom-2" src="<?php the_field('wps_logo'); ?>" alt="Wonder Photo Shop Logo">
			<h2><?php the_field('header'); ?></h2>
			<p class="emphasize contain-text-l"><?php the_field('text'); ?></p>
		</div>
	</section>
	<?php endif; ?>

	<?php 
	if( get_field('wine_section')['header'] != "" ) : 
		$ws = get_field('wine_section'); 
		$c = $ws['carousel'];  	?>
	<section class="wine-bg vertical-padding-2 center-text">
		<div class="container">
			<h3 class="margin-bottom-2" ><?php echo $ws['header']; ?></h3>
			<?php if( count($c) > 0 ) {  ?>
			<div class="owl-carousel-parent">
				<div class="owl-carousel owl-theme">
					<?php foreach( $c as $e ) {	?>
					<div class="contain-text-s">
						<img class="margin-bottom-1" src="<?php echo $e['image']; ?>" style="width:38px;margin:auto;display:block;">
						<h4><?php echo $e['header']; ?></h4>
						<p class="small"><?php echo $e['text']; ?></p>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
	<?php endif; ?>


	<?php if( get_field('print_options') ) :  $print_options = get_field('print_options');
	$i=0; foreach( $print_options as $p ) { $i++;	?>
	<section class="print-options-section <?php echo $p['section_class']; ?> vertical-padding-2" >
		<div class="container">
			<div class="split <?php if($p['reverse_row']) { echo "reverse"; } ?> margin-bottom-1">
				<div>
					<h2 class="center-text desktop-left-text"><?php echo $p['header']; ?></h2>
					<img class="margin-bottom-1 mobile-only" src="<?php echo $p['image']; ?>" alt="<?php echo $p['image_alt']; ?>">
					<p class="center-text margin-bottom-2 desktop-left-text"><?php echo $p['text']; ?></p>

					<?php if( is_array($p['options']) ){ ?>
					<div class="split margin-bottom-1">						
						<?php foreach ($p['options'] as $o){ ?>
						<div class="margin-bottom-1">
							<h5 class="center-text desktop-left-text"><?php echo $o['header'] ?></h5>
							<p class="small center-text desktop-left-text"><?php echo $o['text'] ?></p>
							<?php if( $o['button_text'] != "" ){ ?>
								<div class="center-text desktop-left-text"><a href="<?php echo $o['button_href']; ?>" target="<?php echo $o['button_target']; ?>" class="button"><?php echo $o['button_text']; ?></a></div>
							<?php } ?>
						</div>
						<?php } ?>						
					</div>
					<?php } ?>

					<?php if( $p['expander']['header'] != "" ) { $ex = $p['expander']; ?>
					<h4 class="expander-button center-text margin-bottom-2 desktop-left-text"><?php echo $ex['header'] ?><i style="display: none;" class="fas fa-caret-up red-text"></i><i class="fas fa-caret-down red-text"></i></h4>
					<?php } ?>
				</div>
				<div class="desktop-only">
					<img class="margin-bottom-1" src="<?php echo $p['image']; ?>" alt="<?php echo $p['image_alt']; ?>">
				</div>
			</div>
			<?php if( $p['expander']['header'] != "" ) { ?>
			<div class="expander" style="display: none;">	
				<div class="split">
					<div class="desktop-only">
						<div class="option-set-<?php echo $i; ?>">
							<?php $j=0; foreach( $ex['options'] as $o ) { $j++; ?>
							<img class="margin-bottom-1 option option-<?php echo $j; ?>" src="<?php echo $o['image']; ?>" alt="<?php echo $o['image_alt']; ?>">
							<?php } ?>
						</div>
					</div>
					<div>
						<h5 class="center-text"><span class="mobile-only">tap to preview STYLE</span><span class="desktop-only">select preview style</span></h5>
						<div class="options options-selector-set-<?php echo $i; ?> margin-bottom-1">
							<?php $j=0; foreach( $ex['options'] as $o ) { $j++; ?>
							<div class="option-button" data-optionset="<?php echo $i; ?>" data-option="<?php echo $j; ?>"><span><?php echo $o['header'] ?></span></div>
							<?php } ?>
						</div>
						<div class="option-set-<?php echo $i; ?>">
							<?php $j=0; foreach( $ex['options'] as $o ) { $j++; ?>
							<div style="display:none" class="option option-<?php echo $j; ?>">									
								<div>
									<img class="margin-bottom-1 mobile-only" src="<?php echo $o['image']; ?>" alt="<?php echo $o['image_alt']; ?>">
									<p><?php echo $o['text']; ?></p>
									<div class="center-text desktop-right-text"><a href="<?php echo $o['button_href']; ?>" target="<?php echo $o['button_target']; ?>" class="button emphasize-desktop"><?php echo $o['button_text']; ?></a></div>
								</div>							
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		
			<?php } ?>
		</div>
	</section>
	<?php } 
	endif; ?>

</section>
<script>	
	jQuery(function($) {
		
		/*
		$( "" ).click(function() {
			
		});
		*/
		$( ".option-button" ).click(function() {
			let optionset = $(this).data('optionset');
			let option = $(this).data('option');
			$('.options-selector-set-'+optionset+" .option-button").removeClass('active');
			$(this).addClass('active');
			$(".option-set-"+optionset+" .option").hide();			
			$(".option-set-"+optionset+" .option-"+option).show();
		});

		$('.options .option-button:first-child').click();

		$( ".expander-button" ).click(function() {
			if( $(this).hasClass('active') ){
				$(this).parent().parent().next().hide();
				$(this).find('.fa-caret-up').hide();
				$(this).find('.fa-caret-down').show();
				$(this).removeClass('active');
			} else {
				$(this).parent().parent().next().show();				
				$(this).find('.fa-caret-up').show();
				$(this).find('.fa-caret-down').hide();
				$(this).addClass('active');
			}

		});
		
		$(window).scroll(function(){
		  var sticky = $('.sticky'),
		      scroll = $(window).scrollTop();

		  if (scroll >= 100) sticky.addClass('fixed');
		  else sticky.removeClass('fixed');
		});
		
		
		
		var owl = jQuery('.owl-carousel');
		owl.owlCarousel({
		    items:3,
		    margin:10,
		    autoplay:true,
		    loop:true,
		    dots:true,
		    nav:true,
		    autoplayTimeout:4000,
		    
		    autoplayHoverPause:true,
		    navText : ["<i class='fas fa-caret-left'></i>","<i class='fas fa-caret-right'></i>"],
		    responsive : {
			    // breakpoint from 0 up
			    0 : {
			        items:1,
			    },
			    // breakpoint from 480 up
			    600 : {
			        items:2,
			    },			
			    768 : {
			        items:3,
			        autoplay:false,
			        loop:false,
			    },			
			}
		});
		
	});
</script>
<?php get_footer(); ?>