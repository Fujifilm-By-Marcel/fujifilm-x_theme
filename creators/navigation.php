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
							<li><a href="#">home</a></li>
							<li><a href="#">about</a></li>
							<li><a class="active" href="#">creators</a></li>
							<li><a href="#">gallery</a></li>
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
							<li><a href="#">home</a></li>
							<li><a href="#">about</a></li>
							<li><a class="active" href="#">creators</a></li>
							<li><a href="#">gallery</a></li>
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