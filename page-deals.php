<?php
/*
Template Name: Page-deals
*/
function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('tabs', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/tabs.css',array(),'1.0.1'); 
	wp_enqueue_style('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/jquery-slideshow.css',array(),'1.0.5');
	wp_enqueue_style('deals-css', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/deals.css',array(),'1.0.22'); 
}
function page_myfujifilmlegacy_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 
	wp_enqueue_script('tabs', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/tabs.js', array(), '1.0.12',true); 
	wp_enqueue_script('jquery-slideshow', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/jquery-slideshow.js', array(), '1.0.2',true);
	wp_enqueue_script('deals-js', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/deals.js', array(), '1.0.7',true);
}
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );

date_default_timezone_set('America/New_York');
function check_in_range($start_date, $end_date, $date_from_user){
	// Convert to timestamp
	$start_ts = strtotime($start_date);
	$end_ts = strtotime($end_date);
	$user_ts = strtotime($date_from_user);

	// Check that user date is between start & end
	return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}
function check_out_range($start_date, $end_date, $date_from_user){
	// Convert to timestamp
	$start_ts = strtotime($start_date);
	$end_ts = strtotime($end_date);
	$user_ts = strtotime($date_from_user);

	// Check that user date is between start & end
	return (($user_ts > $start_ts) && ($user_ts < $end_ts));
}
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">
<?php
//check if is before first promo
$isBeforePromo = 1;
$firstPromoStartDate = 0;
$dateRangeIndex = -1;
$countRange = 0;
$prevEndDate = 0;

if( have_rows('date_range') ):
	while ( have_rows('date_range') ) : the_row();		
		
		$startDate = get_sub_field('promotion_start_date');
		$endDate = get_sub_field('promotion_end_date');
		$date = new DateTime("now", new DateTimeZone('America/New_York') );
		$currentDate = $date->format('Y-m-d');	

		if( $date->getTimestamp() > strtotime($startDate) && $startDate != "" ){
			$isBeforePromo = 0;			
		}

		if( check_in_range($startDate, $endDate, $currentDate) ){
			$dateRangeIndex = $countRange;
		}
		
		if( check_out_range($prevEndDate, $startDate, $currentDate) ){
			$dateRangeIndex = $countRange-.5;	
		}

		$prevEndDate = $endDate;
		$countRange++;

	endwhile;
else :
endif;

if($dateRangeIndex == -1){
	$dateRangeIndex = $countRange-.5;
} 

?>

<section class="main">
	<div class="row">
		<?php
		
		$countRange = 0;

		if( have_rows('date_range') ):
			while ( have_rows('date_range') ) : the_row();
				
				if( $countRange == floor($dateRangeIndex) ) : 
				?>

					<h1><img class="deals-hero-banner desktop" src="<?php echo wp_get_attachment_image_url( get_sub_field('desktop_banner'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field('desktop_banner'), 'full' ); ?>" alt="<?php the_title() ?>"></h1>
					<h1><img class="deals-hero-banner mobile" src="<?php echo wp_get_attachment_image_url( get_sub_field('mobile_banner'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field('mobile_banner'), 'full' ); ?>" alt="<?php the_title() ?>"></h1>					
				<?php
				endif;	
				
				if( $countRange+.5 == $dateRangeIndex ) : 
				?>

					<div class="col s12">
					<p style="text-align:center;font-size:30px;"><?php echo get_sub_field("expired_text"); ?></p>
					</div>
				<?php
				endif;

				$countRange++;

			endwhile;
		else :
		endif;

		?>
	</div>	


		
	<div class="inner">
		<div class="container">
		<?php 
		//get if tabs active
		if( have_rows('date_range') ):
		while ( have_rows('date_range') ) : the_row();
			if (get_sub_field('hide_tab_filters')) { 
				$rowstyle = "style='display:none'";
			} 
			else{
				$rowstyle="";
			}
		endwhile;
		endif;		
		?>			
			<div class="row" <?php echo $rowstyle ?> >
				<div class="col s12">
					<div class="tab-filters">
						<ul>							
							<?php
							$countRange = 0;
							if( have_rows('date_range') ):
								while ( have_rows('date_range') ) : the_row();
									if( $countRange == $dateRangeIndex ) : 
										if( have_rows('tabs') ):
										?>
											<li class="tablinks defaultOpen" onclick="openTab(this, 'show-all')" >
												<div class="tablinks-container">
													Show All
												</div>
											</li>
										<?php
											$count = 0;
											while ( have_rows('tabs') ) : the_row();
												$count++;
												$tabid = "tabid-".$count;
											?>
												<li class="tablinks" onclick="openTab(this, '<?php echo $tabid; ?>')" >
													<div class="tablinks-container">
														<?php the_sub_field('title'); ?>
													</div>
												</li>
											<?php
											endwhile;
										else :
											// no rows found
										endif;									
									endif;	
								$countRange++;
								endwhile;
							else :
								// no rows found
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>
			
			<?php 
			//$date = new DateTime("now", new DateTimeZone('America/New_York') );
			//$currentDate = $date->format('Y-m-d');	

			//echo "Today is " . $date->format("m/d/Y") . "<br>";
			//echo "The time is " . $date->format("h:i:sa");			
			?>
			<?php
			$countRange = 0;
			if( have_rows('date_range') ):
				while ( have_rows('date_range') ) : the_row();
					if( $countRange == $dateRangeIndex ) : 
						if( have_rows('tabs') ):
							$count = 0;
							while ( have_rows('tabs') ) : the_row();
								$count++;
								$tabid = "tabid-".$count;
							?>
								
								<div id="<?php echo $tabid; ?>" class="tabcontent tab" >
									<div class="row">
										<div class="col s12">
											<h3 class="tab-header"><?php the_sub_field('title'); ?></h3>
										</div>
									</div>

									<?php  if( get_sub_field('add_subfilter') ): ?>

									<div class="row">
										<div class="tab-filters">
											<div class="col s12">
												<li class="tabfilters defaultOpen" onclick="filterTab(this, 'show-all', '<?php echo $tabid ?>');clearLeftRows($('.window-size-marker').css('z-index'));" >
													<div class="tablinks-container">
														Show All
													</div>
												</li>
												<li class="tabfilters" onclick="filterTab(this, 'lens', '<?php echo $tabid ?>');clearLeftRows($('.window-size-marker').css('z-index'));" >
													<div class="tablinks-container">
														Lenses
													</div>
												</li>
												<li class="tabfilters" onclick="filterTab(this, 'camera', '<?php echo $tabid ?>');clearLeftRows($('.window-size-marker').css('z-index'));" >
													<div class="tablinks-container">
														Cameras
													</div>
												</li>											
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php 
									$minheight = get_sub_field('title_rows')*30;
									$minheight = $minheight."px"; 
									?>	 						
									<div class="row deal-row">
										<?php
										if( have_rows('products') ):
											while ( have_rows('products') ) : the_row();
												//clean values
												$regularPriceFloat = floatval(str_replace(',', '', str_replace('$', '', get_sub_field('regular_price'))));
												$savingsFloat = floatval(str_replace(',', '', str_replace('$', '', get_sub_field('savings'))));
												$regularPriceFormatted = number_format($regularPriceFloat, 2);
												$savingsFormatted = number_format($savingsFloat, 2);
												$salePriceFormatted = number_format($regularPriceFloat-$savingsFloat, 2);
												?>												
												<div class="col s12 m6 l4 xl3">												 
													<div class="deal <?php echo implode( ' ', get_sub_field('subfilters') );  ?>" data-href="<?php the_sub_field('link'); ?>" >				
														<h3 class="deal-title" style="min-height:<?php echo $minheight; ?>"><?php the_sub_field('title'); ?></h3>															
														<div class="my-slideshow">
															<div class="slides-container">
																
																<?php																	
																if( have_rows('images') ):
																	while ( have_rows('images') ) : the_row();
																		?>
																		<div class="mySlide">
																			<img class="deal-img" src="<?php echo wp_get_attachment_image_url( get_sub_field("image"), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_sub_field("image"), 'full' ); ?>" />
																		</div>
																		<?php
																	endwhile;
																else :
																endif;
																?>
																<!-- Next and previous buttons -->
																<a class="myprev">&#10094;</a>
																<a class="mynext">&#10095;</a>
															</div>
															
															<div class="slideshow-nav">
																<br>
																<p><span class="swatch-active-color"></span></p>
																<?php
																//start gallery dots
																if( have_rows('images') ):
																	while ( have_rows('images') ) : the_row();
																		if(get_sub_field("swatch_label")) { 
																			?>
																			<span class="mydot" style="background-color:<?php the_sub_field("swatch_hex_color") ?>" title="<?php the_sub_field("swatch_label") ?>"></span> 
																			<?php
																		}
																	endwhile;
																else :
																endif;
																//end gallery dots
																?>
															</div>
														</div>
														<?php 
															$nowtext = "NOW";
															$wastext = "WAS";
															$savetext = "SAVE";
															if(get_sub_field("was_text_override")) {
																$wastext = get_sub_field("was_text_override");
															}
															if(get_sub_field("now_text_override")) { 															
																$nowtext = get_sub_field("now_text_override");
															}
															if(get_sub_field("save_text_override")) { 															
																$savetext = get_sub_field("save_text_override");
															}
														?>
														<p class="regular-price"><?php echo $wastext ?>: $<?php echo $regularPriceFormatted ?></p>
														<p class="sale-price"><?php echo $nowtext ?>: $<?php echo $salePriceFormatted ?></p>
														<p class="savings"><?php echo $savetext ?> $<?php echo $savingsFormatted ?> <?php the_sub_field("post_savings_text") ?></p>

														<?php if(get_sub_field("additional_incentive")) { ?>
														<p class="additional-incentive"><?php the_sub_field("additional_incentive") ?></p>
														<?php } ?>
														<div class="overlay"></div>

														<a href="https://fujifilm-x.com/en-us/shop/" target="_blank"><div class="cta-button">Find a Dealer</div></a>

													</div>
												</div>
												<?php
											endwhile; //products
										else :
										endif;
										?>
									</div>
									<div class="row">
										<div class="col s12">
											<p class="disclaimer"><?php the_sub_field('disclaimer') ?></p>
										</div>
									</div>
								</div>
								<?php
							endwhile; //tabs
							?>
							<div class="row">
								<div class="col s12">
									<p class="disclaimer"><?php the_sub_field('disclaimer') ?></p>
								</div>
							</div>
							<?php
						else :
						endif;									
					endif;		

					$countRange++;

				endwhile; //date range
			else :
			endif;
			?>			
		</div>
	</div>
	<div id="window-size-marker" class="window-size-marker" style="position:relative;"></div>	
</section>
<div id="sidepop-container">
	<a href="/en-us/shop/" target="_blank">
	 	<div class="sidepop-button">
	 		<span>Find a Dealer!</span>
	 	</div>
	</a>
</div>

<?php get_footer(); ?>