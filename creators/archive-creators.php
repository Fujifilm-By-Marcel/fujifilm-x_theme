<?php 
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/css/archive-creators.css', false, NULL, 'all');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true);
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );


add_filter('the_title','some_callback');
function some_callback($data){
    global $post;
    // where $data would be string(#) "current title"
    // Example:
    // (you would want to change $post->ID to however you are getting the book order #,
    // but you can see how it works this way with global $post;)
    return 'Creators';
}

add_filter("pre_get_document_title", "my_callback");

function my_callback($old_title){
    return "My Modified Title";
}

get_header(); 
get_sidebar();

remove_filter( 'the_title','some_callback' );

$imgDirectory = get_stylesheet_directory_uri()."/en-us/img/creators/";



?>
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
						            <span class="filter-option <?php echo getCatActiveClass($term->slug, $activeCat) ?>"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></span>				        	
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
		<div class="row creator-filters creator-tags">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="col s12 m8 filter-container">				
							<p>
								<span class="filter-instructions">PHOTOGRAPHIC STYLE ></span>
								<span class="filter-option clear-all"><a href="#" onclick="clearTags(this);return false;">CLEAR ALL <span class="close">X</span></a></span>
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
						            <span class="filter-option <?php echo getTagActiveClass($term->slug); ?>"><a href="#" onclick="filterTag(this);return false;"><span class="term" data-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span> <span class="close">X</span></a></span>
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

	<div class="container">
		<div class="row creators">
			<?php
            $paged = ( $_GET['page'] ) ? $_GET['page'] : 1;
			$args = array(
				'post_type' => 'creators',
				'post_status' => array('publish'),
				'orderby' => 'publish_date',  
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => 6,
				'tax_query' => array(),
			);

			if( $activeCat ){
				array_push($args['tax_query'],
			        array (
			            'taxonomy' => 'creator_category',
			            'field' => 'slug',
			            'terms' => $activeCat,
			        )
			    );
			}			

			if( isset($_GET["tags"]) && $_GET["tags"] != "" ){
				array_push($args['tax_query'], 
					array (
			            'taxonomy' => 'creator_tag',
			            'field' => 'slug',
			            'terms' => explode(",",$_GET["tags"]),
			        )
				);
			}

			if( isset($_GET["search"]) ){
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
			<?php endwhile;	?>
			<div class="pagenation">
		      <?php 
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
		      ?>
		    </div>
			<?php endif; ?>			
		</div>
	</div>
</section>
<script>
function filterTag(obj){
	toggleTag(obj);	  
	registerTags(); 
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
function registerTags(){
	(function($) {
		var tags = $(".creator-tags .filter-option.active a .term");
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
</script>

<?php get_footer();  ?>