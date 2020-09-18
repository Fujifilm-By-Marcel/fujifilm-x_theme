<?php
/*
Template Name: Page-event-registration
*/
function page_usa_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('fps-css', get_stylesheet_directory_uri().'/en-us/css/event-registration.css',array(),'1.0.9');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 	
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 
 ?>

<style>

	@media screen and (max-width: 767px), print{
		img {
		    width: initial;
		    display: initial;
		}
	}
	h1{
		font-size:4.25em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	h1 img{
		position: relative;
    	top: -16px;
	}


	h2{
		font-size:2.8125em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	h2 img{
		position: relative;
    	top: -8px;
	}
	
	h3{
		font-size:1.6em;		
		line-height:normal;
		margin-bottom: 16px;
		font-weight:bold;
	}
	h4{
		font-size:1.4em;
		font-family: "Fjalla One", sans-serif;
		line-height:normal;
		margin-bottom: 16px;
		text-transform: uppercase;
	}
	p{
		margin-bottom:16px;
		line-height: normal;
	}



	.section-1{
		background:#000;
		color:#fff;
		padding:90px 0 74px;
	}

	.section-2{
		padding:45px 0;
	}

	.section-2 h2{
		color:#e4032f;
	}

	.section-3-1, .section-3-2{
		background:#dad7d7;	
		overflow: hidden;
		padding:20px 30px;
		margin-bottom:60px;
	}


	.instruction-repeater{
		text-align: center;
    	max-width: 275px;
    	margin: auto;
	}
	.instruction-repeater .instruction{
		font-size:1em;
	}
	.instruction-repeater .instruction-2{
		font-size:.8em;
	}
	.instruction-repeater .image-container{
		/*width:56px;*/
		height:56px;
		margin:auto;
		margin-bottom:16px;
	}

	.team-member{
		text-align:center;
		font-family: "Fjalla One", sans-serif;
	}
	.team-member img{
		margin-bottom:10px;
	}

	.expander-button {
		position: relative;
	}

	.expander-button .svg-container{
		width:18px;
		height:18px;
		margin:auto;

		position: absolute;
		right: 0;
		top: 50%;
		transform: translateY(-50%);
	}

	.expander-area{
		margin-top:16px;
	}

	.flex-wrap-row{
		display: flex;
	    flex-wrap: wrap;
	    flex-direction: row;
	}
	.flex{
		display: flex;
	}

	.marker{position:relative;}

 	/* responsive banner */
	@media (min-width:1501px){
		.instruction-repeater h3 span{
			margin-left: -100%;
    		margin-right: -100%;
    		text-align: center;
		}
	}
	@media (min-width:601px){
		.main{font-size:16px;}
		.marker{z-index:3;}
		.expander-button .svg-container{display:none;}
		.expander-button h2 {margin:0;}
		.expander-button {cursor:default;}
	}
	@media (max-width:600px){
		.main{font-size:14px;}
		.marker{z-index:2;}
		.expander-button .svg-container{display:block;}
		.expander-button h2 {margin:0 18px 0 0;}
		.expander-button {cursor:pointer;}

	}
</style>
<section class="main">

	<section class="header-image">
		<div class="row">
			<?php
			$imgsrc_desktop = wp_get_attachment_image_src( get_field('desktop_banner'), 'full' );
			$imgsrcset_desktop = wp_get_attachment_image_srcset( get_field('desktop_banner'), 'full' );
			$imgsrc_mobile = wp_get_attachment_image_src( get_field('mobile_banner'), 'full' );
			$imgsrcset_mobile = wp_get_attachment_image_srcset( get_field('mobile_banner'), 'full' );
			?>
			<img class="hero-banner desktop" src="<?php echo $imgsrc_desktop[0]; ?>" width="<?php echo $imgsrc_desktop[1]; ?>" height="<?php echo $imgsrc_desktop[2]; ?>" srcset="<?php echo $imgsrcset_desktop; ?>" alt="<?php the_title() ?>">
			<img class="hero-banner mobile" src="<?php echo $imgsrc_mobile[0]; ?>" width="<?php echo $imgsrc_mobile[1]; ?>" height="<?php echo $imgsrc_mobile[2]; ?>" srcset="<?php echo $imgsrcset_mobile; ?>" alt="<?php the_title() ?>">
		</div>	
	</section>


	<?php if( have_rows('red_strip') ): ?>
    <?php while( have_rows('red_strip') ): the_row(); ?>
	<section class="red-strip">
		<div class="container">
			<div class="row">
				<p class="text line-1"><?php the_sub_field('line_1') ?></p>
				<p class="text line-2"><?php the_sub_field('line_2') ?></p>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('instructions_section') ): ?>
    <?php while( have_rows('instructions_section') ): the_row(); ?>
	<section class="section-2">
		<div class="container">
			<div class="row">
				<div class="col s12">					
					<h2 style="text-align:center;"><?php the_sub_field('header') ?></h2>
					<p style="text-align:center;"><?php the_sub_field('text') ?></p>
				</div>
			</div>
			<div class="row">
				<?php if( have_rows('instructions') ): ?>
				<?php while( have_rows('instructions') ): the_row(); ?>
				<div class="col s12 m12 l4">					
					<div class="instruction-repeater">		
						<div class="image-container">			
							<img src="<?php the_sub_field('image') ?>">
						</div>
						<h3 style="text-align:center;"><span><?php the_sub_field('header') ?></span></h3>
						<p class="instruction"><?php the_sub_field('instructions') ?></p>	
						<p class="instruction-2"><?php the_sub_field('instructions_2') ?></p>	
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>


	<section class="section-3">
		<div class="container">
			<div class="row flex-wrap-row">				
				<div class="col s12 m12 l12 xl6 flex">	
					<?php if( have_rows('team_section') ): ?>
    				<?php while( have_rows('team_section') ): the_row(); ?>
					<section class="section-3-1">
						<div class="expander-button" data-expander="team">
							<h2><?php the_sub_field('header') ?></h2>
							<div class="svg-container">
								<svg class="opened-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12">
								    <path fill="#FFF" d="M272.5 37.901L283.506 31.048 283.506 28.536 272.5 21.7 272.5 25.716 279.609 29.732 279.609 29.869 272.5 33.902z" transform="rotate(90 155.503 -116.7)"/>
								</svg>
								<svg class="closed-svg" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 16 24">
								    <path fill="#FFF" d="M575 54.145L590.723 44.354 590.723 40.766 575 31 575 36.737 585.156 42.475 585.156 42.67 575 48.432z" transform="translate(-575 -31)"/>
								</svg>
							</div>
						</div>	
						<div class="expander-area" data-expanded="true" data-expander="team">
							<h3><?php the_sub_field('subheader') ?></h3>
							<p><?php the_sub_field('text') ?></p>
							<div class="row">
								<div class="team-repeater">
								<?php if( have_rows('lenses') ): ?>
    							<?php while( have_rows('lenses') ): the_row(); ?>								
									<div class="col s6 m4">	
										<div class="team-member">
											<img width="163" height="163" src="<?php the_sub_field('image') ?>">
											<p><?php the_sub_field('name') ?></p>
										</div>
									</div>								
								<?php endwhile; ?>
								<?php endif; ?>
								</div>
							</div>
							<h3><?php the_sub_field('subheader_2') ?></h3>
							<p><?php the_sub_field('text_2') ?></p>
							<div class="row">
								<div class="team-repeater">
								<?php if( have_rows('team') ): ?>
    							<?php while( have_rows('team') ): the_row(); ?>								
									<div class="col s6 m4">	
										<div class="team-member">
											<img width="163" height="163" src="<?php the_sub_field('image') ?>">
											<p><?php the_sub_field('name') ?></p>
										</div>
									</div>								
								<?php endwhile; ?>
								<?php endif; ?>
								</div>
							</div>
							<h4 style="text-align:center;"><?php the_sub_field('footer_text') ?></h4>
						</div>						
					</section>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				
				<div class="col s12 m12 l12 xl6">	
					<?php if( have_rows('schedule_section') ): ?>
    				<?php while( have_rows('schedule_section') ): the_row(); ?>
					<section class="section-3-2">
						<div class="expander-button" data-expander="call">
							<h2><?php the_sub_field('header') ?></h2>
							<div class="svg-container">
								<svg class="opened-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12">
								    <path fill="#FFF" d="M272.5 37.901L283.506 31.048 283.506 28.536 272.5 21.7 272.5 25.716 279.609 29.732 279.609 29.869 272.5 33.902z" transform="rotate(90 155.503 -116.7)"/>
								</svg>
								<svg class="closed-svg" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 16 24">
								    <path fill="#FFF" d="M575 54.145L590.723 44.354 590.723 40.766 575 31 575 36.737 585.156 42.475 585.156 42.67 575 48.432z" transform="translate(-575 -31)"/>
								</svg>
							</div>
						</div>
						<div class="expander-area" data-expanded="true" data-expander="call">
							<div class="calendar-widget" >
								<p><?php the_sub_field('text') ?></p>
								<!-- Calendly inline widget begin -->
								<div class="calendly-inline-widget" data-url="<?php the_sub_field('calendly') ?>" style="height:630px;margin-bottom:20px;"></div>
								<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
								<!-- Calendly inline widget end -->
								<h2><?php the_sub_field('header_2') ?></h2>
								<p><?php the_sub_field('text_2') ?></p>
							</div>
						</div>
					</section>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>				
			</div>
		</div>
	</section>

	<?php if( have_rows('faq_section') ): ?>
    <?php while( have_rows('faq_section') ): the_row(); ?>
	<section class="faq">
		<div class="container">
			<div class="row">
				<div class="col s12">					
					<h2 style="text-align:center;"><?php the_sub_field('header') ?></h2>					
				</div>
			</div>
			<div class="row flex-wrap-row">
				<?php if( have_rows('faq') ): ?>
    			<?php while( have_rows('faq') ): the_row(); ?>			
				<div class="col s12 m12 l12 xl6 flex">					
					<div class="faq">
						<h3><?php the_sub_field('header') ?></h3>
						<p><?php the_sub_field('text') ?></p>
					</div>
				</div>				
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>		
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

</section>
<div class="marker"></div>
<script>
	jQuery(document).ready(function( $ ) {
		$(".expander-button").click(function(e){
			var marker = $(".marker").css("z-index");
			if(marker == 2){
				toggleExpander(e);
			}
		});

		function toggleExpander(e){
			var targetExpander = $(e.currentTarget).data("expander");

			$(".expander-area").each(function(){
				var currentExpander = $(this).data("expander")
				var expanded = $(this).data("expanded");				


				if( currentExpander == targetExpander ){
					//console.log("foundTarget");
					//console.log(expanded);
					if( expanded == true ){
						//console.log("true expanded");
						$(this).hide();
						$(this).data("expanded", false)
						$(e.currentTarget).find(".opened-svg").hide();
						$(e.currentTarget).find(".closed-svg").show();
					}
					else if( expanded == false ){
						//console.log("false expanded");
						$(this).show();
						$(this).data("expanded", true)
						$(e.currentTarget).find(".opened-svg").show();
						$(e.currentTarget).find(".closed-svg").hide();
					}
				}
			});
		}

		function clearLeft(){
			var marker = $(".marker").css("z-index");
			var teamRepeater = $(".team-repeater");
			teamRepeater.each(function(){
				var teamRepeaterRow = $(this);
				var cols = teamRepeaterRow.find(".col");

				$(cols).each(function(index){
					var col = $(this);
					if( index%marker == 0 ){
						col.css("clear","left");
					}
					else{
						col.attr("style","");
					}
				});
			});
		}

		function openDesktop(){
			var marker = $(".marker").css("z-index");
			if(marker == 3){
				$(".expander-area").each(function(){
					if($(this).data("expanded", false)){
						$(this).show();
						$(this).data("expanded", true)
						$(".opened-svg").show();
						$(".closed-svg").hide();
					}
				});
			}
		}

		$(window).resize(function(){
			clearLeft();
			openDesktop();
		});

		clearLeft();

	});
</script>
<?php get_footer(); ?>