<?php 
function printFilters(){
	$catTerms = getCatTerms("creator_category");
	$tagTerms = getTagTerms('creator_tag');
	if( isset( $_GET["cat"] ) && $_GET["cat"] != "" ){ 
		$activeCat = $_GET["cat"];
		$allActiveClass = "";
	} else {
		$activeCat = false;
		$allActiveClass = "active";
	}
	?>
	<div class="creator-filters <?php /*if ( is_user_logged_in() ) { */echo "desktop-only"; /*}*/ ?>">
		<div class="row creator-categories">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="filter-container">
							<div style="float:left;"><span>FILTER BY</span><i class="right-arrow"></i></div>
							<span class="filter-option <?php echo $allActiveClass; ?>"><a href="#" onclick="clearCat(this);return false;">ALL</a></span>
							<?php foreach ( $catTerms as $term ) { ?>
					            <span class="filter-option <?php echo getTaxActiveClass("cat", $term->slug) ?>"><a data-slug="<?php echo $term->slug; ?>" href="#" onclick="filterCat(this);return false;"><?php echo $term->name."s"; ?></a></span>				        	
					        <?php } ?>							
				    	</div>

						<div class="search-box">
							<form id="search-form" method="get">
								<input type="hidden" name="cat" id="cat" value='<?php echo $_GET["cat"] ?>' >
								<input type="hidden" name="tags" id="tags" value='<?php echo $_GET["tags"] ?>' >
								<label class="input-sizer" data-value="SEARCH">
									<input onInput="searchInputChange(this);" class="search-input" type="text" name="search" size="1" placeholder="SEARCH" value='<?php echo $_GET["search"] ?>'>
								</label>
								<a style="position:relative;z-index:2;" href="#" onclick='document.getElementById("search-form").submit();return false;'><i class="fa fa-search" aria-hidden="true"></i></a>
							</form>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<div class="row creator-tags">
			<div class="col s12">
				<div class="row">
					<div class="filters">
						<div class="filter-container">
							<div style="float:left;"><span>STYLE</span><i class="right-arrow"></i></div>
							<span class="filter-option clear-all"><a href="#" onclick="clearTags(this);return false;">CLEAR&nbsp;ALL&nbsp;<span class="cancel-filter">X</span></a></span>
							<?php						
							foreach ( $tagTerms as $term ) { 
								if( !$activeCat || tagHasPosts($activeCat, $term->slug) ){
								?>
					            <span class="filter-option <?php echo getTaxActiveClass("tags", $term->slug); ?>"><a href="#" onclick="filterTag(this);return false;"><span class="term" data-slug="<?php echo $term->slug; ?>"><?php echo str_replace(" ", "&nbsp;", $term->name); ?></span>&nbsp;<span class="cancel-filter">X</span></a></span>
					        	<?php 
					    		} 
					    	} 
					    	?>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php //if ( is_user_logged_in() ) { ?>
	<div class="row creator-filters mobile-only">
		<div class="col s12">
			<div class="row">
				<div class="filters">
					<div onclick="toggleModal(this, event)" class="toggle-button"><span>FILTER BY</span><i class="toggle-icon"></i></div>
					<div class="filter-modal" style="width:150px;">
						<div>
							<label class="custom-checkbox">
								<input type="radio" name="category" value="All" checked>
								<span>All</span>
							</label>
						</div>
						<?php foreach ( $catTerms as $term ) { ?>
						<div>
							<label class="custom-checkbox">
			            		<input type="radio" name="category" value="<?php echo $term->slug; ?>">
								<span><?php echo str_replace(" ", "&nbsp;", $term->name); ?></span>
							</label> 				        	
			        	</div>
				        <?php } ?>
					</div>
				</div>
				<div class="filters">
					<div onclick="toggleModal(this, event)" class="toggle-button"><span>STYLE</span><i class="toggle-icon"></i></div>
					<div class="filter-modal" style="width:150px;">
						<form>
						<?php						
						foreach ( $tagTerms as $term ) { 
							if( !$activeCat || tagHasPosts($activeCat, $term->slug) ){
							?>
							<div>
								<label class="custom-checkbox">
									<input type="checkbox" name="tags[]" value="<?php echo $term->slug; ?>">
									<span><?php echo str_replace(" ", "&nbsp;", $term->name); ?></span>
								</label>    
							</div>
				        	<?php 
				    		} 
				    	} 
				    	?>
				    	</form>
					</div>
				</div>			
				<div class="search-box">					
					<form id="mobile-search-form" method="get">
						<input type="hidden" name="cat" id="mobile-cat" value='<?php echo $_GET["cat"] ?>' >
						<input type="hidden" name="tags" id="mobile-tags" value='<?php echo $_GET["tags"] ?>' >
						<label class="input-sizer" data-value="SEARCH">
							<input id="mobile-search-input" onInput="searchInputChange(this);" class="search-input" type="text" name="search" size="1" placeholder="SEARCH" value='<?php echo $_GET["search"] ?>'>
						</label>
						<a style="position:relative;z-index:2;" href="#" onclick='submitMobile();return false;'><i class="fa fa-search" aria-hidden="true"></i></a>					
					</form>					
				</div>	
			</div>
		</div>
	</div>
	<?php  //} ?>
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



function getCatTerms($taxonomy){	
	$terms = get_terms($taxonomy);
	if ( $terms && !is_wp_error( $terms ) ) {
		return $terms;
	}else{
		return false;
	}    
}

function getTagTerms($taxonomy){	
	$args = array();
	$args['taxonomy'] = $taxonomy;
	$terms = get_terms($args);
	if ( $terms && !is_wp_error( $terms ) ) {
		return $terms;
	} else {
		return false;
	}
}


function getTaxActiveClass($type, $tag){
	if( strpos($_GET[$type], $tag) !== false ){ 
		return "active";
	} else {
		return "";
	}
}

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

