<?php
/*
Template Name: Page-PreferenceCenter
*/

function nofollownoindexhead(){
	echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}

add_action('wp_head', 'nofollownoindexhead');

?>
	
<?php get_header(); ?>
<?php get_sidebar(); ?>
<style>
.preference-center-iframe{
    max-height:none;
    min-height:1100px;
}
@media (max-width:767px){
    .preference-center-iframe{
	min-height:1450px;
    }
}
@media (max-width:482px){
    .preference-center-iframe{
	min-height:1800px
    }
}
@media (max-width:416px){
    .preference-center-iframe{
        min-height:2000px;
    }
}
@media (max-width:320px){
    .preference-center-iframe{
        min-height:2100px;
    }
}

.credits{
	max-width: 800px;
	margin: 0 auto;
	position: relative;
	top: -30px;
	color: #fff;
	z-index: 2;
	padding: 0 20px 0 0;
	text-align:right;
}
</style>
<main id="f_template">
	<section class="xstoriespost__first lower__first">
		<div class="inner">
			<div class="xstoriespost__mainvisual" style="z-index:1;">
				<div class="xstoriespost__mainvisual_bg" style="background-image:url(https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/KH-SellaSunrise-DOLOMITES.jpg);"></div>
				<img src="https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/KH-SellaSunrise-DOLOMITES.jpg">
				<p class="credits">&copy; 2019 Karen Hutton</p>
			</div>
		</div>
	</section>
	<section class="xstories__contents lower__contents">
		<div class="inner">
			<div class="wp_content">
				<?php remove_filter ('acf_the_content', 'wpautop'); ?>
				<iframe class="preference-center-iframe" src="https://fujifilm.msgfocus.com/k/1qS9NHDFkwr"></iframe>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
