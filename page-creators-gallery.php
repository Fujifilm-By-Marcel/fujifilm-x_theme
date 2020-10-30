<?php 
/*
Template Name: Page-creators-gallery
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/fnac-assets/creators/css/archive-creators.css', array(),'1.1.42');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.22',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


get_header(); 
get_sidebar();
 
$imgDirectory = get_stylesheet_directory_uri()."/en-us/fnac-assets/creators/img/";
?>
<section class="main"> 
	<?php 
	require get_stylesheet_directory().'/en-us/fnac-assets/creators/navigation.php';
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
	<div class="modal" id="tagModal" style="display:none;">
		<div class="modal-content" style="padding:2rem 0">
			<div class="close" onclick="closeModal(false, event)">
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
										if( !$activeCat || tagHasPosts($activeCat, $term->slug) ){
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
	<section class="gallery-container gallery-page">
		<div class="container">	
			
			<?php
			
			//setup args
			$args = array(
				'post_type' => 'creators',
				'post_status' => array('publish'),
				'orderby' => 'rand',  
				'posts_per_page' => -1,
				'tax_query' => array(),
			);

			//add the activeCat if it exists
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
			$array = [];
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$portrait = get_field('archive_portrait');				
				$terms = get_the_terms(get_the_ID(), 'creator_category');
				$term_name = $terms[0]->name;
	            if( have_rows('gallery') ): 		
					while( have_rows('gallery') ) : the_row(); 
						$i++;
						$array[$i-1]['portrait'] = $portrait;
						$array[$i-1]['index'] = $i;
						if( get_sub_field('video_src') ){ 
							$array[$i-1]['imgsrc']['isvideo'] = 1;
						} else { $array[$i-1]['imgsrc']['isvideo'] = 0; }
						$imgsrc = wp_get_attachment_image_src( get_sub_field('thumbnail_image'), 'full' ); 									
						$array[$i-1]['imgsrc'][0] = $imgsrc[0];
						$array[$i-1]['imgsrc'][1] = $imgsrc[1];
						$array[$i-1]['imgsrc'][2] = $imgsrc[2];
					endwhile;
				endif;
			endwhile;	

			//echo "<pre>";	
			//print_r($array); 
			//echo "</pre>";
			shuffle ( $array );
			?>
			<div class="row">							
				<div class="col s12">
					<div class="gallery" >
						<div class="gallery-pane">
							<?php foreach ($array as $key => $value) { //echo "<pre>";print_r($value);echo "</pre>"; ?>
							<a href="#" class="modal-opener" data-modal="modal-<?php echo $value['index'] ?>">
								<?php if( $value['imgsrc']['isvideo'] ){ ?>
								<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
								<?php } ?>
								<img class="lazyload" data-src="<?php echo $value['imgsrc'][0] ?>" width="<?php echo $value['imgsrc'][1] ?>" height="<?php echo $value['imgsrc'][2] ?>">
								<img class="gallery-portrait lazyload" src="<?php echo $value['portrait'] ?>" width="55" height="55" >
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php 
			if ( $the_query->have_posts() ) : 
				$i = 0;
				while ( $the_query->have_posts() ) : $the_query->the_post();
					if( have_rows('gallery') ): ?>
						<?php 
						while( have_rows('gallery') ) : the_row(); 
						$i++;
						?>
						<div id="modal-<?php echo $i ?>" class="modal" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)" >
						    <div class="modal-content" style="background: transparent;">
						    	<div class="modal-prev" onclick="iterateModals(-1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		    					<div class="modal-next" onclick="iterateModals(1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
						        <div class="close" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)">
						            <span class="cursor">&times;</span>
						        </div>		        
						        <div class="resp-container <?php echo ( get_sub_field('video_src') ? "youtube" : "image" ) ?>">
						        	<?php if( get_sub_field('video_src') ){ ?>		
						        	<iframe class="resp-inner" src="<?php the_sub_field('video_src') ?>" width="<?php the_sub_field('video_width') ?>" height="<?php the_sub_field('videoyoutube_height') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen;" allowfullscreen></iframe>
						        	<?php } else { 
						        	$imgsrc = wp_get_attachment_image_src( get_sub_field('fullsize_image'), 'full' ); 
						        	/*$isVertical = false;
						        	$verticalStyle = "style='max-height: 80vh;width: auto;'";
						        	$horizontalStyle = "style='max-height: 80vh;width: auto;'";
						        	
						        	if( $imgsrc[1]/$imgsrc[2] <= 1 ){
						        		$isVertical = true;
						        	}*/
						        	?>						        	
						        	<img <?php //if($isVertical){echo $verticalStyle;}else{echo $horizontalStyle;} ?> class="normal-inner lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
						        	<?php 
						        	/*$path = str_replace("https://fujifilm-x.com", "", $imgsrc[0] );
						        	echo ABSPATH.$path;
									$metadata = exif_read_data( ABSPATH .$path );*/
									
									//echo "<pre>";
									//print_r( $metadata );
									//echo "</pre>";
									/*echo "<p style='color: white;'>";
									echo "<span><strong>Camera Used:</strong> ";
									if( isset($metadata['Model']) ){ echo $metadata['Model']." "; } else { echo "blank "; }
									echo "</span><br>";

									echo "<span><strong>Focal Length:</strong> ";
									if( isset($metadata['FocalLength']) ){ echo eval ( 'return '.$metadata['FocalLength'].";" )." mm"." "; } else { echo "blank "; }
									echo "</span><br>";

									echo "<span><strong>Shutter:</strong> ";
									if( isset($metadata['ExposureTime']) ){ echo $metadata['ExposureTime']." sec."." "; } else { echo "blank "; }
									echo "</span><br>";

									echo "<span><strong>ISO:</strong> ";
									if( isset($metadata['ISOSpeedRatings']) ){ echo $metadata['ISOSpeedRatings']." "; } else { echo "blank "; }
									echo "</span><br>";

									echo "<span><strong>Aperture:</strong> ";
									if( isset($metadata['COMPUTED']['ApertureFNumber']) ){ echo $metadata['COMPUTED']['ApertureFNumber']." "; } else { echo "blank "; }
									echo "</span>";
									echo "</p>";*/
						        	?>
						        	<?php } ?>
						    	</div>	    	
						    </div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>

		    <?php else: ?>
		    <div class="col s12">
		    	<p style="text-align:center;">No results. <a href="#" onclick="clearSearch();return false;">Click here</a> to clear your search terms.</p>
		    </div>
			<?php endif; ?>			
		</div>
		<div class="expand-gallery-button mobile-only" onclick="toggleGalleryExpand(this, event);">
			<i class="arrow up"></i>
		</div>
	</section>


	<div class="row">
		<div class="col s12">
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
		</div>
	</div>
