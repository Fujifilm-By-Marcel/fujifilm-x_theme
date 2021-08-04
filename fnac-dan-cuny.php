<?php
/*
Template Name: fnac-dan-cuny
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


 function printCameras(){
 	
    ob_start();

	if( have_rows('cameras') ):
		echo "<div class='cameras'>";
	    while( have_rows('cameras') ) : the_row();
	    	echo "<div>";
	        the_sub_field('content');
	        echo "</div>";
	    endwhile;
	    echo "</div>";
	endif;

	return ob_get_clean();
 }

 function printLenses(){

 	ob_start();


 	if( have_rows('lenses') ):
		echo "<div  class='lenses'>";
	    while( have_rows('lenses') ) : the_row();
	        echo "<div>";
	        the_sub_field('content');
	        echo "</div>";
	    endwhile;
	    echo "</div>";
	endif;

	return ob_get_clean();
 }

  function printCameras_select(){    
  	ob_start();

	$select = get_field('cameras_select');
	if( $select ): ?>
	    <div  class='cameras'>
	    <?php foreach( $select as $post ):  ?>
	        <div>
	        	<div style="max-width:237px;margin:auto;margin-bottom:1rem;"><img src="<?php the_field('image_url', $post->ID ) ?>" class="alignnone size-full wp-image-52513 aligncenter"></div>
	        	<h4 style="text-align:center;"><?php the_field('header', $post->ID ) ?></h4>
	        	<p class="desktop-only" style="<?php if(  get_field('center_cameras_text') ) { echo "text-align: center"; } ?>"><?php the_field('text', $post->ID ) ?></p>
	            <p style="text-align: center;margin-top:auto;"><a href="<?php the_field('button_href', $post->ID ) ?>" class="cta" target="<?php the_field('button_target', $post->ID ) ?>"><?php the_field('button_text', $post->ID ) ?> ></a></p>

	        </div>
	    <?php endforeach; ?>
	    </div>
	<?php endif;

	return ob_get_clean();
 }

 function printLenses_select(){

 	ob_start();

	$select = get_field('lenses_select');
	$i=0;
	if( $select ): ?>
	    <div  class='lenses'>
	    <?php foreach( $select as $post ): $i++; ?>
	        <div class="<?php if($i>6){ ?>desktop-only<?php } ?>" >
	        	<div style="max-width:237px;margin:auto;margin-bottom:1rem;"><img src="<?php the_field('image_url', $post->ID ) ?>" class="alignnone size-full wp-image-52513 aligncenter"></div>
	        	<h5 style="text-align:center;"><?php the_field('header', $post->ID ) ?></h5>
	        	<!--<p><?php the_field('text', $post->ID ) ?></p>-->
	            <p style="text-align: center;margin-top:auto;"><a href="<?php the_field('button_href', $post->ID ) ?>" class="cta" target="<?php the_field('button_target', $post->ID ) ?>"><?php the_field('button_text', $post->ID ) ?> ></a></p>
	        </div>
	    <?php endforeach; ?>
	    </div>
	    <div style="text-align:center;"><a class="load-more-button mobile-only button grey-bg" onclick="loadMore();">Load More</a></div>
	<?php endif;

	return ob_get_clean();
 }

add_shortcode( 'cameras', 'printCameras' );
add_shortcode( 'lenses', 'printLenses' );
add_shortcode( 'cameras_select', 'printCameras_select' );
add_shortcode( 'lenses_select', 'printLenses_select' );


function printExposureCenterArticles(){
	
	if(get_field('bio')){
		$bioID = get_field('bio');
	}
	
	$term = get_field('article_tags');
	if( $term ):
	 	$posts = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'exposure_center',
			'tax_query' => array(
		      array(
		        'taxonomy' => 'ec_tags',
		        'field' => 'term_id',
		        'terms'    => $term,	        
		      )
		   )		
		)); 	
		
		//if ( is_user_logged_in() ) { 	
	    if( $posts ):

		    //open container
			echo '<div class="ec-carousel-container">';
			//open carousel
			echo '<div class="owl-carousel ec-carousel">';
			foreach( $posts as $post ):
				

			    //echo "<pre>";
			    //print_r($post);
				//echo "</pre>";
				//echo "<br>";

				//open background div
				echo '<div class="ec-carousel-bg" style="background:url('.get_the_post_thumbnail_url($post->ID, 'large').') center/cover no-repeat #000;width: 20.875rem;height: 14.875rem;">';
				
				//link			
				echo '<a href="'.get_permalink($post->ID).'" target="_blank">';

				//open inner div
				echo '<div class="ec-carousel-inner">';

				echo '<div class="article-label"><span>Articles</span></div>';
				echo '<h3>'.$post->post_title.'</h3>';
				echo '<p>'.$post->post_excerpt.'</p>';
				echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">READ MORE</span><i class="fas fa-caret-right"></i></div></div>';

				//close inner div
				echo '</div>';

				//close link
				echo '</a>';	
				
				//close background div
				echo '</div>';			
		    
				
			endforeach;


			//$ls = get_field("articles_last_slide");		
			
			//open background div
			//echo '<div class="ec-carousel-bg" style="background:url('.$ls['image'].') center/cover no-repeat #000;width: 15.625rem;height: 12.5rem;">';
			
			//link
			//echo '<a href="'.$ls['link'].'" target="_self">';

			//open inner div
			//echo '<div class="ec-carousel-inner">';

			//echo '<h3>'.$ls['header'].'</h3>';
			//echo '<p>'.$ls['text'].'</p>';
			//echo '<div class="ec-cta"><div class="ec-cta-inner"><span class="cta-label">'.$ls['cta'].'</span><i class="fas fa-caret-right"></i></div></div>';

			//close inner div
			//echo '</div>';
			
			//close link
			//echo '</a>';

			//close background div
			//echo '</div>';					

			//close carousel
			echo '</div>';
			//close container
		    echo '</div>';
		    //wp_reset_postdata();
		endif;
		
		//}

	endif;
}
?>
<style>
	:root{
		--grey-color: #e9e9e9;
		--grey-color-dark: #c4c4c4;		
		--red-color: #fc0019;
		--green-color: #409d27;		
		--accent-font: "Fjalla One", sans-serif;
	}
	.content img{
		width:auto !important;
		display: inline-block;
	}

	/* fonts */
	.main h2{
		font-family: var(--accent-font);
		font-size: 1.75rem;
		margin-bottom: .5rem;
		line-height: normal;
	}
	.main h3{
		font-family: var(--accent-font);
		 font-size: 1rem;
		 margin-bottom: 1rem;
		 color: var(--red-color);
		 line-height: normal;
	}
	.main .page-content h3{
		margin-bottom: 2rem;
	}
	.main h4{
		font-family: var(--accent-font);
		font-size: 1.375rem;
		margin-bottom: 1rem;
		line-height: normal;
	}
	.main h5{
		font-family: var(--accent-font);
		font-size: 1.25rem;
		margin-bottom: .5rem;
		line-height: normal;
	}
	.main p{
		margin-bottom:1rem;
		line-height:normal;
		font-size:1rem;
		line-height: normal;
	}
	html{
		font-size:14px;
	}

	/*layout*/
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
	.split > *{
		margin-bottom: 1rem;
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
	.container{
		max-width: min(90%, 80em);
		margin: auto;
	}
	
	/* components */
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
		margin-bottom: 1rem;
	}

	.main .button.white-bg{
		background: white;
		color: black;
	}

	.main .button.grey-bg{
		background: var(--grey-color-dark);
		color: white;
	}
	.banner{
		background-image: url('<?php the_field('banner_background') ?>');
		background-size: cover;
		color:white;
		display:flex;
		padding:3em 0;
	}
	.banner-content-container{
		max-width: 60em;
		margin: auto;
		align-items:flex-end;
	}
	.banner-content-container > :first-child{
		max-width: 180px !important;
		position: relative;
    	top: 32px;
	}

	/* helper claseses*/
	.fjalla{
		font-family:var(--accent-font);	
	}
	.main .desktop-only{
		display: none;
	}

	/*page specific*/
	.banner p{
		font-size: 0.875rem;
	}

	/* repeaters */
	.cameras, .lenses{
		margin-bottom: 2rem;
	}
	.cameras img, .lenses img{
		display: block;
		margin: auto;
	}
	.cameras > *{
		/*background: var(--grey-color);*/
		padding: 1.5rem 2.875rem;
	}

	.cameras > *, .lenses > *{
		margin-bottom: 2rem;
	}

	.cameras p{
		font-size: .75rem;
	}
	.cameras .cta, .lenses .cta{
		font-size: .875rem;
		color: var(--red-color);
		cursor: pointer;
	}
	
	.lenses{
		display: grid;
		grid-template-columns: auto auto;
		row-gap: 2em;
		column-gap: 3em;
	}

	/* responsive desktop*/
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
		.main .desktop-only{
			display:block;
		}
		.main .mobile-only{
			display:none;
		}

		/* repeaters */
		.cameras{
			display: grid;
			grid-template-columns: auto auto;
			row-gap: 2em;
			column-gap: 3em;
			
		}
		.cameras > *, .lenses > *{
			margin-bottom: 0;
			display: flex;
    		flex-direction: column;
		}
		.lenses{
			display: grid;
			grid-template-columns: auto auto auto auto auto;
			gap: 1.75em;
		}
		.banner{
			min-height:630px;
		}
		.banner-content-container{
			align-items: center;
		}
		.banner-content-container > :first-child{
			max-width: unset !important;
			top: 0;
		}
	}


