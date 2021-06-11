<?php
/*
 Template Name: Page-simpleHTMLContent
*/



function page_simpleHTMLContent_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/materialize-gridonly.css',array(),'1');
	//wp_enqueue_style('simpleHTMLContent', get_stylesheet_directory_uri().'/en-us/fnac-assets/css/page-simpleHTMLContent/simpleHTMLContent.css',array(),'1.0.0');
	
}
function page_simpleHTMLContent_scripts(){
	//wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/common.js', array(), '1.0.0', true); 
	//wp_enqueue_script('simpleHTMLContent', get_stylesheet_directory_uri().'/en-us/fnac-assets/js/page-simpleHTMLContent/script.js', array(), '1.0.0', true); 
}
add_action( 'wp_enqueue_scripts', 'page_simpleHTMLContent_styles' );
//add_action( 'wp_enqueue_scripts', 'page_simpleHTMLContent_scripts' );

get_header();



function jotform_iframe_func(){ 
	//if ( is_user_logged_in() ) { 

	$jotformData = get_field('jotform_iframe_method'); 
	if ( $jotformData['id'] != "" ){
	?>
	<iframe
	  id="JotFormIFrame-<?php echo esc_attr( $jotformData['id'] ); ?>"
	  title="<?php echo esc_attr( $jotformData['title'] ); ?>"
	  onload="window.parent.scrollTo(0,0)"
	  allowtransparency="true"
	  allowfullscreen="true"
	  allow="geolocation; microphone; camera"
	  src="https://form.jotform.com/<?php echo esc_attr( $jotformData['id'] ); ?>"
	  frameborder="0"
	  style="
	  min-width: 100%;
	  height:539px;
	  border:none;"
	  scrolling="no"
	>
	</iframe>
	<script type="text/javascript">
	  var ifr = document.getElementById("JotFormIFrame-<?php echo esc_attr( $jotformData['id'] ); ?>");
	  if (ifr) {
	    var src = ifr.src;
	    var iframeParams = [];
	    if (window.location.href && window.location.href.indexOf("?") > -1) {
	      iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
	    }
	    if (src && src.indexOf("?") > -1) {
	      iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
	      src = src.substr(0, src.indexOf("?"))
	    }
	    iframeParams.push("isIframeEmbed=1");
	    ifr.src = src + "?" + iframeParams.join('&');
	  }
	  window.handleIFrameMessage = function(e) {
	    if (typeof e.data === 'object') { return; }
	    var args = e.data.split(":");
	    if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
	    if (!iframe) { return; }
	    switch (args[0]) {
	      case "scrollIntoView":
	        iframe.scrollIntoView();
	        break;
	      case "setHeight":
	        iframe.style.height = args[1] + "px";
	        break;
	      case "collapseErrorPage":
	        if (iframe.clientHeight > window.innerHeight) {
	          iframe.style.height = window.innerHeight + "px";
	        }
	        break;
	      case "reloadPage":
	        window.location.reload();
	        break;
	      case "loadScript":
	        if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
	        var src = args[1];
	        if (args.length > 3) {
	            src = args[1] + ':' + args[2];
	        }
	        var script = document.createElement('script');
	        script.src = src;
	        script.type = 'text/javascript';
	        document.body.appendChild(script);
	        break;
	      case "exitFullscreen":
	        if      (window.document.exitFullscreen)        window.document.exitFullscreen();
	        else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
	        else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
	        else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
	        else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
	        break;
	    }
	    var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
	    if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
	      var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
	      iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
	    }
	  };
	  window.isPermitted = function(originUrl, whitelisted_domains) {
	    var url = document.createElement('a');
	    url.href = originUrl;
	    var hostname = url.hostname;
	    var result = false;
	    if( typeof hostname !== 'undefined' ) {
	      whitelisted_domains.forEach(function(element) {
	          if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
	              result = true;
	          }
	      });
	      return result;
	    }
	  }
	  if (window.addEventListener) {
	    window.addEventListener("message", handleIFrameMessage, false);
	  } else if (window.attachEvent) {
	    window.attachEvent("onmessage", handleIFrameMessage);
	  }
	  </script>



	<?php 
		}
	//}
}
add_shortcode( 'jotform_iframe', 'jotform_iframe_func' );


?>

<style>
.credits{
	max-width: 800px;
	margin: 0 auto;
	position: relative;
	top: -30px;
	color: #fff;
	z-index: 2;
	padding: 0 20px 0 0;
	text-align:right;
}
<?php echo get_field('css'); ?>
</style>



<div class="main">

	
	<section class="xstoriespost__first lower__first"> 
		<div class="inner">
			<?php if( get_field('header_image_active') == "1" ) {?>
			<div class="xstoriespost__mainvisual" style="z-index:1;">
				<div class="xstoriespost__mainvisual_bg" style="background-image:url(<?php echo wp_get_attachment_image_url( get_field('header_image'), 'full' ) ?>);"></div>
				<img src="<?php echo wp_get_attachment_image_url( get_field('header_image'), 'full' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( get_field('header_image'), 'full' ); ?>">
				<p class="credits"><?php echo get_field('header_image_copyright_text'); ?></p>
			</div>
			<?php } ?>
		</div>
	</section>
	
	<div style="text-align:center;">
		<h1 class="headline_underline headline_h1"><?php the_title() ?></h1>
		<div class="tagline"><?php the_field('tagline'); ?></div>
	</div>


	<div class="container">			
		<div class="row">
			<div class="col s12">					
				<?php echo get_field("html_content"); ?>
			</div>
		</div>
	</div>	
</div>

<script>
<?php echo get_field('js'); ?>
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
