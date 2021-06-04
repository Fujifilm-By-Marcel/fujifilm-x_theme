<?php
/*
Template Name: fnac-brand-guidelines
*/
function page_usa_styles(){
	//wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.9');
	//wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.carousel.min.css',array(),'1.0.5');
	//wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css',array(),'1.0.5');
}
function page_usa_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 	
	//wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/en-us/fnac-assets/OwlCarousel2-2.3.4/owl.carousel.min.js', array(), '1.0.1',true); 
}
add_action( 'wp_enqueue_scripts', 'page_usa_styles' );
add_action( 'wp_enqueue_scripts', 'page_usa_scripts' );

 get_header(); 
 get_sidebar(); 

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

} 
?>
<style>
	:root{
		--grey-color: #dfdfdf;
		--red-color: #FB0020;
		--green-color: #409d27;		
		--accent-font: "Fjalla One", sans-serif;
	}
	.content img{
		width:auto !important;
		display: inline-block;
	}

	/* fonts */
	.wp_content h2{
		font-size:2.25rem;
		border-bottom-color: var(--red-color);
		padding-bottom:.3rem;
		margin-bottom:1.8rem;
		margin-top:0;
	}
	.wp_content h2:before{
		background:transparent;
	}
	.wp_content h5{
		margin-bottom:0;
		font-size:1rem;
	}
	.wp_content p{
		margin-bottom:1rem;
		line-height:normal;
		font-size:1rem;
	}
	html{
		font-size:14px;
	}

	/*layout*/
	#pagetop{
		display: none;
	}
	.footer{
		z-index: 10;
    	position: relative;
	}
	.tab{
		padding-top:2.75rem;
		padding-bottom:2.75rem;
	}
	.row{
		max-width: min(680px,90%);
		margin: auto;
	}
	.split{
		display: flex;
		flex-direction: column;
	}
	.lower__first .inner{
		padding-top:0;
	}
	.wp_content{
		margin-bottom:0;
		padding-bottom:1.8rem !important;
	}
	.content .tab:first-child{
		padding-top: 90px;
	}
	.wp_content table {
	    margin-bottom: 0 !important;
	}
	

	/* menu */	
	#my-menu{
    	font-family: var(--accent-font);
    	margin:1.375rem 2rem;
    	max-height:32px;
    	overflow:hidden;
    	transition:.25s max-height;
	}
	#my-menu.active{
		max-height:1000px;		
	}
	#my-menu a{
		text-decoration: none;
	}
	#my-menu > *{
		color:white;
		font-size: 1rem;
		color: rgba(255, 255, 255, 0.5);
		
	}
	#my-menu > *.active{
		color: white;
		font-size: 1.25rem;
	}
	#my-menu .logo{
		padding-top: 3px;
		max-width:58px !important;
		float:left;
	}
	#my-menu .menu-item{
		text-transform: uppercase;
		text-align:right;
		margin-bottom:1.75rem;
	}

	#my-menu .menu-item{
		display:none;
	}
	#my-menu .menu-item.active{
		display:block;
	}
	#my-menu.active .menu-item{
		display:block;
	}
	#my-menu .show-more{
		position: absolute;
	    right: 32px;
	    bottom: 0;
	    background: black;
	    border-radius: 0 0 50px 50px;
	    width: 30px;
	    transform: translatey(50%);
	    text-align: center;
	}
	#my-menu .show-more i{
		position: relative;
    	transform: translatey(20%);
    	cursor:pointer;
    	padding: 0 9px;
    	display:none;
    }
    #my-menu .show-more i.fa-caret-down{
    	display:inline-block;
    }
    #my-menu.active .show-more i.fa-caret-down{
    	display:none;
    }
    #my-menu.active .show-more i.fa-caret-up{
    	display:inline-block;
    }

	/* components */
	table.white-box{
		background:#fff;
	}
	table.white-box td{
		border:0 none;
		padding:1.5rem 2rem;
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
		line-height:normal;
	}
	table.colors-table{
		margin-bottom:2rem;
	}
	table.colors-table td, table.color-examples td{
		border:0 none;
		padding:0;
		line-height:normal;
	}	
	table.colors-table tr:first-child{
		height:5.125rem;
	}
	table.colors-table td{
		padding-bottom:1rem !important;
	}

	table.colors-table span.mycolor {
	    display: block;
	    width: 100%;
	    height: 5.125rem;
	}
	
	table.color-examples tr td, table.colors-table tr td{
		padding-right:0.4rem;
		padding-left:0.4rem;
		text-align:center;
	}
	table.color-examples tr td:first-child, table.colors-table tr td:first-child{
		padding-left:0;
		padding-right:0.8rem;
		text-align: left;
	}

	table.color-examples tr td:last-child, table.colors-table tr td:last-child{
		padding-right:0;
		padding-left:0.8rem;
		text-align:right;
	}

	table tr.icon-table-row:first-child td{
		padding-bottom:.875rem !important;
    	padding-top: 0.875rem !important;
	}

	table.color-examples img{
		margin-bottom:1.8rem !important;  
		padding:0 !important;
	}

	table tr.text-table-row td{
		text-align:left !important;
	}



	.fa-times{
		color: var(--red-color);
		font-size:1.25rem !important;
	}
	.fa-check{
		color: var(--green-color);
		font-size:1.25rem !important;
	}
	.sidebar{
		background:black;
		position:fixed;
		width:100%;
		z-index: 10;

	}


	/* helper claseses*/
	.fjalla{
		font-family:var(--accent-font);	
	}
	.desktop-only{
		display: none;
	}
	.photo-credit{
		display: block;
		margin-top:.5rem;
	}



	/* responsive desktop*/

	@media (max-width:50em) {
		table.color-examples.mobile-stack img{
			float: none !important;
	    	text-align: center !important;
	    	margin: auto !important;
	    	display: block !important;
	    	margin-bottom:1.8rem !important;

	    }
	    table.color-examples.mobile-stack td{
			display:block !important;
			width:100% !important;
			padding:0 !important;
	    }

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
		html{
			font-size:16px;
		}
		.desktop-only{
			display:block;
		}
		.mobile-only{
			display:none;
		}
		.sidebar{
			position:fixed;
			left:0;
			/* matches margin-left for main section */
			width:18.75rem;
			height:100%;
		}
		.main{
			/* matches width for sidebar*/
			margin-left:18.75rem;
		}
		.content .tab:first-child{
			padding-top: 3rem;
		}



		/* menu */
		#my-menu{
	    	margin: auto;
	    	margin-top:4rem;
	    	max-height: unset;
		}
		#my-menu .logo{
			padding-top: 0;
			margin-bottom:4.75rem;
			max-width:133px !important;
			float:none;

			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		#my-menu .menu-item{
			text-align:left;
			display:block;
			margin: auto;
			margin-bottom:2.5rem;
			max-width:133px;

		}
		#my-menu .menu-item.active::after {
		    content: " ";
		    background: var(--red-color);
		    width: 20rem;
		    height: .125rem;
		    display: block;
		}

	}
