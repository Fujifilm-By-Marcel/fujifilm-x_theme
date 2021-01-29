<?php 
/*
Template Name: Page-creators-gallery
*/
function load_usa_js_css(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css', false, NULL, 'all');
	wp_enqueue_style('archive-creators', get_stylesheet_directory_uri().'/en-us/creators/css/archive-creators.css', array(),'1.2.0');
	wp_enqueue_style('filters', get_stylesheet_directory_uri().'/en-us/creators/css/filters.css', array(),'1.0.42');
	wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script('lazyload', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/lazyload.js', array(), '1.31',true); 
	wp_enqueue_script('filters', get_stylesheet_directory_uri().'/en-us/creators/js/filters.js', array(), '1.0.20',true); 
} 
add_action( 'wp_enqueue_scripts', 'load_usa_js_css' );

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

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

	<section class="gallery-container gallery-page">
		<div class="container">	
			
			<?php
			$the_query = get_main_query();
			if ( $the_query->have_posts() ) : 
			$array = [];
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$bioID =false;
				if(get_field('bio', get_the_ID())){
					$bioID = get_field('bio', get_the_ID());
				}
				$portrait = get_field('image_x1', $bioID);				
				$terms = get_the_terms(get_the_ID(), 'creator_category');
				$term_name = $terms[0]->name;
	            if( have_rows('gallery') ): 		
					while( have_rows('gallery') ) : the_row(); 
						$i++;
						$array[$i-1]['portrait'] = $portrait;
						$array[$i-1]['index'] = $i;
						$array[$i-1]['alt'] = get_the_title();
						$array[$i-1]['photographer_link'] = get_the_permalink();
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
								<div style="display:none;" class="loader"></div>
								<?php if( $value['imgsrc']['isvideo'] ){ ?>
								<img class="play-icon" src="<?php echo $imgDirectory ?>svg/play.svg">
								<?php } ?>
								<img class="lazyload" data-src="<?php echo $value['imgsrc'][0] ?>" width="<?php echo $value['imgsrc'][1] ?>" height="<?php echo $value['imgsrc'][2] ?>">
								<!--<a href="<?php echo $value['photographer_link'] ?>">-->
								<img title="<?php echo $value['alt'] ?>" alt="<?php echo $value['alt'] ?>" class="gallery-portrait lazyload" data-src="<?php echo $value['portrait'] ?>" width="55" height="55" >
								<!--</a>-->

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
						    	<div class="loader"></div>
						    	<div class="controls modal-prev" onclick="iterateModals(-1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
		    					<div class="controls modal-next" onclick="iterateModals(1, 'modal-<?php echo $i ?>', <?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>)"><span></span></div>
						        <div class="controls close" onclick="closeModal(<?php echo ( get_sub_field('video_src') ? "true" : "false" ) ?>, event)">
						            <span class="cursor">&times;</span>
						        </div>		        
						        <div class="resp-container <?php echo ( get_sub_field('video_src') ? "youtube" : "image" ) ?>">
						        	<?php if( get_sub_field('video_src') ){ ?>		
						        	<iframe class="resp-inner" src="<?php the_sub_field('video_src') ?>" width="<?php the_sub_field('video_width') ?>" height="<?php the_sub_field('videoyoutube_height') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen;" allowfullscreen></iframe>
						        	<?php } else { 
						        	$imgsrc = wp_get_attachment_image_src( get_sub_field('fullsize_image'), 'full' ); 
						        	?>						        	
						        	<img class="normal-inner lazyload" data-src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" >
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

            //check mobile checkboxes onload
			var radios = $('input:radio[name=category]');
		    radios.filter('[value=<?php if(isset($_GET['cat'])){ echo $_GET['cat']; } else { echo "null"; } ?>]').prop('checked', true);		    
		    var checks = $('input:checkbox[name="tags[]"]');
		    var getChecks = "<?php echo $_GET['tags'] ?>".split(",");
		    
		    for(i=0;i<getChecks.length;i++){
				
		    	$('input:checkbox[value="'+getChecks[i]+'"]').prop('checked', true);
		    }
        });
        $( window ).ready(function() {
			var images = document.querySelectorAll(".lazyload");
			lazyload(images, {
				after: function(image){
					var parent = $(image).closest('.modal-content');
					if(!parent.length){
						parent = $(image).closest('.modal-opener');			
					}
					parent.find('.loader').show();
				}
			});

			$(images).each(function(i, image){
				var modalContent = $(image).closest('.modal-content');
				var modalLoader = $(image).closest('.modal-opener');	
				if(modalContent.length){
					$(image).load(function() {
						modalContent.find('.loader').hide();
						modalContent.find('.controls').show();				
					});
				}
				else if(modalLoader.length){
					$(image).load(function() {
						modalLoader.find('.loader').hide();
					});
				}
				
			});


		});
		$(document).on('contextmenu', 'img', function() {
		    return false;
		})
    }(jQuery, document));
</script>
<?php get_footer();  ?>