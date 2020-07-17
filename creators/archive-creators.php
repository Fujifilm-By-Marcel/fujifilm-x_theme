<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/css/archive-creators.css', false, NULL, 'all');
	wp_register_script( 'uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', false, NULL, false );
}
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

get_header(); 
get_sidebar();
$imgDirectory = get_stylesheet_directory_uri()."/en-us/img/creators/";
?>
<!-- noto-sans-condensed -->
<!--<link rel="stylesheet" href="https://use.typekit.net/wjm6sve.css">-->
<script>
	jQuery( document ).ready(function() {
		
		if( jQuery('#cookieLaw').length ){	
			jQuery('.cookieLawCloseBtn').click(
				function(){
					jQuery('.main').css("margin-top", jQuery(".header").height());
				}			
			);
		}
		
		
		fixPageMargin();	
		jQuery(window).resize(function() {
			fixPageMargin();
		}).resize();
	});

	function fixPageMargin(){
		if( jQuery('#cookieLaw').length ){		
			jQuery('.main').css("margin-top", jQuery(".header").height()); //-jQuery('#cookieLaw').height());
			
			
		} else {
			jQuery('.main').css("margin-top", jQuery(".header").height());
		}
	}
</script>

<section class="main"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 infobox-col">
				<div class="infobox">
					<h2>MEET OUR CREATORS</h2>
					<p class="tagline">PHOTOGRAPHY AND VIDEO</p>
					<p>Vestibulum rutrum quam vitae fringilla tincidunt. Suspendisse nec tortor urna. Ut laoreet sodales nisi, quis iaculis nulla iaculis vitae. Donec sagittis faucibus lacus eget blandit. Mauris vitae ultric.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row creator-filters creator-categories">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="col s12 m8 filter-container">				
							<p>
								<span class="filter-instructions">FILTER BY ></span>
								<span class="filter-option active"><a href="#">ALL</a></span>
								<?php
								$taxonomy = 'creator_category';
								$terms = get_terms($taxonomy); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
								?>								    
						        <?php foreach ( $terms as $term ) { ?>
						            <span class="filter-option"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></span>
						        <?php } ?>  								    
								<?php endif;  ?>
							</p>						
						</div>
						<div class="col s12 m4 search-box-container">
							<div class="search-box">
								<form id="search-form" method="get">
									<input type="text" name="search" size="13" placeholder="SEARCH CREATORS" id="search-box" value='<?php echo $_GET["search"] ?>'>								
									<a href="#" onclick='document.getElementById("search-form").submit();return false;'><i class="fa fa-search" aria-hidden="true"></i></a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row creator-filters creator-tags">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="col s12 m8 filter-container">				
							<p>
								<span class="filter-instructions">PHOTOGRAPHIC STYLE ></span>
								<span class="filter-option"><a href="#" onclick="clearTags(this);return false;">CLEAR ALL <span class="close">x</span></a></span>
								<?php
								$taxonomy = 'creator_tag';
								$terms = get_terms($taxonomy); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
								?>								    
						        <?php foreach ( $terms as $term ) { ?>
						            <span class="filter-option"><a href="#" onclick="filterTag(this);return false;"><?php echo $term->name; ?></a></span>
						        <?php } ?>  								    
								<?php endif;  ?>
							</p>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 

	<div class="container">
		<div class="row creators">
			<?php
			$args = array(
				'post_type' => 'creators',
				'post_status' => array('publish'),
				'orderby' => 'publish_date',  
				'order' => 'DESC',
			);
			
			if(isset($_GET["search"])){
				$args['s'] = $_GET["search"];
			}

			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$terms = get_the_terms(get_the_ID(), 'creator_category');
			$term_name = $terms[0]->name;
            ?>
			<div class="col s12 m6 l6 xl4 creator">				
				<div class="creator-content"> 
					<img width="160" height="160" src="<?php the_field("archive_portrait"); ?>">
					<h3><?php echo $term_name ?></h3>
					<p class="creator-name"><?php the_title(); ?></p>
					<h3>BIO</h3>
					<p class="creator-desc"><?php the_field("short_bio"); ?></p>
					<a class="creator-btn" href="#">view profile</a>
				</div>
			</div>
			<?php
			endwhile;
			endif;
			?>			
		</div>
	</div>

</section>
<script>
function filterTag(obj){
	(function($) {
		console.log($(obj));
		/*var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "mydata").val("bla");
$('#form1').append(input);*/
	})( jQuery );
}
function clearTags(obj){
	(function($) {
		console.log($(obj));
	})( jQuery );
}
</script>