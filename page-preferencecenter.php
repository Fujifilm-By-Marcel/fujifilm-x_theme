<?php
/*
Template Name: Page-PreferenceCenter
*/

function nofollownoindexhead(){
	echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}

add_action('wp_head', 'nofollownoindexhead');


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

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
				<div class="xstoriespost__mainvisual_bg" style="background-image:url(/wp-content/uploads/sites/11/2018/09/KH-SellaSunrise-DOLOMITES.jpg);"></div>
				<img src="/wp-content/uploads/sites/11/2018/09/KH-SellaSunrise-DOLOMITES.jpg">
				<p class="credits">&copy; 2019 Karen Hutton</p>
			</div>
		</div>
	</section>
	<section class="xstories__contents lower__contents">
		<div class="inner">
			<div class="wp_content">
				<?php 
				remove_filter ('acf_the_content', 'wpautop');	
				if( isset($_GET['email']) ){
					require_once('fnac-assets/adestra-api/adestra-api.php');
					$xmlrpc = authenticate();
					$contactID = getContactID($xmlrpc, $_GET['email']);
					
					if( $contactID != false ){
						if(  isset($_GET['launchid']) && ($_GET['launchid'] != '') ){
							$launchid = $_GET['launchid'];
						} else {
							$launchid = 94407;
						}
						$form_url = getForm($xmlrpc, 7, $contactID, $launchid ); //(form_id, contact_id, launch_id)
						echo '<iframe class="preference-center-iframe" src="'.$form_url.'"></iframe>';
					} else {
						echo '<iframe class="preference-center-iframe" src="https://fujifilm.msgfocus.com/k/1qS9NHDFkwr"></iframe>';	
					}
				} else {
					echo '<iframe class="preference-center-iframe" src="https://fujifilm.msgfocus.com/k/1qS9NHDFkwr"></iframe>';
				}

				?> 
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>