</style>
<section class="main">
	<section class="sidebar">
		<div id="my-menu">
			<img class="logo" src="<?php the_field('logo'); ?>">
			<?php
			//print each menu item
			if( have_rows('menu_item') ):
			    while( have_rows('menu_item') ) : the_row(); 
			        $title = get_sub_field('title');
			        $slug = createSlug($title);
			        echo '<div class="menu-item"><a href="#'.$slug.'">'.$title.'</a></div>';
			    endwhile;
			    echo '<div class="show-more mobile-only"><i class="fas fa-caret-up"></i><i class="fas fa-caret-down"></i></div>';
			endif;
			?>
		</div>	
	</section>
	<section class="content">
		<?php
		//print each tab
		if( have_rows('menu_item') ):
		while( have_rows('menu_item') ) : the_row(); 
			$slug = createSlug(get_sub_field('title'));				        
			?>
			<div id="<?php echo $slug; ?>" class="tab" style="background-color:<?php echo get_sub_field('background_color'); ?>">
				<?php 
				//print each row
				if( have_rows('rows') ):
				while( have_rows('rows') ) : the_row(); 
					?>
					<div class="row">				
					<?php
					//print each column
					if( have_rows('columns') ):	?>
						<div class="split">
							<?php while( have_rows('columns') ) : the_row(); ?>
								<div>
									<section style="padding-top:0;" class="free__first lower__first">
										<div class="inner">
										  	<div class="wp_content">
												<?php the_sub_field('content'); ?>
											</div>
										</div>
									</section>							        
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif;  ?>
					</div>
				<?php endwhile; ?>
				<?php endif;  ?>
					
			</div>
		<?php
		endwhile;
		endif;
		?>
	</section>
</section>

<script>

function isInView(myAnchor){
	if ( $(window).scrollTop()+60 > myAnchor.offset().top){
		return true;
	}
	return false;
}
function updateActiveTabs(){
	let tab = $('.tab');
	tab.each(function(index){
		if ( isInView( $(this) ) ) {
			menuItems.parent().removeClass("active").end().filter("[href='#"+$(this).attr('id')+"']").parent().addClass("active");	
		} /*else {
			console.log(menuItems.parent().removeClass("active").end());
			$(menuItems.parent().removeClass("active").end()[0]).parent().addClass("active");	
		}*/
	});
}

jQuery(function($) {



	// Cache selectors
	topMenu = $("#my-menu");
	menuItems = topMenu.find(".menu-item a");

	$("#my-menu .show-more").click(function(){
		let menu = $("#my-menu");
		if( menu.hasClass('active') ){
			menu.removeClass('active');
		} else {
			menu.addClass('active');
		}
	});

	$('.content').click(function(){
		let menu = $("#my-menu");
		if( menu.hasClass('active') ){
			menu.removeClass('active');
		}
	});

	$('.color-examples').each(function(){
		if( $(this).parent().is('div') && !$(this).parent().hasClass('wp_content') ){
			$(this).parent().css('background','var(--grey-color)').css( 'padding', '1.5rem 3.25rem');
		}
	})

	// Bind to scroll
	$(window).scroll(function(){
	    // Get container scroll position
	    var fromTop = $(this).scrollTop();     

	    if(fromTop > 5){
	   		$('.sidebar').css("top","0");
	    } else {	   		
	   		$('.sidebar').css("top","");
	    }

	    updateActiveTabs();
	});
	updateActiveTabs();
});
</script>
<?php get_footer(); ?>