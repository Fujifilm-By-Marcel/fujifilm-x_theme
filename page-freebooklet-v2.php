<?php
/*
Template Name: Page-FreeBooklet-v2
*/

function page_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1.0.0');	
}
function page_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 
}

add_action( 'wp_enqueue_scripts', 'page_styles' );
add_action( 'wp_enqueue_scripts', 'page_scripts' );


?>
	
<?php get_header(); ?>
<?php get_sidebar(); ?>

<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">
<style>
.main{
	background-image:url('<?php echo get_field("desktop_bg"); ?>');
	background-size:cover;
	background-repeat:no-repeat;
	background-position:center;
	overflow:hidden;
	position:relative;
}
.form-iframe{
    max-height:none;
    min-height:650px;
	width:100%;
}

.picture-perfect-portraits{
	max-width:500px;
	text-align:center;
	margin:180px auto 0;
}

.picture-perfect-portraits h1{
	font-family: 'Fjalla One', sans-serif;
	color:#fff;
	margin-bottom: .2em;
}
.picture-perfect-portraits h2{
	font-family: 'Noto Sans', sans-serif;
	font-family: noto-sans-condensed, sans-serif;
	font-style: normal;
	font-weight: 300;
	color:#fff;
	margin-bottom:.8em;
	letter-spacing: 9px;
}
.picture-perfect-portraits p{
	font-family: 'Noto Sans', sans-serif;
	color:#fff;
	margin-bottom:2em;
}


.photo-credit.desktop-only{
	position: absolute;
    bottom: 15px;
    right: 15px;
    font-weight: bold;
}

.mobile-only{display:none;}

@media (min-width:767px){	
	.picture-perfect-portraits h1{
		font-size:44px;
		line-height:50px;
	}
	.picture-perfect-portraits h2{
		font-size:32px;
		line-height:32px;
	}
	.picture-perfect-portraits p{
		font-size:18px;
	}
}

@media (max-width:767px){	
	
	.picture-perfect-portraits{
		max-width: 430px;
		margin:70px auto 0;
	}
	
	.picture-perfect-portraits h1{
		font-size:40px;
		line-height:44px;
	}
	.picture-perfect-portraits h2{
		font-size:24px;
		line-height:32px;
	}
	.picture-perfect-portraits p{
		font-size:15px;
	}
	

}

@media (max-width:600px){

	.picture-perfect-portraits{
		margin:0 auto 0;
	}

	.main{
		background-image:none;
		background-color: #141213;
		background-size: contain;
		background-position: top center;
	}

	.desktop-only{display:none;}
	.mobile-only{display:block;}
	.featured-image.mobile-only{position: relative;}
	.photo-credit.mobile-only{
		display:block;
		position:absolute;
		bottom:60px;
		right:15px;
		color:#fff;
	}


}

@media (max-width:375px){	
	.form-iframe{
		min-height:800px;
	}

}

#pagetop{display:none;}
.footer{margin-top:0;}

<?php echo get_field('css'); ?>

</style>
<div class="main">
	<div class="photo-credit desktop-only">
		<?php the_field("photo_credit"); ?>
	</div>
	<div class="inner">
		<div class="featured-image mobile-only">
			<img src="<?php echo get_field("mobile_bg"); ?>">
			<div class="photo-credit mobile-only">
				<?php the_field("photo_credit"); ?>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s12 xl6"></div>
				<div class="col s12 xl6">
					<div class="picture-perfect-portraits"> 
						<h2><?php the_field("line_1"); ?></h2>
						<h1><?php the_field("line_2"); ?></h1>
						<h2><?php the_field("line_3"); ?></h2>
						<?php the_field("form_iframe"); ?>
					</div>
				</div>
			</div>
				
				
		</div>
	</div>
</div>
<?php get_footer(); ?>
