<?php 
/*
Template Name: Page-creator-resources
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('creator-resources', get_stylesheet_directory_uri().'/en-us/fnac-assets/creators/css/creator-resources.css', array(), '1.0.52');	
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	//wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

get_header(); 
get_sidebar();

$imgDirectory = get_stylesheet_directory_uri()."/en-us/fnac-assets/creators/img/";
$tallest_px = get_field("tallest_button_image");


function printTile($tile, $tallest_px){
	$imgsrc = wp_get_attachment_image_src( $tile->image, 'full' );
    ?>
	<div class="col s12 m6 l4 xl4 tile">
		<a class="tile-link" href="<?php echo $tile->href; ?>" target="<?php echo $tile->target; ?>">
			<div class="tile-inner">
				<div class="icon-wrapper" style="min-height:<?php echo $tallest_px; ?>;">
					<img style="display:inline;" class="icon" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
				</div>
				<h3 class="title"><span><?php echo $tile->title; ?></span></h3>
				<p class="cta"><span ><?php echo $tile->cta; ?></span></p>
			</div>
		</a>
	</div>
	<?php
}

function printTiles(){
	if( have_rows('buttons') ): ?>
	<div class="row tiles">
		<?php 
		while( have_rows('buttons') ): the_row();					
			$tile = new stdClass();
			$tile->title = get_sub_field("title");
			$tile->cta = get_sub_field("cta");
			$tile->image = get_sub_field("image");
			$tile->href = get_sub_field("href");
			$tile->target = get_sub_field("target");
			printTile($tile, $tallest_px); 
		endwhile;
		?>
	</div>
	<?php endif; 
}

function printMenu($class){
	$rows = get_field('menu_item');
	if( $rows ) {
	    echo '<ul class="creator-resources-menu '.$class.'">';
	    $isActive = true;
	    foreach( $rows as $row ) {	     	    	  
	    	printMenuItem($row, $isActive);	    	
	    	$isActive = false;
	    }
	    echo '</ul>';
	}
}

function printMenuItem($row, $isActive){
	
	
	//initialize href
	$href = $row['href'];
	if( empty($row['href']) || $row['href'] == ""){
    	$href = "#";
    }

	//check for icon class
	$class = "";
	$has_icon = false;
    if( !empty($row['fa_icon']) || $row['fa_icon'] != ""){
    	$class .= " has-icon";
    	$has_icon = true;
    }

    //check for isActive
    $is_active = false;
    if($isActive){
    	$class .= " active";
    	$is_active = true;	
    }

    //print list item
    echo '<li class="'.$class.'">';

    //print link
	echo '<a href="'.$href.'" target="'.$row['target'].'" onclick="changeTab(event, this);">';

	//print icon
	if($has_icon){ echo '<i class="fas '.$row['fa_icon'].'"></i>'; }	            

	//print title
    echo '<p><span>'.$row['title'].'</span></p>';

    //close tags
    echo '</a>';
    echo '</li>';
}

function printTabs(){
	$rows = get_field('tab');
	if( $rows ) {	    
	    foreach( $rows as $row ) {
	        $src = $row['iframe_url'];
	        $id = $row['id'];
	        echo '<div id="'.$id.'" class="tab">';
	        echo '<iframe src="'.$src.'" style="width:100%;min-height:500px;"></iframe>';	            
	        echo '</div>';
	    }
	    
	}
}

?>

<section class="main"> 		

	<?php if( $_POST['password'] == get_field('password') ){ ?>
	<section class="creators-navigation">
		<section class="creators-desktop-nav">
			<div class="container-fluid">
				<div class="row">
					<div class="col s8 m4">
						<img alt="Fujifilm X | GFX Creators" width="267" height="43" class="creators-logo" src="<?php echo $imgDirectory ?>logo.png" srcset="<?php echo $imgDirectory ?>logo.png 1x, <?php echo $imgDirectory ?>logo@2x.png 2x, <?php echo $imgDirectory ?>logo@3x.png 3x">
					</div>
					<div class="col s4 m8">
						<div class="creators-navigation-list">
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
							<?php printMenu('mobile'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>	
	<br><br>
	<div class="container">		
		<div class="row">

			<!-- Menu -->
			<div class="col s12 m12 l12 xl4 xl-desktop-only">
				<div style="border-right: 2px solid #eb022f;max-width: 315px;padding: 20px;">
					<?php printMenu(''); ?>
				</div>
			</div>

			<!-- body -->
			<div class="col s12 m12 l12 xl8">				
				
				<div class="tab" id="dashboard">
					<h1><?php the_field("title"); ?></h1>
					<p class="tagline"><?php the_field("tagline"); ?></p>
					<p><?php the_field("text"); ?></p>
					<br><br>
					<!-- Tiles -->
					<?php printTiles(); ?>
				</div>
				<?php printTabs(); ?>

			</div>
		</div>
	</div>
	<?php } else { ?>
	<form method="post">
		<div style="min-height:80vh;display:flex;flex-direction:column;align-items:center;justify-content:center;background:black;padding:30px 0;text-align:center;">
			<?php $imgsrc = wp_get_attachment_image_src( get_field("login_page_logo"), 'full' ); ?>
			
			<img style="display:inline;max-width:330px !important;" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
			<br><br>		
			<input style="border-radius: 5px;padding: 6px 10px;" type="password" id="password" name="password" placeholder="password" value="<?php echo $_POST['password'] ?>" required>
			
			<?php if( isset( $_POST['password'] ) && $_POST['password'] != get_field('password') ){ ?>
			<p style="color:#eb022f;margin-top:10px">Wrong password.</p>
			<?php } else { ?>
			<br><br>
			<?php } ?>

			<input style='cursor:pointer;border-radius: 8px;background-color: #eb022f;font-family: "Fjalla One", sans-serif;color:white;padding:4px 30px;font-size: .75rem;' type="submit" value="ENTER">
			
		</div>
	</form>



	<?php } ?>
</section>

<form id="logout-creators-form" method="post" style="display:none;">
	<input type="hidden" id="logout" name="logout" value="true">
</form>

<script>

function openMenu() {
	var x = jQuery(".creators-mobile-nav");
	if (x.css("display") === "block") {
		x.hide();
	} else {
		x.show();
	}
}
function changeTab(e, o){
	var hash = jQuery(o).attr('href');
	console.log(hash);
	jQuery('.tab').hide();
	if( hash !== undefined && hash.slice(0, 1) == "#" && jQuery(hash).length ){
		jQuery(hash).show();
	} else if(hash == "#logout-creators") {
		$('#logout-creators-form').submit();
	} else {
		jQuery("#dashboard").show();
	}
	
}
changeTab();
</script>
<?php get_footer();  ?>