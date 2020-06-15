<?php
/*
Template Name: Page-HotSummerDeals
*/


function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.0');	
	wp_enqueue_style('tabs', get_stylesheet_directory_uri().'/en-us/css/tabs.css',array(),'1.0.1'); 
}
function page_myfujifilmlegacy_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
	wp_enqueue_script('tabs', get_stylesheet_directory_uri().'/en-us/js/tabs.js', array(), '1',true); 
}

add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );



?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">
<style>

.tab-header{
	font-family: "Fjalla One", sans-serif;
	text-align: center;
	margin-bottom:.8em;
}

.summer-deal{
	background-color:#f6f6f6;
	text-align:center;
	padding: 1em 0 0;
	margin-bottom:40px;
}
.summer-deal .deal-title{
	font-family: "Fjalla One", sans-serif;
	margin-bottom:.8em;
}
.summer-deal .deal-img{
	margin-bottom:.8em;
}
.summer-deal .regular-price{
	font-family: noto-sans-condensed, sans-serif;
}
.summer-deal .sale-price{
	font-family: "Fjalla One", sans-serif;
	margin-bottom:.8em;
}
.summer-deal .savings{
	background-color:#e62d36;
	width:100%;
	color:#fff;
	font-family: "Fjalla One", sans-serif;
}



@media (min-width:768px) { 
	.tab-header{
		font-size:48px;
		line-height:52px;
	}
	.summer-deal .deal-title{
		font-size:24px;
		line-height:28px;
	}		
	.summer-deal .regular-price{
		font-size:18px;
		line-height:22px;
	}
	.summer-deal .sale-price{
		font-size:18px;
		line-height:22px;
	}
	.summer-deal .savings{
		font-size:30px;
		line-height: 34px;
		padding: 6px 0;
	}
}
@media (max-width:767px) { 
	.tab-header{
		font-size:40px;
		line-height:44px;
	}
	.summer-deal .deal-title{
		font-size:22px;
		line-height:26px;
	}		
	.summer-deal .regular-price{
		font-size:16px;
		line-height:20px;
	}
	.summer-deal .sale-price{
		font-size:16px;
		line-height:20px;
	}
	.summer-deal .savings{
		font-size:24px;
		line-height: 28px;
		padding: 6px 0;
	}
}


.hot-summer-deals-hero-banner{
	margin-bottom:20px;
}

@media (min-width:601px){
	.hot-summer-deals-hero-banner.desktop{
		display:block;
	}
	.hot-summer-deals-hero-banner.mobile{
		display:none;
	}
}
@media (max-width:600px){
	.hot-summer-deals-hero-banner.desktop{
		display:none;
	}
	.hot-summer-deals-hero-banner.mobile{
		display:block;
	}
}

</style>


<main class="main">
	<div class="row">
		<img class="hot-summer-deals-hero-banner desktop" src="<?php echo wp_get_attachment_image_url( 15244, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15244, 'full' ); ?>" alt="Hot Summer Deals">
		<img class="hot-summer-deals-hero-banner mobile" src="<?php echo wp_get_attachment_image_url( 15246, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15246, 'full' ); ?>" alt="Hot Summer Deals">
	</div>
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="tab-filters">
						<ul>
							<li class="tablinks" onclick="openTab(event, 'show-all')" id="defaultOpen">Show All</li>
							<li class="tablinks" onclick="openTab(event, 'lenses')" >Lenses</li>
							<li class="tablinks" onclick="openTab(event, 'cameras')" >Cameras</li>
							<li class="tablinks" onclick="openTab(event, 'gfx')" >GFX</li>
							<li class="tablinks" onclick="openTab(event, 'x-series')" >X Series</li>
							<li class="tablinks" onclick="openTab(event, 'highest-price')" >Highest Price</li>
							<li class="tablinks" onclick="openTab(event, 'lowest-price')" >Lowest Price</li>							      
						</ul>
					</div>
				</div>
			</div>
			<div id="lenses" class="tabcontent tab" >	
				<div class="row">
					<div class="col s12">
						<h3 class="tab-header">Lenses</h3>
					</div>
				</div>
				<div class="row">
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
				</div>
			</div>
			<div id="cameras" class="tabcontent tab" >	
				<div class="row">
					<div class="col s12">
						<h3 class="tab-header">Cameras</h3>
					</div>
				</div>
				<div class="row">
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
					<div class="col s6 m4 l3">
						<div class="summer-deal">
							<h3 class="deal-title">Camera Model</h3>
							<img class="deal-img" src="<?php echo wp_get_attachment_image_url( 15245, 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( 15245, 'full' ); ?>">
							<p class="regular-price">WAS: $XXXX.XX</p>
							<p class="sale-price">NOW: $XXXX.XX</p>
							<p class="savings">SAVE $XXX</p>
						</div>
					</div>
				</div>
			</div>
				
			
			<div class="row">
				<div class="col s12">
					<p class="disclaimer">The FUJIFILM GFX System and X Series Camera Body and Camera Kit Product Savings and Promotional Offers are effective from XXX - XXX or while dealer supplies last. Note that these promotional offers may not be combined with any other promotional offers that may be running at the same time relating to the same products. Not applicable to any rain check or back orders. Offers valid on products specified only. No product substitutions are permitted. Promotional offer details may vary be dealer; see dealer for exact products, pricing, and offer terms and limitations. Prices specified in these materials are suggested retail prices. Actual retailing selling prices may vary and are determined by Fujifilm dealer at the time of sale. Price excludes sales tax and any applicable dealer charges. Offers are void where prohibited.</p>
				</div>
			</div>
			
		</div>
	</div>
	
	<a href="#wrap" id="pagetop"></a>
</main>

<?php get_footer(); ?>