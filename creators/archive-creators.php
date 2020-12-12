<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.1.103');
	wp_enqueue_style('filters', get_stylesheet_directory_uri().'/en-us/creators/css/filters.css', array(),'1.0.10');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
	wp_enqueue_script('filters', get_stylesheet_directory_uri().'/en-us/creators/js/filters.js', array(), '1.0.12',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

global $post;
$post = get_page_by_path( 'creators' );
setup_postdata( $post );
get_header(); 
get_sidebar();
 
$imgDirectory = get_stylesheet_directory_uri()."/en-us/creators/img/";
require get_stylesheet_directory()."/en-us/creators/filters.php";
?>
<section class="main"> 
	<?php 
	require get_stylesheet_directory().'/en-us/creators/navigation.php';
	?>

	<?php $post_id = get_page_by_path( 'creators' ); ?>
	<?php if( have_rows('archive_page', $post_id) ): ?>
    <?php while( have_rows('archive_page', $post_id) ): the_row(); ?>
    <?php if( get_sub_field('header', $post_id) ): ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l6 infobox-col">
				<div class="infobox">
					<h2><?php the_sub_field("header", $post_id) ?></h2>
					<div class="tagline"><?php the_sub_field("tagline", $post_id) ?></div>
					<?php the_sub_field("text", $post_id) ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>


	<div class="container">
		<?php printFilters(); ?>
	</div> 

	<div class="container">
		<div class="row creators">
			<?php			            
			$the_query = get_main_query();
			if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$terms = get_the_terms(get_the_ID(), 'creator_category');
			$term_name = $terms[0]->name;
            ?>
			<div class="col s12 m6 l6 xl4 creator" style="display:none;">				
				<div class="creator-content"> 
					<?php 
					if( get_field("archive_portrait_2x") && get_field("archive_portrait_3x") ){
						$srcset = "data-srcset='";
						$srcset .= get_field("archive_portrait")." 1x, ";
						$srcset .= get_field("archive_portrait_2x")." 2x, ";
						$srcset .= get_field("archive_portrait_3x")." 3x, ";
						$srcset .= "'";
					} else {
						$srcset = "";
					}
					?>
					<div class="creator-portrait-container">
						<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><img class="portrait lazyload" width="160" height="160" data-src="<?php the_field("archive_portrait"); ?>" <?php echo $srcset; ?> >
						<?php if($term_name == "X‑Photographer") { ?></a>
						<img class="badge" width="34" height="34" src="<?php echo $imgDirectory ?>x-photographer-badge-small.png" srcset="<?php echo $imgDirectory ?>x-photographer-badge-small.png 1x, <?php echo $imgDirectory ?>x-photographer-badge-small@2x.png 2x, <?php echo $imgDirectory ?>x-photographer-badge-small@3x.png 3x">
						<?php } ?>
					</div>
					<h3><?php echo $term_name ?></h3>
					<p class="creator-name"><?php the_title(); ?></p>
					<h3>BIO</h3>
					<p class="creator-desc"><?php the_field("short_bio"); ?></p>
					<a class="creator-btn" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">view profile</a>
				</div>
			</div>
			<?php endwhile;	?>

		    <?php else: ?>
		    <div class="col s12">
		    	<p style="text-align:center;">No results. <a href="#" onclick="clearSearch();return false;">Click here</a> to clear your search terms.</p>
		    	<br><br><br>
		    </div>
			<?php endif; ?>			
		</div>
	</div>
</section>
<script>
	function loadMore(){
		(function($) {		
			var hiddenCreators = $(".creator:hidden");
			hiddenCreators.each(function(i,e){
				var e = $(e);						
				if( i<6 ){
					e.show();
					if( $(".creator:hidden").length <= 0 ){
						$(".load-more-button").hide();
					}
				} else {
					return false
				}			
			});
		})( jQuery);
	}
	(function ($, document) {
		$(document).ready(function () {
			loadMore();
			console.log("clicked");
			lazyload();
		});
	}(jQuery, document));

</script>

<?php get_footer();  ?>