<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.2.0');
	wp_enqueue_style('filters', get_stylesheet_directory_uri().'/en-us/creators/css/filters.css', array(),'1.0.42');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
	wp_enqueue_script('filters', get_stylesheet_directory_uri().'/en-us/creators/js/filters.js', array(), '1.0.20',true); 
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
			$bioID =false;
			if(get_field('bio', get_the_ID())){
				$bioID = get_field('bio', get_the_ID());
			}
			$terms = get_the_terms(get_the_ID(), 'creator_category');
			$term_name = $terms[0]->name;
            ?>
			<div class="col s12 m6 l6 xl4 creator" style="display:none;">				
				<div class="creator-content"> 
					<?php 
					if( get_field("image_x2", $bioID) && get_field("image_x3", $bioID) ){
						$srcset = "data-srcset='";
						$srcset .= get_field("image_x1", $bioID)." 1x, ";
						$srcset .= get_field("image_x2", $bioID)." 2x, ";
						$srcset .= get_field("image_x3", $bioID)." 3x, ";
						$srcset .= "'";
					} else {
						$srcset = "";
					}
					?>
					<div class="creator-portrait-container">
						<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><img class="portrait lazyload" width="160" height="160" data-src="<?php the_field("image_x1", $bioID); ?>" <?php echo $srcset; ?> ></a>
						<?php if($term_name == "X‑Photographer") { ?>
						<img class="badge" width="34" height="34" src="<?php echo $imgDirectory ?>x-photographer-badge-small.png" srcset="<?php echo $imgDirectory ?>x-photographer-badge-small.png 1x, <?php echo $imgDirectory ?>x-photographer-badge-small@2x.png 2x, <?php echo $imgDirectory ?>x-photographer-badge-small@3x.png 3x">
						<?php } ?>
					</div>
					<h3><?php echo $term_name ?></h3>
					<p class="creator-name"><?php the_title(); ?></p>
					<h3>BIO</h3>
					<p class="creator-desc"><?php echo get_the_excerpt($bioID);  ?></p>
					<a class="creator-btn" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">view profile</a>
				</div>
			</div>
			<?php endwhile;	?>
			<div class="col s12">
				<div class="load-more-button"><a onclick="loadMore();">Load More</a></div>
			</div>

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
	}
	(function ($, document) {
		$(document).ready(function () {
			loadMore();
			lazyload();

			//check mobile checkboxes onload
			var radios = $('input:radio[name=category]');
		    radios.filter('[value=<?php if(isset($_GET['cat'])){ echo $_GET['cat']; } else { echo "null"; } ?>]').prop('checked', true);		    
		    var checks = $('input:checkbox[name="tags[]"]');
		    var getChecks = "<?php echo $_GET['tags'] ?>".split(",");
		    
		    for(i=0;i<getChecks.length;i++){
				
		    	$('input:checkbox[value="'+getChecks[i]+'"]').prop('checked', true);
		    }
		});

	}(jQuery, document));

</script>

<?php get_footer();  ?>