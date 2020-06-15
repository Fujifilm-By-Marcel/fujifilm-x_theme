<?php
/*
Template Name: Page-PicturePerfectPortraits
*/

/*
function nofollownoindexhead(){
	echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}

add_action('wp_head', 'nofollownoindexhead');
*/

function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1.0.0');	
}
function page_myfujifilmlegacy_scripts(){
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
}

add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );


?>
	
<?php get_header(); ?>
<?php get_sidebar(); ?>

<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">


<style>

.main{
	background-image:url('https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/page-background.jpg');
	background-size:cover;
	background-repeat:no-repeat;
	background-position:center;
	overflow:hidden;
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
	margin-bottom:12px;
	letter-spacing: 9px;
}
.picture-perfect-portraits p{
	font-family: 'Noto Sans', sans-serif;
	color:#fff;
	margin-bottom:2em;
}


@media (min-width:767px){	
	.picture-perfect-portraits h1{
		font-size:44px;
		line-height:44px;
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

@media (max-width:550px){
	.picture-perfect-portraits{
		margin: 270px auto 0;
	}
	.main{
		background-image:url('https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/page-background-mobile.jpg');
		background-color: #141213;
		background-size: contain;
		background-position: top center;
	}
}

@media (max-width:375px){	
	.form-iframe{
		min-height:800px;
	}

}

#pagetop{display:none;}
.footer{margin-top:0;}

</style>
<main class="main">

	<div class="inner">
		<div class="container">
			<!--div class="wp_content">-->
				<div class="row">
					<div class="col s12 xl6"></div>
					<div class="col s12 xl6">
						<div class="picture-perfect-portraits"> 
							<h2>Get our FREE E-Book</h2>
							<h1>PICTURE PERFECT PORTRAITS</h1>
							<h2>with FUJIFILM X Series</h2>
<!--							<p style="margin-bottom:10px;">Learn the tips and tricks of capturing stunning skin tones and portraits with our Fujifilm how-to guide.</p>
							<p>Please provide your personal information to download our free ebook</p>-->
							<iframe class="form-iframe" src="https://fujifilm.msgfocus.com/k/Fujifilm/digital_cameras_web_opt_in_form_for_picture_perfect_portraits?v=3"></iframe>
						</div>
					</div>
				</div>
				
				
			<!--</div>-->
		</div>
	</div>
</main>
<?php get_footer(); ?>