</section>
<script>
	function toggleGalleryExpand(obj, e){
		(function($, obj, e) {
			myArrow = $(obj).find(".arrow");
			if(myArrow.hasClass("down")){
				$(".gallery").prop("style","");
				myArrow.removeClass("down").addClass("up");
			}
			else if(myArrow.hasClass("up")){
				$(".gallery").css("max-height","30vh");
				myArrow.removeClass("up").addClass("down");
			}		
		})( jQuery, obj, e);
	}

	function filterCat(obj){
		toggleTag(obj);	  
		registerCat(obj); 
	}
	function registerCat(obj){
		(function($, obj) {
			var inputVal = $(obj).data("slug");
			$("input#cat").val(inputVal);
			$("input#tags").val("");
			$("form#search-form").submit();
		})( jQuery, obj );
	}
	function clearCat(obj){
		(function($) {
			$("input#cat").val("");
			$("input#tags").val("");
			$("form#search-form").submit();
		})( jQuery );	
	}



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

    // Open the Modal
    function openModal(myElement) {
        jQuery("#"+myElement).css("display","block");
    }
    // Close the Modal
    function closeModal(isVideo, e) {
        (function($) {
        	if ( $(e.target).hasClass("close") || $(e.target).hasClass("modal") || $(e.target).hasClass("cursor") || e == "iterate" ){	           
        		$(".modal").css("display","none");
	            if(isVideo){  
	                $('.resp-inner').each(function(){
	                    this.src = this.src;
	                });       
	            }
            }
        })( jQuery );
    }
    function iterateModals(direction, dataModal, isVideo){
    	var myModal = $( ".modal-opener[data-modal='"+dataModal+"']" );
    	closeModal(isVideo, "iterate");
    	var myOwl = myModal.closest(".owl-item");    	
    	if(direction == 1){
    		if( myOwl.length ){
    			if( myOwl.next().length ){
    				openModal(myOwl.next().find(".modal-opener").data('modal'));	    			
    			} else {
    				openModal($(".owl-item").first().find(".modal-opener").data('modal'));
    			}
    		}
    		else{
    			if( myModal.next().length ){
    				openModal(myModal.next().data('modal'));    			
    			} else {
    				openModal($(".modal-opener").first().data('modal'));    			
    			}
    		}
    	} else if (direction == -1){
    		if( myOwl.length ){
    			if( myOwl.prev().length ){
    				openModal(myOwl.prev().find(".modal-opener").data('modal'));    			
    			} else {
					openModal($(".owl-item").last().find(".modal-opener").data('modal'));
    			}
    		}
    		else{
    			if( myModal.prev().length ){
    				openModal(myModal.prev().data('modal'));    			
    			} else {
    				openModal($(".modal-opener").last().data('modal'));    			
    			}
    		}
    	}
    }
	function showTagModal(obj){
		(function($, obj) {
			$("#tagModal").show();
		})( jQuery, obj );
	}
    //onclick for video opener
    (function ($, document) {
        $(document).ready(function () {
            $(".modal-opener").click(function(){
            	var myModal = $(this).data('modal');
                if( myModal != undefined ){
                    openModal(myModal);
                }
                return false;
            });
        });
        $( window ).ready(function() {
			lazyload();
		});
		$(document).on('contextmenu', 'img', function() {
		    return false;
		})
    }(jQuery, document));
</script>
<?php get_footer();  ?>