/* modal */
.mymodal{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0,0,0,.5);
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 40;
	flex-flow:column nowrap;
}
.mymodal-inner{	
	max-height: 100%;
	overflow-y: auto;
	position: relative;
}

.close-modal{
	position: absolute;
	top: 0;
	right: 0;
	cursor: pointer;
	color: white;
	margin: 10px 15px;
	font-size: 1.25rem;
}


/* Owl Carousel */
.ec-carousel .owl-stage{
	display:block;
}
.ec-carousel .owl-item{
	text-align:center;
	background:none;
	flex-grow: 1;
	display: inline-block;
	vertical-align: middle;
	float:none;
}
.ec-carousel a{
	display:block;
	overflow:hidden;
}
.ec-carousel .ec-carousel-bg{		
	color: white;
	overflow: hidden;
	height: 0;
	position:relative;
	margin:auto;
}
.ec-carousel .ec-carousel-inner{
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	background:rgba(0,0,0,.3);
	text-align:left;
	padding: 1.25em 1.875em;
	display: flex;
	flex-direction: column;
}
.ec-carousel .article-label span{
	line-height:normal;
	border-bottom:1px solid #eb022f;
	font-family: 'Fjalla One', sans-serif;
	text-transform: uppercase;
}
.ec-carousel h3{
	line-height:normal;
	color:white;
	font-size:1.25rem;
	font-family: 'Fjalla One', sans-serif;
	margin-bottom: 0;
	margin-top:auto;
	text-overflow: ellipsis;
   overflow: hidden;
   white-space: nowrap;
}
.ec-carousel p{
	/*overflow: hidden;
	-webkit-line-clamp: 2;
	display: -webkit-box;
	-webkit-box-orient: vertical;*/
	margin-bottom: 0;
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
}
.ec-carousel .ec-cta-inner{
	float:right;
   display: flex;
   align-items: center;
   display:inline-block;
}
.ec-carousel .cta-label{
	line-height:normal;
	font-family: 'Fjalla One', sans-serif;font-size:.625rem;
	border-bottom:1px solid #eb022f;
	margin-right:.425rem;
}
.ec-carousel i{
	vertical-align: middle;
	color: var(--red-color);
}
.ec-carousel .owl-dots{
	display: none;
}

