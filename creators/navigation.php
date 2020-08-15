<?php 
	if ( is_archive() || is_single() ) {
		$creators_active = "class='active'";
	} else {
		$creators_active = "";
	}
	if ( is_page( "about-creators" ) ){
		$about_active = "class='active'";
	} else {
		$about_active = "";
	}
	if ( is_page( "home-creators" ) ){
		$home_active = "class='active'";
	} else {
		$home_active = "";
	}
	if ( is_page( "gallery-creators" ) ){
		$gallery_active = "class='active'";
	} else {
		$gallery_active = "";
	}

?>
<section class="creators-navigation">
	<section class="creators-desktop-nav">
		<div class="container-fluid">
			<div class="row">
				<div class="col s8 m4">
					<img alt="Fujifilm X | GFX Creators" width="267" height="43" class="creators-logo" src="<?php echo $imgDirectory ?>logo.png" srcset="<?php echo $imgDirectory ?>logo.png 1x, <?php echo $imgDirectory ?>logo@2x.png 2x, <?php echo $imgDirectory ?>logo@3x.png 3x">
				</div>
				<div class="col s4 m8">
					<div class="creators-navigation-list">
						<ul>
							<li><a <?php echo $home_active ?> href="<?php echo get_permalink( get_page_by_path( 'home-creators' ) ) ?>">home</a></li>
							<li><a <?php echo $about_active ?> href="<?php echo get_permalink( get_page_by_path( 'about-creators' ) ) ?>">about</a></li>
							<li><a <?php echo $creators_active ?> href="<?php echo get_post_type_archive_link( 'creators' ) ?>">creators</a></li>
							<li><a <?php echo $gallery_active ?> href="<?php echo get_permalink( get_page_by_path( 'gallery-creators' ) ) ?>">gallery</a></li>
						</ul>
						<a href="javascript:void(0);" class="hamburger-menu-icon" onclick="openMenu()">
					    	<i class="fa fa-bars"></i>
					    </a>
					</div>					
				</div>
			</div>
		</div>
	</section>
	<section class="creators-mobile-nav"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col s12">
					<div class="creators-navigation-list">
						<ul>
							<li><a <?php echo $home_active ?> href="<?php echo get_permalink( get_page_by_path( 'home-creators' ) ) ?>">home</a></li>
							<li><a <?php echo $about_active ?> href="<?php echo get_permalink( get_page_by_path( 'about-creators' ) ) ?>">about</a></li>
							<li><a <?php echo $creators_active ?> href="<?php echo get_post_type_archive_link( 'creators' ) ?>">creators</a></li>
							<li><a <?php echo $gallery_active ?> href="<?php echo get_permalink( get_page_by_path( 'gallery-creators' ) ) ?>">gallery</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>



<script>
function openMenu() {
	var x = jQuery(".creators-mobile-nav");
	if (x.css("display") === "block") {
		x.hide();
	} else {
		x.show();
	}
}
</script>