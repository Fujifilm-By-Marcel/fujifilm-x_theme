<?php 
function printFilters(){
?>
<!--<div class="desktop-only">-->
	<div class="row creator-filters creator-categories">
		<div class="col s12">
			<div class="row">
				<div class="filters">
					<div class="col s12 m8 filter-container">		
						<?php 								
						function getAllActiveClass(){
							if( !isset($_GET["cat"]) || $_GET["cat"] == "" ){
								return "active";
							} else {
								return "";
							}
						}
						?>		
						<p>
							<span class="filter-instructions">FILTER BY ></span>
							<span class="filter-option <?php echo getAllActiveClass() ?>"><a href="#" onclick="clearCat(this);return false;">ALL</a></span>
							<?php
							$activeCat = false;
							$taxonomy = 'creator_category';
							$terms = get_terms($taxonomy); // Get all terms of a taxonomy
							if ( $terms && !is_wp_error( $terms ) ) :
					        function getCatActiveClass($cat, &$activeCat){
								if( isset($_GET["cat"]) && ( $_GET["cat"] == $cat ) ){ 
									$activeCat = $cat;
									return "active";
								} else {
									return "";
								}
							}
					        foreach ( $terms as $term ) { ?>
					            <span class="filter-option <?php echo getCatActiveClass($term->slug, $activeCat) ?>"><a data-slug="<?php echo $term->slug; ?>" href="#" onclick="filterCat(this);return false;"><?php echo $term->name."s"; ?></a></span>				        	
					        <?php } ?>  								    
							<?php endif;  ?>
						</p>						
					</div>
					<div class="col s12 m4 search-box-container">
						<div class="search-box">
							<form id="search-form" method="get">
								<input type="hidden" name="cat" id="cat" value='<?php echo $_GET["cat"] ?>' >
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
								if( !$activeCat || tagHasPosts($activeCat, $term->slug) ){
								?>
					            <span class="filter-option <?php echo getTagActiveClass($term->slug); ?>"><a href="#" onclick="filterTag(this);return false;"><span class="term" data-slug="<?php echo $term->slug; ?>"><?php echo str_replace(" ", "&nbsp;", $term->name); ?></span>&nbsp;<span class="cancel-filter">X</span></a></span>
					        <?php } 
					    	} ?>  								    
							<?php endif;  ?>
							
						</p>						
					</div>
				</div>
			</div>
		</div>
	</div>
<!--</div>

<div class="mobile-only">

</div>-->
<?php
}


function get_main_query(){
    //setup args
	$args = array(
		'post_type' => 'creators',
		'post_status' => array('publish'),
		'orderby' => 'rand',  
		'posts_per_page' => -1,
		'tax_query' => array(),
	);

	//add the activecat if it exists
	if( isset($_GET["cat"]) && $_GET["cat"] != "" ){
		array_push($args['tax_query'],
	        array (
	            'taxonomy' => 'creator_category',
	            'field' => 'slug',
	            'terms' => $_GET["cat"],
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
	return $the_query;
}