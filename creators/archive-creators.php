<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.1.29');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true);
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
		<div class="row creator-filters creator-categories">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="col s12 m8 filter-container">		
							<?php 								
							function getAllActiveClass(){
								if( is_post_type_archive("creators") ){
									return "active";
								} else {
									return "";
								}
							}
							?>		
							<p>
								<span class="filter-instructions">FILTER BY ></span>
								<span class="filter-option <?php echo getAllActiveClass() ?>"><a href="<?php echo get_post_type_archive_link( 'creators' ); ?>">ALL</a></span>
								<?php
								$activeCat = false;
								$taxonomy = 'creator_category';
								$terms = get_terms($taxonomy); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
						        function getCatActiveClass($cat, &$activeCat){
									if( is_tax( 'creator_category', $cat ) ){ 
										$activeCat = $cat;
										return "active";
									} else {
										return "";
									}
								}
						        foreach ( $terms as $term ) { ?>
						            <span class="filter-option <?php echo getCatActiveClass($term->slug, $activeCat) ?>"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name."s"; ?></a></span>				        	
						        <?php } ?>  								    
								<?php endif;  ?>
							</p>						
						</div>
						<div class="col s12 m4 search-box-container">
							<div class="search-box">
								<form id="search-form" method="get">
									<input type="hidden" name="tags" id="tags" value='<?php echo $_GET["tags"] ?>' >
									<input type="text" name="search" size="13" placeholder="SEARCH CREATORS" id="search" value='<?php echo $_GET["search"] ?>'>								
									<a href="#" onclick='document.getElementById("search-form").submit();return false;'><i class="fa fa-search" aria-hidden="true"></i></a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row creator-filters creator-tags is-not-modal">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="col s12 filter-container">				
							<p>
								<span class="filter-instructions">PHOTOGRAPHIC STYLE ></span>
								<span class="filter-option clear-all"><a href="#" onclick="clearTags(this);return false;">CLEAR&nbsp;ALL&nbsp;<span class="cancel-filter">X</span></a></span>
								<?php
								function tagHasPosts($cat, $tag){
									$args = array(
										'post_type' => 'creators',
										'post_status' => array('publish'),
										'orderby' => 'publish_date',
										'tax_query' => array(
											'relation' => 'AND',
											array (
									            'taxonomy' => 'creator_category',
									            'field' => 'slug',
									            'terms' => $cat,
									        ),
											array (
									            'taxonomy' => 'creator_tag',
									            'field' => 'slug',
									            'terms' => $tag,
									        ),
										),
									);
									$the_query = new WP_Query( $args );
									return $the_query->have_posts();
								}
								$args = array();
								$args['taxonomy'] = 'creator_tag';
								$terms = get_terms($args); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
								function getTagActiveClass($tag){
									if( strpos($_GET["tags"], $tag) !== false ){ 
										return "active";
									} else {
										return "";
									}
								}	
								foreach ( $terms as $term ) { 
									if( is_post_type_archive("creators") || tagHasPosts($activeCat, $term->slug) ){
									?>
						            <span class="filter-option <?php echo getTagActiveClass($term->slug); ?> desktop-only"><a href="#" onclick="filterTag(this);return false;"><span class="term" data-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>&nbsp;<span class="cancel-filter">X</span></a></span>
						        <?php } 
						    	} ?>  								    
								<?php endif;  ?>
								<span class="filter-option select-style"><a style="cursor:pointer;" onclick="showTagModal(this);return false;">Select&nbsp;Styles</a></span>
							</p>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<script>
		function showTagModal(obj){
			(function($, obj) {
				$("#tagModal").show();
			})( jQuery, obj );
		}
	    function closeModal() {
	        (function($) {
	            $(".modal").css("display","none");
	        })( jQuery );
	    }
	    (function ($, document) {
	        $(document).ready(function () {
	            if(true){

	            }
	        });
	    }(jQuery, document));
	</script>
	<div class="modal" id="tagModal" style="display:none;">
		<div class="modal-content" style="padding:2rem 0">
			<div class="close" onclick="closeModal()">
				<span class="cursor">&times;</span>
			</div>
			<h3>PHOTOGRAPHIC STYLE</h3>
			<div class="row creator-filters creator-tags is-modal">
				<div class="col s12">
					<div class="row">
						<div class="filters">
							<div class="col s12 filter-container">
								<p>					
									<span class="filter-option clear-all"><a href="#" onclick="clearTags(this);return false;">CLEAR&nbsp;ALL&nbsp;<span class="cancel-filter">X</span></a></span>
									<?php
									$args = array();
									$args['taxonomy'] = 'creator_tag';
									$terms = get_terms($args); // Get all terms of a taxonomy
									if ( $terms && !is_wp_error( $terms ) ) :
									foreach ( $terms as $term ) { 
										if( is_post_type_archive("creators") || tagHasPosts($activeCat, $term->slug) ){
										?>
							            <span class="filter-option <?php echo getTagActiveClass($term->slug); ?>"><a href="#" onclick="filterTag(this);return false;"><span class="term" data-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span>&nbsp;<span class="cancel-filter">X</span></a></span>
							        <?php } 
							    	} ?>  								    
									<?php endif;  ?>								
								</p>	

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row creators">
			<?php
			//get page
            //$paged = ( $_GET['page'] ) ? $_GET['page'] : 1;
			
            //setup args
			$args = array(
				'post_type' => 'creators',
				'post_status' => array('publish'),
				'orderby' => 'rand',  
				//'paged' => $paged,
				'posts_per_page' => -1,
				'tax_query' => array(),
			);

			//add the activecat if it exists
			if( $activeCat ){
				array_push($args['tax_query'],
			        array (
			            'taxonomy' => 'creator_category',
			            'field' => 'slug',
			            'terms' => $activeCat,
			        )
			    );
			}			

			//add tags if they exist
			if( isset($_GET["tags"]) && $_GET["tags"] != "" ){
				array_push($args['tax_query'], 
					array (
			            'taxonomy' => 'creator_tag',
			            'field' => 'slug',
			            'terms' => explode(",",$_GET["tags"]),
			        )
				);
			}

			//add search if it exists
			if( isset($_GET["search"]) && $_GET["search"] != "" ){
				$args['s'] = $_GET["search"];
			}

			//iterate they query
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$terms = get_the_terms(get_the_ID(), 'creator_category');
			$term_name = $terms[0]->name;
            ?>
			<div class="col s12 m6 l6 xl4 creator" style="display:none;">				
				<div class="creator-content"> 
					<?php 
					if( get_field("archive_portrait_2x") && get_field("archive_portrait_3x") ){
						$srcset = "srcset='";
						$srcset .= get_field("archive_portrait")." 1x, ";
						$srcset .= get_field("archive_portrait_2x")." 2x, ";
						$srcset .= get_field("archive_portrait_3x")." 3x, ";
						$srcset .= "'";
					} else {
						$srcset = "";
					}
					?>
					<div class="creator-portrait-container">
						<img class="portrait" width="160" height="160" src="<?php the_field("archive_portrait"); ?>" <?php echo $srcset; ?> >
						<?php if($term_name == "X‑Photographer") { ?>
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
		    </div>
			<?php endif; ?>			
		</div>
		<div class="row">
			<div class="col s12">
				<div class="load-more-button"><a onclick="loadMore();">Load More</a></div>
				<!--
				<div class="pagenation">
			      <?php 
					/*
					$pagination = paginate_links( array(
						'base'         => @add_query_arg('page','%#%'),
						'total'        => $the_query->max_num_pages,
						'current'      => $paged,
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'list',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'add_fragment' => '',
					) );
					//str_replace( "pagination", 'pagenation', $pagination );
					$pagination = str_replace( " Previous", '', $pagination );
					$pagination = str_replace( "Next ", '', $pagination );
					print_r($pagination);
					*/
			      ?>
			    </div>
				-->
			</div>
		</div>
	</div>
</section>
<script>
function filterTag(obj){
	toggleTag(obj);	  
	var zone = "";
	if( obj.closest(".modal") !== null ){
		zone = "modal";
	}
	registerTags(zone); 
}
function clearTags(obj){
	(function($) {
		$(".creator-tags .filter-option.active a .term").each(function(i,e){
			$(e.closest(".filter-option")).removeClass("active");
		});
		registerTags();
		$("form#search-form").submit();
	})( jQuery );
	
}
function registerTags(zone){
	(function($) {
		if(zone == "modal"){
			var tags = $(".creator-tags.is-modal .filter-option.active a .term");
		} else{
			console.log("zone is not modal");
			var tags = $(".creator-tags.is-not-modal .filter-option.active a .term");
		}
		var inputVal = "";
		var length = tags.length;
		tags.each(function(i,e){
			inputVal += $(e).data("slug");
			if (i !== (length - 1)) {
				inputVal += ",";
			}
		});
		$("input#tags").val(inputVal);
		$("form#search-form").submit();
	})( jQuery );
}
function toggleTag(obj){
	(function($, obj) {
		jQueryObj = $(obj.closest(".filter-option"));
		if(!jQueryObj.hasClass("active")){
			jQueryObj.addClass("active");
		} else {
			jQueryObj.removeClass("active");
		}
	})( jQuery, obj );
}
function clearSearch(){
	$("input#search").val("");
	$("form#search-form").submit();
}
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
	});
}(jQuery, document));

</script>

<?php get_footer();  ?>