.owl-prev {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    left: 0;
    display: block !important;
}

.owl-next {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    right: 0;
    display: block !important;
}
.owl-next.disabled, .owl-prev.disabled{
	display: none !important;
}
.owl-prev i, .owl-next i {
	font-size:28px;
}

/* exposure center grid */
.ec-grid > *:first-child{
	margin-bottom: 2rem;
}
@media (min-width:50em) {
	.ec-grid{
		display: grid;
		grid-template-columns: 30% 70%;
		gap: 2rem;
	}
	
}


/* modal width */
@media (min-width: 414px){
	.mymodal iframe{min-width: 414px;}
}




</style>
<section class="main">
	<section class="content">

		<section class="banner">
			 
			<div class="container">
				<div class="split banner-content-container">
					<div>	
						<img src="<?php the_field('portrait') ?>" alt="" class="portrait">
					</div>
					<div>
						<?php the_field('banner_text') ?>
					</div>
				</div>
			</div>
		</section>
		<section class="container page-content" style="padding: 3em 0;">
			<?php the_field('page_content') ?>
		</section>
	</section>


	<div class="mymodal contact" style="display:none;">
		<div class="mymodal-inner">
			<div class="close-modal">
				<i class="fas fa-times"></i>
			</div>
			<iframe id="contact-form" src="<?php the_field('contact_src') ?>" ></iframe>
		</div>
	</div>

	<div class="mymodal loaner" style="display:none;">
		<div class="mymodal-inner">
			<div class="close-modal">
				<i class="fas fa-times"></i>
			</div>
			<iframe id="loaner-form" src="<?php the_field('loaner_src') ?>" ></iframe>
		</div>
	</div>

	<section style="background-color: var(--grey-color);padding: 5em 0;">
		<div class="container">
			
				<div class="ec-grid">
					<div>
						<?php the_field('articles_content') ?>
					</div>
					<div>
					<?php printExposureCenterArticles($posts); ?>
					</div>
				</div>
		</div>
	</section>

</section>

<script>

var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

// Listen to message from child window
eventer(messageEvent,function(e) {
    var key = e.message ? "message" : "data";
    var data = e[key];
    console.log(data);
    jQuery("#contact-form").height(data);
    jQuery("#loaner-form").height(data);
},false);

jQuery(function($) {
	$('.mymodal').click(function( event ){
		$('.mymodal').hide();		
	});

	$('.open-contact').click(function(){
		$('.mymodal.contact').show();
	});

	$('.open-loaner').click(function(){
		$('.mymodal.loaner').show();
	});

	jQuery(".owl-carousel.ec-carousel").owlCarousel({
	   margin:10,
	   nav:true,
	   navText : ["<i class='fas fa-caret-left desktop-only'></i>","<i class='fas fa-caret-right desktop-only'></i>"],
	   autoplay : true,
	   autoplayHoverPause : true,
	   responsive:{
	        0:{
	        	items:1
	        },
	        700:{
	        	items:2
	        },
	        800:{
	        	items:1
	        },
	        1276:{
	        		items:2
	        },
	    }
	});

});

function loadMore(){		
	var hiddenCreators = $(".lenses > *:hidden");
	hiddenCreators.each(function(i,e){
		var e = $(e);						
		if( i<6 ){
			e.show();
			if( $(".lenses > *:hidden").length <= 0 ){
				$(".load-more-button").hide();
			}
		} else {
			return false
		}			
	});
}

</script>
<?php get_footer(); ?>